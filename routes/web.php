<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {


	Route::prefix('products')->group(function () {
		Route::resource('categories', ProductCategoryController::class,[
			'names' => [
		        'index' => 'categories',
		        'create' => 'categories.create',
		        'store' => 'categories.store',
		        'edit' => 'categories.edit',
		        'update' => 'categories.update',
		        'delete' => 'categories.delete',
		    ]
		]);

		Route::get('/', [ProductController::class, 'index'])->name('products');
		Route::get('add', [ProductController::class, 'create'])->name('products.create');
		Route::post('add', [ProductController::class, 'store'])->name('products.store');
		Route::get('show/{id}', [ProductController::class, 'show'])->name('products.show');
		Route::get('edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
		Route::put('update/{id}', [ProductController::class, 'update'])->name('products.update');
		Route::delete('delete', [ProductController::class, 'destroy'])->name('products.delete');
	});
});
