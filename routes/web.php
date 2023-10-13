<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
