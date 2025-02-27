<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/admin', function () {
    return view('admin.index', [
        'books' => App\Models\Book::all(),
        'categories' => App\Models\Category::all(),
        'inventories' => App\Models\Inventory::all(),
        'officers' => App\Models\Officer::all(),
        'users' => App\Models\User::all(),
    ]);
})->name('admin.index');

Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);
Route::resource('inventories', InventoryController::class);
Route::resource('officers', OfficerController::class);
Route::resource('users', UserController::class);


