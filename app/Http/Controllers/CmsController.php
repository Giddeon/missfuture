<?php

namespace App\Http\Controllers;

use App\BlogPosts;
use App\BlogPostsCategories;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CmsController extends Controller
{
    public function auth()
    {
        if (Auth::user()) {
            return redirect("/cms/home");
        } else {
            $users = User::select("name", "role", "picture", "email")
                ->where('role', 'moderator')
                ->orWhere('role', 'admin')
                ->get();
            return view("cms.auth", ["users" => $users]);
        }
    }

    public function index()
    {
        if (Auth::user()) {
            echo Auth::user()->role;
            return $this->{Auth::user()->role}();
        } elseif (session()->get("role")) {
            return redirect("/cms");
        } else {
            return redirect("/");
        }


    }

    public function createPost()
    {
        $categories = BlogPostsCategories::all();

        return view("cms.create_post", ['categories' => $categories, 'post' => [], 'url' => 'blog_posts']);
    }

    public function editPost(BlogPosts $post)
    {
        $categories = BlogPostsCategories::all();

        return view("cms.edit_post", ['categories' => $categories, 'post' => $post, 'url' => "blog_posts/{$post->id}"]);
    }


    private function moderator()
    {
        $posts = new BlogPosts;
//        dd($posts->orderBy("id", "desc")->get()->toArray());
        return view("cms.posts", ["posts" => $posts->orderBy("id", "desc")->get()]);
    }


}
