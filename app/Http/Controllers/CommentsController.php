<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');

    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($params['post_id']);
        // $post->comments()->create($params);

        $comment = new Comment();
        $comment->fill($params);
        $comment->user_id = Auth::id();
        $comment->save();
        

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy(Request $request, Comment $comment)
    {
        // commentのidもってくる
        // $comment = Comment::findOrFail($comment->id);
        // commentに紐付いてるpost_idもってくる
        $post = Post::findOrFail($comment->post_id);

        $comment->delete();

        return redirect()->route('posts.show', ['post' => $post]);
    }
}
