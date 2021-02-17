<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];
    

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function user() // 単数形
    // {
    //     return $this->belongsTo('App\Models\User');
    // }

    public function user() // 単数形
    {
        return $this->belongsTo(User::class);
    }

}
