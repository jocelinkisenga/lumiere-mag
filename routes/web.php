<?php

use App\Http\Controllers\Aboutcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\VideoController;
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


Route::get('/',[HomeController::class,"index"])->name("home");
Route::get("/live",[HomeController::class,"live"])->name("live");
Route::get("article/{post:slug}",[PostController::class,"show"])->name("posts.show");
Route::get("frontPosts",[PostController::class,"front"])->name("posts.front");
Route::get("podcast/{podcast:slug}", [PodcastController::class, "show"])->name("podcast.show");
Route::get("video/{video:slug}", [VideoController::class, "show"])->name("video.show");
Route::get("about", [Aboutcontroller::class,"index"])->name("about");
Route::get("contact", [ContactController::class, "index"])->name("contact");
Route::get("front/videos", [VideoController::class, "front"])->name("video.front");
Route::get("category/{slug}/{id}", [CategoryController::class, "show"])->name("categorie.show");
Route::get("front/pdocast", [PodcastController::class, "front"])->name("podcast.front");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get("articles",[PostController::class,"index"])->name("posts.index");
    Route::get("article",[PostController::class,"create"])->name("posts.create");
    Route::post("articles",[PostController::class,"store"])->name("posts.store");
    Route::get("/dashboard",[HomeController::class,"dashboard"])->name("dashboard");
    Route::get("delete/article/{id}",[PostController::class,"delete"])->name("post.delete");

    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get("categorie",[CategoryController::class, "create"])->name("categorie.create");
    Route::post("categorie", [CategoryController::class, "store"])->name("categorie.store");

    Route::get("adminPodcast", [PodcastController::class, "index"])->name("podcast.index");

    Route::get("podcast", [PodcastController::class, "create"])->name("podcast.create");
    Route::post("storePodcast", [PodcastController::class, "store"])->name("podcast.store");

    Route::get("/admin/videos", [VideoController::class, "admin_videos"])->name("admin.videos");
    Route::get("create/video", [VideoController::class, "create"])->name("video.create");
    Route::post("store/video", [VideoController::class, "store"])->name("video.store");
    Route::get("delete/video/{id}", [VideoController::class, "delete"])->name("video.delete");
    Route::get("delete/podcast/{id}",[PodcastController::class,"delete"])->name("podcast.delete");
    Route::get("delete/category/{id}", [CategoryController::class, "delete"])->name("category.delete");
    Route::get("comments/{id}", [CommentController::class, "comments"])->name("admin.comments");
        Route::get("delete/comment/{id}", [CommentController::class, "delete"])->name("comment.delete");
    Route::get("settings", [SettingsController::class, "index"])->name("settings");
});

require __DIR__.'/auth.php';
