<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class PublicController extends Controller
{
    public function home(): Response
    {
        $posts = Post::where('is_published', true)
            ->orderBy('order_column')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'type' => $post->type,
                    'title' => $post->getTranslations('title'),
                    'description' => $post->getTranslations('description'),
                    'video_url' => $post->video_url,
                    'image_url' => $post->type === 'image'
                        ? $post->getFirstMediaUrl('images')
                        : null,
                    'video_file_url' => $post->type === 'video_upload'
                        ? $post->getFirstMediaUrl('videos')
                        : null,
                ];
            });

        return Inertia::render('Home', ['posts' => $posts]);
    }

    public function about(): Response
    {
        return Inertia::render('About');
    }

    public function orders(): Response
    {
        return Inertia::render('Orders');
    }
}
