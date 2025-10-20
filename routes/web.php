<?php

use App\Http\Controllers\Aboutcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
Route::get("article/{title}/{id}",[PostController::class,"show"])->name("posts.show");
Route::get("frontPosts",[PostController::class,"front"])->name("posts.front");

Route::get("about", [Aboutcontroller::class,"index"])->name("about");
Route::get("contact", [ContactController::class, "index"])->name("contact");

Route::get("category/{slug}/{id}", [CategoryController::class, "show"])->name("categorie.show");


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

});

require __DIR__.'/auth.php';
