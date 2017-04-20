<?php

namespace App\Http\Controllers;

use App\BlogPostsCategories;
use Illuminate\Http\Request;
use App\BlogPosts;
use App\User;
use App\Likes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use BW\Vkontakte;

class BlogPostsController extends Controller
{


    public function index($category = false)
    {
        if (Auth::user()) {
            if ($category) {
                $id = BlogPostsCategories::where('code', $category)->first()->id;
                $posts = BlogPosts::where('blog_posts_categories_id', $id)->get();
            } else {
                $posts = BlogPosts::all();
            }
            return view("blog.first", ["posts" => $posts]);
        } else {
            return view("blog.overlay");
        }
    }

    public function detail(BlogPosts $post)
    {
        $post->increment('views');

        return view("blog.blogPostDetail", ["post" => $post]);
    }

    public function addLike(BlogPosts $post)
    {
        Likes::create([
            'user_id' => Auth::user()->id,
            'blog_posts_id' => $post->id,
        ]);
    }

    public function create()
    {
        Storage::put(
            'blog_pics/' . request("code") . "_" . request()->file('picture')->getClientOriginalName(),
            file_get_contents(request()->file('picture')->getRealPath())
        );

        BlogPosts::create([
            "name" => request("name"),
            "code" => request("code"),
            "user_id" => Auth::user()->id,
            "picture" => request("code") . "_" . request()->file('picture')->getClientOriginalName(),
            "tags" => request("tags"),
            "date" => (request("date")) ? strtotime(request("date")) : date("Y-m-d H:i:s"),
            "blog_posts_categories_id" => request("category"),
            "title" => request("title"),
            "description" => request("description"),
            "preview_text" => request("preview_text"),
            "text" => request("text")
        ]);
        return redirect("/cms/home");
    }

    public function edit($blog_post_id)
    {

        $fields = [
            "name" => request("name"),
            "code" => request("code"),
            "user_id" => Auth::user()->id,
            "tags" => request("tags"),
            "date" => (request("date")) ? request("date") : date("Y-m-d H:i:s"),
            "blog_posts_categories_id" => request("category"),
            "title" => request("title"),
            "description" => request("description"),
            "preview_text" => request("preview_text"),
            "text" => request("text")
        ];
        if (request()->file('picture')) {
            Storage::put(
                'blog_pics/' . request("code") . "_" . request()->file('picture')->getClientOriginalName(),
                file_get_contents(request()->file('picture')->getRealPath())
            );
            $fields["picture"] = request("code") . "_" . request()->file('picture')->getClientOriginalName();
        }
//        dd($fields);
        BlogPosts::find($blog_post_id)->update($fields);
        return redirect("/cms/home");
    }

    public function vk()
    {

        $accessToken = 'a91d85326452da815ccc0cb2c55f52717eb0fe61db4b1ade68abc16de403b184cb2d4f4bc378054729f05';
        $vkAPI = new \BW\Vkontakte(['access_token' => $accessToken]);
        $publicID = 29901857;

        if ($vkAPI->postToPublic($publicID, "Привет!", $_SERVER["DOCUMENT_ROOT"] . '/img/bestgirl.png', ['вконтакте api', 'автопостинг'])) {

            echo "Ура! Всё работает, пост добавлен\n";

        } else {

            echo "Фейл, пост не добавлен(( ищите ошибку\n";
        }
    }
}
