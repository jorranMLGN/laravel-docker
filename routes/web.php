<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
// returns the login form

Route::get('/login', AuthController::class. '@showLoginForm')->name('login');
// logs the user in
Route::post('/login', AuthController::class. '@login');
// returns the registration form
Route::get('/register', AuthController::class. '@showRegistrationForm')->name('register');
// registers a user
Route::post('/register', AuthController::class. '@register');

// returns the dashboard
Route::get('/dashboard', AuthController::class. '@dashboard')->name('dashboard');
// logs the user out
Route::get('/logout', AuthController::class. '@logout')->name('logout');


// returns the home page with all products
Route::get('/', [HomeController::class, 'index'])->name('home');

// returns the home page with all products
Route::get('/products', ProductController::class . '@index')->name('products.index');
// returns the form for creating a product
Route::get('/products/create', ProductController::class . '@create')->name('products.create');
// adds a product to the database
Route::post('/products', ProductController::class .'@store')->name('products.store');
// returns a page that shows a full product
Route::get('/products/{product}', ProductController::class .'@show')->name('products.show');
// returns the form for editing a product
Route::get('/products/{product}/edit', ProductController::class .'@edit')->name('products.edit');
// updates a product
Route::put('/products/{product}', ProductController::class .'@update')->name('products.update');
// deletes a product
Route::delete('/products/{product}', ProductController::class .'@destroy')->name('products.destroy');



// returns the about page
Route::get('/about', function () {
    return view('about');
})->name('about');

// returns the contacts page
Route::get('/contacts/create', ContactController::class . '@create')->name('contacts.create');

// adds a contact message to the database
Route::post('/contacts/create', ContactController::class . '@store')->name('contacts.store');


// returns the contacts page dashboard
Route::get('/contacts/dashboard', [ContactController::class, 'dashboard'])->name('dashboard');

// Show a specific message
Route::get('/contacts/{message}', ContactController::class .'@show')->name('contacts.show');


// returns the contacts page
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// deletes a message
Route::delete('/contacts/{message}', ContactController::class .'@destroy')->name('contacts.destroy');

