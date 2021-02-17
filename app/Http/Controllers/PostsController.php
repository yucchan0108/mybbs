<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
        // $this->authorizeResource(User::class, 'user');

    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        return view('posts.index', [
            'posts' => $posts,
            // 'user' => $users,
            ]);
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        // Post::create($params);
        $post = new Post();
        $post->fill($params);
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('top');
    }

    public function show(Request $request ,Post $post)
    {
        $post = Post::findOrFail($post->id);        

        return view('posts.show', [
        'post' => $post,
        ]);
    }

    public function edit(Request $request, Post $post)
    {
        $post = Post::findOrFail($post->id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {

        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($post->id);
        // $post->user_id = Auth::id();
        $post->fill($params);
        $post->save();

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy(Request $request, Post $post)
    {
        $post = Post::findOrFail($post->id);

        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('top');
    }
}
