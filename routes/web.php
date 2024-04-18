<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// returns the login form

Route::get('/auth/login', AuthController::class. '@showLoginForm')->name('auth.login');
// logs the user in
Route::post('/auth/login', AuthController::class. '@login');
// returns the registration form
Route::get('/auth/register', AuthController::class. '@showRegistrationForm')->name('auth.registration');
// registers a user
Route::post('/auth/register', AuthController::class. '@register');


// returns the home page with all products
Route::get('/', ProductController::class .'@index')->name('products.index');
// returns the form for adding a product
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


