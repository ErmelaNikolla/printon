<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'posts'         => Post::count(),
                'published'     => Post::where('is_published', true)->count(),
                'orders'        => Order::count(),
                'pending_orders' => Order::where('status', 'pending')->count(),
            ],
        ]);
    }
}
