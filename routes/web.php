<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [
    "uses" => "BlogPostsController@index",
    "as" => "blog_posts"
]);
Route::get('/category/{category}', [
    "uses" => "BlogPostsController@index",
    "as" => "blog_posts_by_category"
]);
Route::get('/posts/{post}', [
    "uses" => "BlogPostsController@detail",
    "as" => "blog_post"
]);
Route::get('/posts/delete/{post}', [
    "uses" => "BlogPostsController@delete",
    "as" => "deletePost"
]);
Route::get('/cms/posts/{post}', [
    "uses" => "CmsController@editPost",
    "as" => "edit_post"
]);
Route::post('/likes/{post}', [
    "uses" => "BlogPostsController@addLike",
    "as" => "add_like"
]);
Route::get('/cms', [
    "uses" => "CmsController@auth",
    "as" => "cms.auth"
]);
Route::get('/cms/home', [
    "uses" => "CmsController@index",
    "as" => "cms.home"
]);
Route::get('/cms/create_post', [
    "uses" => "CmsController@createPost",
    "as" => "cms.create_post"
]);
Route::get('/subscribe', [
    "uses" => "SubscribeController@index",
    "as" => "subscribe"
]);
Route::post('/subscribe/create', [
    "uses" => "SubscribeController@create",
    "as" => "subscribeCreate"
]);
Route::post('/comments/create', [
    "uses" => "CommentsController@create",
    "as" => "create_comment"
]);
Route::post('/blog_posts', [
    "uses" => "BlogPostsController@create",
    "as" => "blog_posts_create"
]);
Route::post('/blog_posts/{id}', [
    "uses" => "BlogPostsController@edit",
    "as" => "blog_posts_edit"
]);

Route::get('/about', function () {
    return view("blog.about");
});
Route::get('/testVK', [
    "uses" => "BlogPostsController@vk",
    "as" => "vk"
]);

Auth::routes();

Route::get('/home', 'HomeController@index');
