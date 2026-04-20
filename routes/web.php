<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard.index');
// FOR LOGIN PAGE
Route::get('/login', [AuthController::class, 'index'])->name('login');

// FOR LOGIN PROCCESS
Route::post('/login', [AuthController::class, 'login'])->name('login.index');

Route::post('/registration', [AuthController::class, 'register'])->name('register.index');

Route::get('/about/mission-vision', function () {
    return view('about.vision-mission');
})->name('vision.index');

Route::get('/about/founders-advisory', function () {
    return view('about.founders-advisory');
})->name('founders.index');

Route::get('/about/ecosystem', function () {
    return view('about.our-ecosystem');
})->name('ecosystem.index');

Route::get('/about/green-impact-fund', function () {
    return view('about.green-impact');
})->name('impact.index');

Route::get('/about/coming-soon', function () {
    return view('about.coming-soon');
})->name('coming-soon.index');


// BLOGS
Route::get('/home/blogs/live-search', [BlogsController::class, 'search'])->name('live.cat.search');
Route::get('/home/blogs',[BlogsController::class,'index'])->name('blog.index');
Route::get('/home/blog/{slug}',[BlogsController::class,'single'])->name('blog.single');
Route::get('/home/{category}',[BlogsController::class,'category'])->name('blog.category');
Route::get('/home/{category}/{subcategory}',[BlogsController::class,'subCategory'])->name('blog.subcategory');

Route::post('/admin/posts/comment',[BlogsController::class,'comment'])->name('posts.comment');

// CONTACT
Route::get('/about/contact', [ContactController::class, 'index'])->name('contact.index');

// TGS LIVE SEARCH
Route::get('/admin/posts/tags/live-search', [TagsController::class, 'search'])->name('live.search');


Route::middleware('jwtAuth')->group(function () {

    Route::get('/me', [AuthController::class, 'me']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // ADMIN
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');

    Route::get('/admin/posts',[BlogsController::class,'list'])->name('posts.list');
    Route::get('/admin/posts/add',[BlogsController::class,'create'])->name('posts.add');
    Route::post('/admin/posts/store',[BlogsController::class,'store'])->name('store.posts');
    Route::post('/admin/posts/editor-image', [BlogsController::class, 'uploadEditorImage'])->name('posts.editor-image');
    Route::get('/admin/posts/edit/{slug}', [BlogsController::class, 'edit'])->name('edit.post');
    Route::put('/admin/posts/update/{slug}', [BlogsController::class, 'update'])->name('update.post');
    Route::get('/admin/posts/delete/{slug}', [BlogsController::class, 'delete'])->name('delete.post');

    // CATEGORY
    Route::get('/admin/posts/categories',[CategoryController::class, 'index'])->name('posts.categories');
    Route::get('/admin/posts/categories/add',[CategoryController::class, 'add'])->name('categories.add');
    Route::post('/admin/posts/categories/store',[CategoryController::class, 'store'])->name('categories.store');
    Route::get('/admin/posts/categories/edit/{id}',[CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/admin/posts/categories/update/{id}',[CategoryController::class, 'update'])->name('categories.update');
    Route::get('/admin/posts/categories/delete/{id}',[CategoryController::class, 'delete'])->name('categories.delete');

    // TAGS
    Route::get('/admin/posts/tags',[TagsController::class, 'index'])->name('posts.tags');
    Route::post('/admin/posts/tags/add',[TagsController::class, 'store'])->name('tags.store');
    Route::put('/admin/posts/tags/update',[TagsController::class, 'update'])->name('tags.update');
    Route::get('/admin/posts/tags/delete/{id}',[TagsController::class, 'delete'])->name('tags.delete');

    // MENU
    Route::get('/admin/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/admin/menu/{name}', [MenuController::class, 'single'])->name('single.menu');
    Route::POST('/admin/menu/update-{id}', [MenuController::class, 'update'])->name('update.menu');

    // HOME
    Route::get('/admin/home', [HomeController::class, 'adminIndex'])->name('home.index');
    Route::POST('/admin/home/add-{id}', [HomeController::class, 'store'])->name('home.store');

});
