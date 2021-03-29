<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);

// Route::get('/api/inventory-on-hand', function () {
//     return response()->json([
//         'message' => 'hello'
//     ]);
// });

// Route::get('/api/inventory-on-hand/material-type-1', function () {
//     return response()->json([
//         'data' => [
//             'detail' => [
//                 'bales' => 52,
//                 'total_weight_in_grams' => 75020
//             ]
//         ]
//     ]);
// });

// Route::get('/api/inventory-on-hand', function () {
//     return response()->json([
//         'data' => [
//             [
//                 'key' => 'material-type-1',
//                 'detail' => [
//                     'bales' => 52,
//                     'total_weight_in_grams' => 75020
//                 ]
//             ],
//             [
//                 'key' => 'material-type-2',
//                 'detail' => [
//                     'bales' => 52,
//                     'total_weight_in_grams' => 75020
//                 ]
//             ],
//             [
//                 'key' => 'material-type-3',
//                 'detail' => [
//                     'bales' => 52,
//                     'total_weight_in_grams' => 75020
//                 ]
//             ]
//         ]
//     ]);
// });