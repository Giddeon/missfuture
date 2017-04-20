<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{


    protected $fillable = [
        "name",
        "email",
        "user_id",
        "blog_posts_categories_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(BlogPostsCategories::class);
    }
}
