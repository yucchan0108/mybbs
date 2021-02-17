<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'post_id',
    ];

    public function posts()
    {
        // $comments = Post::find(1)->comments;
        // foreach ($comments as $comment) {
        //     //
        // }

        return $this->belongsTo(Post::class);
    }

    public function user() // 単数形
    {
        return $this->belongsTo(User::class);
    }
}
