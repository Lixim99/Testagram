<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Image;

class PostController extends Controller
{
    /**
     * @return never
     */
    public function index()
    {
        return abort('404');
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('posts.index', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        $fileName = time() . '.' . $request->image->extension();

        $request->image->storeAs('public/upload/img/preview/post/', $fileName);
        $request->image->storeAs('public/upload/img/detail/post/', $fileName);

        Image::make(storage_path('app/public/upload/img/preview/post/' . $fileName))
            ->fit(297, 297)->save();

        Image::make(storage_path('app/public/upload/img/detail/post/' . $fileName))
            ->fit(1080, 1080)->save();

        Post::create([
            'user_id' => auth()->id(),
            'caption' => $request->caption,
            'preview_picture' => 'storage/upload/img/preview/post/' . $fileName,
            'detail_picture' => 'storage/upload/img/detail/post/' . $fileName,
        ]);

        return redirect()->route('profile.show', auth()->id());
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        if ($post->user->id != auth()->id()) {
            abort('404');
        }

        $post->delete();

        return redirect()->route('profile.show', auth()->id());
    }

    public function update(CreatePostRequest $request)
    {
        dd($request);
    }
}
