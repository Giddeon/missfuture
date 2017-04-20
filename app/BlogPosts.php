<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Laravelrus\LocalizedCarbon\Models\Eloquent;

class BlogPosts extends Eloquent
{
//    protected $dates = [
//        'created_at',
//        'updated_at',
//        'date'
//    ];

    protected $fillable = [
        "name",
        "code",
        "user_id",
        "picture",
        "tags",
        "date",
        "blog_posts_categories_id",
        "title",
        "description",
        "preview_text",
        "text"
    ];


    public function getRouteKeyName()
    {
        return 'code';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

    public function category()
    {
        return $this->belongsTo(BlogPostsCategories::class, "blog_posts_categories_id");
    }
}
