<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create()
    {
//
        Comments::create([
            "text" => request("text"),
            "blog_posts_id" => request("post_id"),
            "user_id" => Auth::user()->id,
        ]);

        return back();
    }
}
