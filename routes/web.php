<?php
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function() {
    return view('about');
});

// Route::resource('posts', 'PostsController');
Route::Get('/posts/{id}', function($id) {
    $post = Post::find($id);

    return view('post')->withPost($post);
});
