<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPostsCategories extends Model
{
    protected $table = 'blog_posts_categories';

    public function blog_posts()
    {
        return $this->hasMany(BlogPosts::class);
    }

    public static function categories()
    {
        return BlogPostsCategories::all();
    }
}
