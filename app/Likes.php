<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{

    protected $fillable = [
        "user_id",
        "blog_posts_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog_post()
    {
        return $this->belongsTo(BlogPosts::class);
    }
}
