<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'phone'          => 'nullable|string|max:50',
            'email'          => 'nullable|email|max:255',
            'preferred_date' => 'nullable|date',
            'message'        => 'nullable|string|max:2000',
        ]);

        Order::create($validated);

        return redirect()->route('orders')->with('success', true);
    }

    public function quickStore(Request $request)
    {
        $validated = $request->validate([
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:50',
            'message' => 'required|string|max:2000',
        ]);

        Order::create([
            'name'    => 'Quick Inquiry',
            'email'   => $validated['email'],
            'phone'   => $validated['phone'] ?? null,
            'message' => $validated['message'],
        ]);

        return response()->json(['success' => true]);
    }
}
