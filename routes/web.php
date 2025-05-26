<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\AdminOrEditor;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;


//Route::get('/', function () {
   // return view('welcome');
//}); 

Route::get('/', [PageController::class, 'home'])->name('home');
// Route::get('/teas', [TeaController::class, 'index'])->name('teas.index');
// Route::get('/teas/{tea}', [TeaController::class, 'show'])->name('teas.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/ponuda', [TeaController::class, 'index'])->name('teas.index');
Route::get('/ponuda/{id}', [TeaController::class, 'show'])->name('teas.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(CheckUserLoggedIn::class)->group(function() {
//     Route::get('/login', [AuthController::class, 'login'])->name('login');
//     Route::post('/login', [AuthController::class, 'storeLogin'])->name('storeLogin');

//     Route::get('/register', [AuthController::class, 'register'])->name('register');
//     Route::post('/register', [AuthController::class, 'storeRegister'])->name('storeRegister');
// });

// Route::get('/logout', [AuthController::class, "logout"])->name('logout');

Route::get("/not-auth", [ProductController::class, "notAuth"])->name('not-auth');

Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
    // Profil admina
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Brisanje proizvoda
   Route::get('/tea/delete/{id}', [ProductController::class, 'delete'])->name('tea.delete');
    Route::post('/tea/destroy/{id}', [ProductController::class, 'destroy'])->name('tea.destroy');

    // Prikaz i izmena narudžbina (status)
    Route::get('/orders', [OrderController::class, 'indexAdmin'])->name('admin.orders.index');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');

    
    Route::get('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::post('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


Route::middleware(['auth', AdminOrEditor::class])->prefix('admin')->group(function () {
    // Dodavanje novog proizvoda
    Route::get('/product_add', [ProductController::class, 'add'])->name('product_add');
    Route::post('/product_create', [ProductController::class, 'create'])->name('product_create');

    // Izmena proizvoda
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/edit-product/{id}', [ProductController::class, 'update'])->name('update');

    // Lista proizvoda 
    Route::get('/proizvodi', [ProductController::class, 'list'])->name("proizvodi");

    // Chart (ako želiš da editor vidi grafikone)
    Route::get('/chart', [ProductController::class, 'chart'])->name('admin.chart');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/naruci/{tea}', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/naruci/{tea}', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/moje-narudzbine', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/{order}/delete', [OrderController::class, 'delete'])->name('orders.delete');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

     Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
});


// Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
//     Route::get('/', [ProductController::class, 'adminDashboard'])->name('admin.dashboard');
    
//     Route::get('/product_add', [ProductController::class, 'add'])->name('product_add');
//     Route::post('/product_create', [ProductController::class, 'create'])->name('product_create');

//     Route::get('/tea/delete/{id}', [ProductController::class, 'delete'])->name('tea.delete');
//     Route::post('/tea/destroy/{id}', [ProductController::class, 'destroy'])->name('tea.destroy');

//     Route::get('/proizvodi', [ProductController::class, 'list'])->name("proizvodi");
// });

// Route::middleware(['auth', IsEditor::class])->prefix('admin')->group(function () {
//     Route::get('/product_add', [ProductController::class, 'add'])->name('editor.product_add');
//     Route::post('/product_create', [ProductController::class, 'create'])->name('editor.product_create');

//     Route::get('/proizvodi', [ProductController::class, 'list'])->name("editor.proizvodi");
// });

require __DIR__.'/auth.php';
