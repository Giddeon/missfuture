<?php

namespace App\Http\Controllers;

use App\BlogPosts;
use App\BlogPostsCategories;
use App\Likes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogPostsController extends Controller
{


    public function index($category = false)
    {
        if (Auth::user()) {

            $order = "id";
            if (request("order") == "popularity") {
                $order = "likes";
            } elseif (request("order") == "popularity") {

            }
            if ($category) {
                $id = BlogPostsCategories::where('code', $category)->first()->id;
                $posts = BlogPosts::where('blog_posts_categories_id', $id)->get();
            } elseif (request("tag")) {
                $posts = BlogPosts::where('tags', 'like', "%" . request("tag") . "%")->get();
            } else {
                $posts = BlogPosts::orderBy($order, "desc")->get();
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
        $pic_name = "";
        if (request()->file('picture')) {
            $pic_name = request("code") . "_" . request()->file('picture')->getClientOriginalName();
            Storage::put(
                'blog_pics/' . $pic_name,
                file_get_contents(request()->file('picture')->getRealPath())
            );
        }
        BlogPosts::create([
            "name" => request("name"),
            "code" => date("Y-m-d") . "-" . request("code"),
            "user_id" => 5,
            "picture" => $pic_name,
            "tags" => request("tags"),
            "date" => (request("date")) ? strtotime(request("date")) : date("Y-m-d H:i:s"),
            "blog_posts_categories_id" => request("category"),
            "title" => request("title"),
            "description" => request("description"),
            "preview_text" => request("preview_text"),
            "text" => request("text")
        ]);

        $res = file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/sitemap.xml", str_replace("</urlset>", "<url>
        <loc>http://missfuture.ru/posts/" . date("Y-m-d") . "-" . request("code") . "</loc>
        <priority>1</priority>
    </url></urlset>", file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/sitemap.xml")));
//        dd(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/sitemap.xml"));
        return redirect("/cms/home");
    }

    public function edit($blog_post_id)
    {

        $fields = [
            "name" => request("name"),
            "code" => request("code"),
            "user_id" => 5,
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

    public function delete(BlogPosts $post)
    {
        $post->delete();
        return redirect("/cms/home");
    }

    public function vk()
    {

        $accessToken = 'a91d85326452da815ccc0cb2c55f52717eb0fe61db4b1ade68abc16de403b184cb2d4f4bc378054729f05';
        $vkAPI = new \BW\Vkontakte(['access_token' => $accessToken]);
        $publicID = 145247465;

        if ($vkAPI->postToPublic($publicID, "Привет!", $_SERVER["DOCUMENT_ROOT"] . '/img/bestgirl.png', ['вконтакте api', 'автопостинг'])) {

            echo "Ура! Всё работает, пост добавлен\n";

        } else {

            echo "Фейл, пост не добавлен(( ищите ошибку\n";
        }
    }
}
