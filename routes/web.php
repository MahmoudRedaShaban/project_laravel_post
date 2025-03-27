<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;



// Theme Route
Route::controller(FrontEndController::class)->name('themes.')->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/categories/{id?}', 'categories')->name('categories');
    Route::get('/contact','contact')->name('contact');
    Route::get('/login', 'login')->name('login')->middleware('guest');
});
// Subscription
Route::post('/subscripe', [SubscriberController::class, 'store'])->name('subscribe.store');

// Contact
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// Blogs
Route::get('/blogs/my-blog',[BlogController::class, 'myblog'])->name('blogs.my-blog');
Route::resource('/blogs', BlogController::class)->except('index');

// Comment
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');



require __DIR__.'/auth.php';
