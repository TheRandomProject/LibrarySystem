<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowedsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibrariansController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StudentsController;
use App\Models\Borrowed;
use GuzzleHttp\Middleware;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route::prefix('/admin')
//     ->middleware('admins')

//     ->group(function () {
//         Route::resource('/', AdminController::class);
//     });

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::name('admin.')->group(function () {
        Route::resource('books', BooksController::class);
        Route::resource('/students', StudentsController::class);
        Route::resource('/borroweds', BorrowedsController::class);
        Route::resource('/librarians', LibrariansController::class);
    });
});

Route::group(['prefix' => 'librarian'], function () {

    Route::get('/login', [LibrariansController::class,]);

    // Route::get('/', [LibrariansController::class, 'index'])->name('librarian.dashboard');

    Route::resource('/books', BooksController::class);
    Route::resource('/borroweds', BorrowedsController::class);
    Route::resource('/students', StudentsController::class);
});


Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
