<?php

use App\Http\Controllers\CommentBookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostBookmarkController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::loginUsingId(2);


Route::get('/', function () {

    $posts = Post::with(['user', 'tags', 'comment', 'post_bookmark'])
    ->when(request('order'), function($query)
    {
        switch (request('order')) {
            case 'rating':
                return $query->latest();
            case 'latest':
                return $query->oldest();
            case 'oldest':
                return $query->latest();
        }
    })
    ->paginate(10);

    return view('welcome', compact('posts'));

})->name('home');

Route::get('post/{slug}/bookmark', PostBookmarkController::class)
->name('post.bookmark');

Route::get('comment/{slug}/bookmark', CommentBookmarkController::class)
->name('comment.bookmark');

Route::resource('post', PostController::class)
->parameters([
    'post' => 'post:slug',
]);

Route::resource('comment', CommentController::class);

Route::view('questions','questions')->name('questions');

Route::view('users','users')->name('users');

Route::view('tags','tags')->name('tags');

Route::view('profile','profile.index')->name('profile');

Route::view('test','test')->name('test');