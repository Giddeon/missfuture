<?php

namespace App\Http\Controllers;

use App\BlogPosts;
use App\BlogPostsCategories;
use App\Likes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class BlogPostsController extends Controller
{


    public function index($category = false)
    {
//        if (Auth::user()) {

        $order = "id";
        if (request("order") == "popularity") {
            $order = "likes";
        } elseif (request("order") == "popularity") {

        }
        if ($category) {
            $id = BlogPostsCategories::where('code', $category)->first()->id;
            $posts = BlogPosts::where('blog_posts_categories_id', $id)->orderBy($order, "desc");
        } elseif (request("q")) {
            $posts = BlogPosts::where('name', 'like', "%" . request("q") . "%");
        } elseif (request("tag")) {
            $posts = BlogPosts::where('tags', 'like', "%" . request("tag") . "%");
        } else {
            $posts = BlogPosts::orderBy($order, "desc");
        }
        $posts = $posts->where([
            ["date", "<=", Carbon::now()],
            ["status", 1]
        ])->paginate(5);
        return view("blog.first", ["posts" => $posts]);
//        } else {
//            return view("blog.overlay");
//        }
    }

    public function search()
    {
        $posts = [];
        if (request("q")) {
            $posts = BlogPosts::where('name', 'like', "%" . request("q") . "%")->orWhere('tags', 'like', "%" . request("q") . "%");
            if (request("category")) {
                $posts = $posts->where("blog_posts_categories_id", request("category"));
            }
            $posts = $posts->where([
                ["date", "<=", Carbon::now()],
                ["status", 1]
            ])->get();
        }

        $categories = BlogPostsCategories::all();
        return view("blog.search", ["posts" => $posts, "categories" => $categories]);
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
            "date" => (request("date")) ? request("date") : date("Y-m-d H:i:s"),
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
        $date = new \DateTime();
//            $date->modify('-5 minutes');
        $date->modify('-2 days');
        $formatted_date = $date->format('Y-m-d H:i:s');
        $posts = BlogPosts::find(21)->get();
        $vkAPI = new \BW\Vkontakte();
        $publicID = 145247465;
        foreach ($posts as $post) {
            if ($vkAPI->postToPublic($publicID, $post->preview_text . "\n\n https://missfuture.ru/posts/" . $post->code, $_SERVER["DOCUMENT_ROOT"] . "/blog_pics/" . $post->picture, explode(",", $post->tags))) {

                echo "Ура! Всё работает, пост добавлен\n";

            } else {

                echo "Фейл, пост не добавлен(( ищите ошибку\n";
            }
        }
    }

    public function fb()
    {
        $fb = app(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk::class);


//        if (request()) {

//        }


        $token = "EAASlmv6k7v8BAD66RNIp5KOFfJb9Vq1JAhiInIZBENlLFIrOLKqlTgOOPbip2e507n9DAKbcW7GrJUp7zFGZAw45xKCapqonUgOWzGHP0kLtEcSlAipsgqFhHhXywypTidGOHlCMCJ81gqheQAi44CZCHly37pZAGbUIkho3vwZDZD";


        $fb->post("1509230889095947/feed", ["message" => "test"], $token);

//        $token = $fb->getAccessTokenFromRedirect();
//
//        if (!$token) {
//            return redirect($fb->getLoginUrl(['manage_pages', 'publish_actions', 'user_managed_groups ']));
//        } else {
//            if (!$token->isLongLived()) {
//                // OAuth 2.0 client handler
//                $oauth_client = $fb->getOAuth2Client();
//
//                // Extend the access token.
//                try {
//                    $token = $oauth_client->getLongLivedAccessToken($token);
//                } catch (Facebook\Exceptions\FacebookSDKException $e) {
//                    dd($e->getMessage());
//                }
//            }
//
//            $fb->setDefaultAccessToken($token);
//
//            session()->put('fb_user_access_token', (string)$token);
//            dd($token);
//        }

    }
}
