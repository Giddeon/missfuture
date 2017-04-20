<?php

namespace App\Http\Controllers;

use App\BlogPostsCategories;
use App\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscriptions = Subscriptions::where("user_id", Auth::user()->id)->get();
        return view("blog.subscribe", ["subscriptions" => $subscriptions]);
    }

    public function create()
    {
//        dd(request()->all());

        foreach (request("subscribe") as $category_id) {
            Subscriptions::create([
                "name" => request("name"),
                "email" => request("email"),
                "blog_posts_categories_id" => $category_id,
                "user_id" => Auth::user()->id
            ]);
        }

        return redirect("/subscribe/?s=y");
    }
}
