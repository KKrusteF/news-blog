<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatePostRequest;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('crud.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(ValidatePostRequest $request)
    {
        $validated = $request->validated();

        Post::create(array_merge($validated, [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('crud.edit', ['post' => $post]);
    }

    public function update(Post $post, ValidatePostRequest $request)
    {
        $validated = $request->validated();
//        $attributes = $this->validatePost($post);

        if ($validated['thumbnail'] ?? false) {
            $validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($validated);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
