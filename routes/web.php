<?php

use App\Models\Neko; 
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NekoController;
use App\Http\Controllers\UserController;

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
//  Common Resource Routes 
// index – Show all items
// show – Show single item
// create – Show form to create new item
// store – Store new item
// edit – Show form to create new item
// update – Update item
// destroy –  Delete item

// Show all Nekos
Route::get('/', [NekoController::class, 'index']);

// Route::get('/neko/{id}', function($id) {
//     return view('neko', [
//         'Neko' => Neko::find($id)
//     ]);
// })->where('id', '[0-9]+');

// Route::get('/neko/{neko}', function (Neko $Neko) {
//     return view('neko', [
//         'Neko' => $Neko
//     ]);
// });

// Update Neko Card
Route::get('/neko/{neko}/edit', [NekoController::class, 'edit'])->middleware('auth');

// Submit Updated Neko Card
Route::put('/neko/{neko}', [NekoController::class, 'update'])->middleware('auth');

// Create Neko Card
Route::get('/neko/create', [NekoController::class, 'create'])->middleware('auth');

// Store Neko Card
Route::post('/neko', [NekoController::class, 'store'])->middleware('auth');

// Delete Neko Card
Route::delete('/neko/{neko}', [NekoController::class, 'delete'])->middleware('auth');

// Get Neko (It's a wildcard, so you move it to the bottom)
Route::get('/neko/{neko}', [NekoController::class, 'show']);

// Create User 
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store User
Route::post('/users', [UserController::class, 'store']);

// Auth User
// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login Auth
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
