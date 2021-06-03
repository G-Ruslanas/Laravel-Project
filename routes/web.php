<?php

use App\Http\Controllers\CommentsRepliesController;
use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'show'])->name('about');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'index'])->name('post');
Route::get('/posts/{category}', [App\Http\Controllers\PostController::class, 'categories'])->name('posts.categories');
Route::get('/search/', [App\Http\Controllers\PostController::class, 'search'])->name('posts.search');


Route::middleware('auth')->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
    Route::delete('/admin/posts/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/admin/posts/{post}/patch', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::get('/admin/categories',[App\Http\Controllers\AdminCategoriesController::class,'index'])->name('admin.categories.index');
    Route::post('/admin/categories',[App\Http\Controllers\AdminCategoriesController::class,'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit',[App\Http\Controllers\AdminCategoriesController::class,'edit'])->name('admin.categories.edit');
    Route::patch('/admin/categories/{category}/update',[App\Http\Controllers\AdminCategoriesController::class,'update'])->name('admin.categories.update');
    Route::get('/admin/users/{user}/profile',[App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
    Route::put('/admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.edit');
});

Route::middleware('role:ADMIN')->group(function(){
//Users
    Route::delete('/admin/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/admin/users',[App\Http\Controllers\UserController::class, 'index'])->name('users.index');
//Roles
    Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::post('/admin/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::delete('/admin/roles/{role}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/admin/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/admin/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
//Comments
    Route::patch('/admin/comments/{comment}/update',[App\Http\Controllers\PostCommentsController::class,'update'])->name('admin.update');
    Route::delete('/admin/comments/{comment}/delete',[App\Http\Controllers\PostCommentsController::class,'destroy'])->name('admin.destroy');
    Route::get('/admin/comments',[App\Http\Controllers\PostCommentsController::class,'index'])->name('admin.comments.index');
    Route::get('/admin/comments/{post}',[App\Http\Controllers\PostCommentsController::class,'show'])->name('admin.show');
    Route::post('/admin/comments',[App\Http\Controllers\PostCommentsController::class,'store'])->name('admin.store');
//Categories
    Route::delete('/admin/categories/{category}/delete',[App\Http\Controllers\AdminCategoriesController::class,'destroy'])->name('admin.categories.destroy');
});

//Route::middleware(['auth','can:view,user'])->group(function(){
//
//});

//Roles
//Route::middleware(['role:ADMIN','auth'])->group(function() {
//
////    Route::put('/admin/roles/{role}/attach', [App\Http\Controllers\RoleController::class, 'attach'])->name('role.permission.attach');
////    Route::put('/admin/roles/{role}/detach', [App\Http\Controllers\RoleController::class, 'detach'])->name('role.permission.detach');
////Permissions
////    Route::get('/admin/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
////    Route::post('/admin/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
////    Route::delete('/admin/permissions/{permission}/destroy', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');
////    Route::get('/admin/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
////    Route::put('/admin/permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
////
//});
