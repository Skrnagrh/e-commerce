<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\QuestreplyController;
use App\Http\Controllers\DetailProductController;

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
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [HomeController::class, 'home'])->middleware('auth');
Route::get('/product_details/{id}', [DetailProductController::class, 'product_details']);
Route::post('/add_cart/{id}', [DetailProductController::class, 'add_cart']);
Route::get('/show_cart', [DetailProductController::class, 'show_cart']);
Route::get('/remove_cart/{id}', [DetailProductController::class, 'remove_cart']);
Route::get('/order', [OrderController::class, 'order']);


Route::post('/add_comment', [CommentController::class, 'add_comment']);
Route::get('/delete_comment/{id}', [CommentController::class, 'delete_comment']);

Route::post('/add_reply', [ReplyController::class, 'add_reply']);
Route::get('/delete_reply/{id}', [ReplyController::class, 'delete_reply']);

Route::post('/question', [QuestreplyController::class, 'question']);
Route::get('/delete_question/{id}', [QuestreplyController::class, 'delete_question']);
Route::post('/questreply', [QuestreplyController::class, 'questreply']);
Route::get('/delete_questreply/{id}', [QuestreplyController::class, 'delete_questreply']);

// Route::resource('/update_biodata', UserController::class)->middleware('auth');

// Toko
Route::get('/toko', [TokoController::class, 'index']);
Route::post('/add_toko', [TokoController::class, 'add_toko']);


Route::resource('/admin/category', CategoryController::class)->middleware('auth');
Route::resource('/admin/product', ProductController::class)->middleware('auth');
Route::get('/admin/order', [AdminOrderController::class, 'index'])->middleware('auth');
Route::get('/admin/order/{id}', [AdminOrderController::class, 'edit'])->middleware('auth');
Route::get('/admin/order/proses', [AdminOrderController::class, 'proses'])->middleware('auth');
