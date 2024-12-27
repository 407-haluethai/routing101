<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


//callback function
//functionที่ถูกเรียกใช้เมื่อฟังก์ชันหลักทำบ้างอย่างเสร็จ
//อันนี้ถูกส่ง Route::get() ถูกเรียกใช้เมื่อuseเข้าถึง/
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/user', [UserController::class, 'index']);
//
//Route::get('/user/{id}', function (string $id) {
//    return 'User '.$id;
//});

// Route definition...
Route::get('/user/{user}', [UserController::class, 'show']);

//Middleware: เส้นทางนี้ถูกป้องกันด้วย Middleware  ต้องเข้าสู้ระบบก่อนถึงดูสินค้าได้
//ProductController
Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('Products.Index');
Route::get('/products/{id}', [ProductController::class, 'show'])->middleware(['auth', 'verified']);



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
