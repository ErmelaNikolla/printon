<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index(): Response
    {
        $posts = Post::orderBy('order_column')->orderBy('created_at', 'desc')->get()->map(function ($post) {
            return [
                'id'           => $post->id,
                'type'         => $post->type,
                'title'        => $post->getTranslations('title'),
                'is_published' => $post->is_published,
                'order_column' => $post->order_column,
                'image_url'    => $post->type === 'image' ? $post->getFirstMediaUrl('images') : null,
                'video_url'    => $post->video_url,
                'created_at'   => $post->created_at->toDateString(),
            ];
        });

        return Inertia::render('Admin/Posts/Index', ['posts' => $posts]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Posts/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'type'              => 'required|in:image,video_upload,video_link',
            'title'             => 'nullable|array',
            'description'       => 'nullable|array',
            'video_url'         => 'nullable|url|required_if:type,video_link',
            'image'             => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:10240|required_if:type,image',
            'video_file'        => 'nullable|file|mimes:mp4,mov,avi,webm|max:102400|required_if:type,video_upload',
            'is_published'      => 'boolean',
        ]);

        $post = Post::create([
            'type'         => $request->type,
            'title'        => $request->input('title', []),
            'description'  => $request->input('description', []),
            'video_url'    => $request->video_url,
            'is_published' => $request->boolean('is_published'),
            'order_column' => Post::max('order_column') + 1,
        ]);

        if ($request->type === 'image' && $request->hasFile('image')) {
            $post->addMedia($request->file('image'))->toMediaCollection('images');
        }

        if ($request->type === 'video_upload' && $request->hasFile('video_file')) {
            $post->addMedia($request->file('video_file'))->toMediaCollection('videos');
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post created.');
    }

    public function edit(Post $post): Response
    {
        return Inertia::render('Admin/Posts/Edit', [
            'post' => [
                'id'           => $post->id,
                'type'         => $post->type,
                'title'        => $post->getTranslations('title'),
                'description'  => $post->getTranslations('description'),
                'video_url'    => $post->video_url,
                'is_published' => $post->is_published,
                'order_column' => $post->order_column,
                'image_url'    => $post->type === 'image' ? $post->getFirstMediaUrl('images') : null,
                'video_file_url' => $post->type === 'video_upload' ? $post->getFirstMediaUrl('videos') : null,
            ],
        ]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $request->validate([
            'type'         => 'required|in:image,video_upload,video_link',
            'title'        => 'nullable|array',
            'description'  => 'nullable|array',
            'video_url'    => 'nullable|url',
            'image'        => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:10240',
            'video_file'   => 'nullable|file|mimes:mp4,mov,avi,webm|max:102400',
            'is_published' => 'boolean',
            'order_column' => 'nullable|integer',
        ]);

        $post->update([
            'type'         => $request->type,
            'title'        => $request->input('title', []),
            'description'  => $request->input('description', []),
            'video_url'    => $request->video_url,
            'is_published' => $request->boolean('is_published'),
            'order_column' => $request->input('order_column', $post->order_column),
        ]);

        if ($request->type === 'image' && $request->hasFile('image')) {
            $post->clearMediaCollection('images');
            $post->addMedia($request->file('image'))->toMediaCollection('images');
        }

        if ($request->type === 'video_upload' && $request->hasFile('video_file')) {
            $post->clearMediaCollection('videos');
            $post->addMedia($request->file('video_file'))->toMediaCollection('videos');
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->clearMediaCollection('images');
        $post->clearMediaCollection('videos');
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted.');
    }
}
