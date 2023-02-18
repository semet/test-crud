<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function create()
    {
        return view('pages.post-create');
    }

    public function store(Request $request)
    {
        $req = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $data = array_merge($req, ['account_id' => auth()->id()]);
        Post::create($data);

        return redirect()->route('dashboard');
    }
    public function edit(Post $post)
    {
        return view('pages.post-edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update($data);

        return redirect()->route('dashboard');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }
}
