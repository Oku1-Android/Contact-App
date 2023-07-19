<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('/welcome');
// });

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])
->name('home');

//Route::resource('/contacts', ContactController::class)->except('index', 'show');
//Route::resource('/contacts', ContactControllerv::class)->only('index', 'show');

Route::resources([
    '/contacts' => ContactController::class,
    '/companies' => CompanyController::class
]);



//Route::put('/contacts.create', [ContactController::class, 'create'])->name('contacts.create');

//Route::GET('/contacts.create', [ContactController::class, 'create'])->name('contacts.create');

// Route::post('/contacts.store', [ContactController::class, 'store'])->name('contacts.store');


// Route::get('contacts/{id}.show', [ContactController::class, 'show'])->name('contacts.show');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/logout', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
