<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileSettingsController;

Route::get('/', [HomeController::class, 'HomePage'])->name('home');

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
    // product page route
    Route::get('/get-product-data', [ProductController::class, 'GetProductData']);
    // blog page route
    Route::get('/get-blog-data', [BlogController::class, 'GetBlogData']);
    // project page route
    Route::get('/get-project-data', [ProjectController::class, 'GetProjectData']);
    // portfolio page route
    Route::get('/get-portfolio', [HomeController::class, 'GetPortfolioPage'])->name('portfolio');
    // service page route
    Route::get('/get-service', [HomeController::class, 'GetServicePage'])->name('service');
    // resume page route
    Route::get('/get-resume', [HomeController::class, 'GetResumePage'])->name('resume');
    // product page route
    Route::get('/get-product', [HomeController::class, 'GetProductPage'])->name('product');
    // blog page route
    Route::get('/get-blog', [HomeController::class, 'GetBlogPage'])->name('blog');

    // contact page route
    Route::get('/get-contact', [HomeController::class, 'GetContactPage'])->name('contact');
    Route::get('/contact-categories', [ContactController::class, 'getCategories']);
// frontend route

// Home sidebar route
Route::middleware(['auth'])->group(function () {
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

// product page route
Route::get("/product-page", [ProductController::class, 'ProductPage']);
Route::get("/product-list", [ProductController::class, 'ProductList']);
Route::post("/product-by-id", [ProductController::class, 'ProductById']);
Route::post('/product-create', [ProductController::class, 'ProductCreate']);
Route::post("/product-update", [ProductController::class, 'ProductUpdate']);
Route::post("/product-delete", [ProductController::class, 'ProductDelete']);
// product page route

// contact page route


Route::get("/contact-page", [ContactController::class, 'ContactPage']);
Route::get("/contact-list", [ContactController::class, 'ContactList']);
Route::post("/contact-by-id", [ContactController::class, 'ContactById']);
Route::post('/contact-create', [ContactController::class, 'ContactCreate']);
Route::post("/contact-update", [ContactController::class, 'ContactUpdate']);
Route::post("/contact-delete", [ContactController::class, 'ContactDelete']);
Route::get('/contact/download/{filename}', [ContactController::class, 'downloadDocumentation']);

// contact page route

Route::get('/profile-page', [ProfileSettingsController::class, 'ProfilePage']);
Route::post('/change-password', [ProfileSettingsController::class, 'changePassword'])->name('change-password');
Route::post("/profile-update", [ProfileSettingsController::class, 'ProfileUpdate']);
});
require __DIR__.'/auth.php';
