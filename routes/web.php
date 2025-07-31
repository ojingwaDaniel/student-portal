<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\UserController;

// Public Welcome Page
Route::get('/',  [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

// Registration Routes (Only guests should access this)
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Dashboard - Accessible only by authenticated and verified users
Route::get('/dashboard', [StudentDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// Upload Routes - Restricted to users with 'upload-materials' gate access
Route::middleware(['auth', 'can:upload-materials'])->group(function () {
    Route::get('/upload', [MaterialController::class, 'create'])->name('upload.create');
    Route::post('/upload', [MaterialController::class, 'store'])->name('upload.store');
});


Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/lecturer/dashboard', function () {
        return view('lecturer.dashboard');
    })->name('lecturer.dashboard');
});
Route::get('/materials/upload', [MaterialController::class, 'create'])->name('materials.upload');

Route::post('/materials/store', [MaterialController::class, 'store'])->name('materials.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/create', [UserController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [UserController::class, 'store'])->name('admin.store');
});


// General materials page - for students or any authenticated user
Route::middleware(['auth'])->group(function () {
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/materials/handouts', [MaterialController::class, 'handouts'])->name('materials.handouts');
    Route::get('/materials/textbooks', [MaterialController::class, 'textbooks'])->name('materials.textbooks');
    Route::get('/materials/past-questions', [MaterialController::class, 'pastQuestions'])->name('materials.past_questions');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth scaffolding (login, logout, forgot password, etc.)
require __DIR__ . '/auth.php';
