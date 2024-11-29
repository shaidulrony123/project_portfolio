<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'HomePage']);

Route::get('/dashboard', function () {
    return view('backend.layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// frontend route
    // service page route
    Route::get('/get-service-data', [ServiceController::class, 'GetServiceData']);
    // project page route
    Route::get('/get-project-data', [ProjectController::class, 'GetProjectData']);
    // portfolio page route
    Route::get('/get-portfolio', [HomeController::class, 'GetPortfolioData']);
    // service page route
    Route::get('/get-service', [HomeController::class, 'GetServiceData']);
// frontend route

// Home sidebar route
Route::get("/home-sidebar-page", [SidebarController::class, 'HomeSidebarPage']);
Route::get("/home-sidebar-list", [SidebarController::class, 'HomeSidebarList']);
Route::post("/home-sidebar-by-id", [SidebarController::class, 'HomeSidebarById']);
Route::post("/home-sidebar-update", [SidebarController::class, 'HomeSidebarUpdate']);
// Home sidebar route

// service page route
Route::get("/service-page", [ServiceController::class, 'ServicePage']);
Route::get("/service-list", [ServiceController::class, 'ServiceList']);
Route::post("/service-by-id", [ServiceController::class, 'ServiceById']);
Route::post("/service-create", [ServiceController::class, 'ServiceCreate']);
Route::post("/service-update", [ServiceController::class, 'ServiceUpdate']);
Route::post("/service-delete", [ServiceController::class, 'ServiceDelete']);

// service page route

// project page route
Route::get("/project-page", [ProjectController::class, 'ProjectPage']);
Route::get("/project-list", [ProjectController::class, 'ProjectList']);
Route::post("/project-by-id", [ProjectController::class, 'ProjectById']);
Route::post("/project-create", [ProjectController::class, 'ProjectCreate']);
Route::post("/project-update", [ProjectController::class, 'ProjectUpdate']);
Route::post("/project-delete", [ProjectController::class, 'ProjectDelete']);

// project page route

// category page route
Route::get("/category-page", [CategoryController::class, 'CategoryPage']);
Route::get("/category-list", [CategoryController::class, 'CategoryList']);
Route::post("/category-by-id", [CategoryController::class, 'CategoryById']);
Route::post("/category-create", [CategoryController::class, 'CategoryCreate']);
Route::post("/category-update", [CategoryController::class, 'CategoryUpdate']);
Route::post("/category-delete", [CategoryController::class, 'CategoryDelete']);

// category page route

// blog page route
Route::get("/blog-page", [BlogController::class, 'BlogPage']);
Route::get("/blog-list", [BlogController::class, 'BlogList']);
Route::post("/blog-by-id", [BlogController::class, 'BlogById']);
Route::get('/categories', [BlogController::class, 'getCategories']);
Route::post('/blog-create', [BlogController::class, 'BlogCreate']);
Route::post("/blog-update", [BlogController::class, 'BlogUpdate']);
Route::post("/blog-delete", [BlogController::class, 'BlogDelete']);
// blog page route

// pricing page route
Route::get("/pricing-page", [PricingController::class, 'PricingPage']);
Route::get("/pricing-list", [PricingController::class, 'PricingList']);
Route::post("/pricing-by-id", [PricingController::class, 'PricingById']);
Route::post('/pricing-create', [PricingController::class, 'PricingCreate']);
Route::post("/pricing-update", [PricingController::class, 'PricingUpdate']);
Route::post("/pricing-delete", [PricingController::class, 'PricingDelete']);
// pricing page route

require __DIR__.'/auth.php';
