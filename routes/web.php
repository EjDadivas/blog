<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $posts = Post::all();
    return view('posts',[
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function ($slug) {
    //find a post by its slug and pass it in a view called post
    //keyword: view, post
    //Post is a class
    return view('post', [
        'post' => Post::find($slug)
    ]);
})->where('post', '[A-z_\-]+');
