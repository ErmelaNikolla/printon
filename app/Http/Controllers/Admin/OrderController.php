<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderCompleteMail;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class OrderController extends Controller
{
    public function index(): Response
    {
        $orders = Order::orderBy('created_at', 'desc')->get();

        return Inertia::render('Admin/Orders/Index', ['orders' => $orders]);
    }

    public function show(Order $order): Response
    {
        $media = $order->getMedia('files')->map(fn ($m) => [
            'id'   => $m->id,
            'name' => $m->file_name,
            'url'  => $m->getUrl(),
            'mime' => $m->mime_type,
            'size' => $m->human_readable_size,
        ]);

        return Inertia::render('Admin/Orders/Show', [
            'order' => $order,
            'media' => $media,
        ]);
    }

    public function storeMedia(Request $request, Order $order): RedirectResponse
    {
        $request->validate([
            'files'   => 'required|array',
            'files.*' => 'file|max:20480',
        ]);

        foreach ($request->file('files') as $file) {
            $order->addMedia($file)->toMediaCollection('files');
        }

        return back()->with('success', 'Files uploaded.');
    }

    public function destroyMedia(Order $order, Media $media): RedirectResponse
    {
        abort_if($media->model_id !== $order->id, 403);
        $media->delete();

        return back()->with('success', 'File removed.');
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'nullable|email|max:255',
            'phone'          => 'nullable|string|max:50',
            'message'        => 'nullable|string',
            'preferred_date' => 'nullable|date',
            'status'         => 'required|in:pending,confirmed,done',
        ]);

        $previousStatus = $order->status;
        $order->update($request->only(['name', 'email', 'phone', 'message', 'preferred_date', 'status']));

        // Send completion email when marked as done
        if ($request->status === 'done' && $previousStatus !== 'done' && $order->email) {
            try {
                Mail::to($order->email)->send(new OrderCompleteMail($order));
            } catch (\Exception $e) {
                // Mail not configured — skip silently
            }
        }

        return redirect()->route('admin.orders.index')->with('success', 'Order updated.');
    }
}
