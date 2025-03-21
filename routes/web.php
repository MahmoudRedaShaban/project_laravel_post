<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(FrontEndController::class)->name('themes.')->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/categories/{id?}', 'categories')->name('categories');
    Route::get('/contact','contact')->name('contact');
    // Route::get('/single-blog/{id?}', 'blog')->name('singleBlog');
    Route::get('/login', 'login')->name('login')->middleware('guest');
});

Route::post('/subscripe', [SubscriberController::class, 'store'])->name('subscribe.store');

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// Blogs
Route::get('/blogs/my-blog',[BlogController::class, 'myblog'])->name('blogs.my-blog');
Route::resource('/blogs', BlogController::class);

// Comment
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';