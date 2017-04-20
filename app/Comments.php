<?php

namespace App;

use Laravelrus\LocalizedCarbon\Models\Eloquent;

class Comments extends Eloquent
{
    protected $fillable = [
        'text',
        'blog_posts_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
    protected $table = 'comments';

    public function post()
    {
        return $this->belongsTo(BlogPosts::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
