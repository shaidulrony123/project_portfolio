<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SidebarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'HomePage']);

Route::get('/dashboard', function () {
    return view('backend.layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Home sidebar route
Route::get("/home-sidebar-page", [SidebarController::class, 'HomeSidebarPage']);
Route::get("/home-sidebar-list", [SidebarController::class, 'HomeSidebarList']);
Route::post("/home-sidebar-by-id", [SidebarController::class, 'HomeSidebarById']);
Route::post("/home-sidebar-update", [SidebarController::class, 'HomeSidebarUpdate']);
// Home sidebar route

require __DIR__.'/auth.php';
