<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

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

/** ----------- Admin Routes ------------------ */

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->middleware(['admin'])->name('admin.dashboard');
    Route::view('/login', 'admin.login')->name('admin.login_from');
    Route::post('/login', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');

    Route::get('category', [CategoryController::class, 'Index'])->middleware('admin')->name('admin.view_category');
    Route::get('add-category', [CategoryController::class, 'Create'])->middleware('admin')->name('admin.add_category');
    Route::post('add-category', [CategoryController::class, 'Store'])->middleware('admin')->name('admin.add_category');

    Route::get('edit-category/{category_id}', [CategoryController::class, 'Edit'])->middleware('admin')->name('admin.edit_category');

    Route::put('update-category/{category_id}', [CategoryController::class, 'Update'])->middleware('admin')->name('admin.update_category');

    Route::get('delete-category/{category_id}', [CategoryController::class, 'Destroy'])->middleware('admin')->name('admin.delete_category');


    Route::get('posts', [PostController::class, 'index'])->middleware('admin')->name('admin.view_post');

    Route::get('add-post', [PostController::class, 'create'])->middleware('admin')->name('admin.add_post');

    ROute::post('add-post', [PostController::class, 'store'])->middleware('admin')->name('admin.add_post');
});

/** -----------------End Admin Routes */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
