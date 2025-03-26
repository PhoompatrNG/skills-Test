<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Route::get('/register', [Controller::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [Controller::class, 'register'])->name('register');
Route::post('/login', [Controller::class, 'login'])->name('login');
Route::post('/logout', [Controller::class, 'logout'])->name('logout');
Route::post('/customer', [Controller::class, 'store'])->name('customer.store');
Route::post('/destroy/{post}', [Controller::class, 'destroy'])->name('customer.destroy');


Route::get('/', [Controller::class, 'showLoginForm'])->name('login.form');
Route::get('/Home', [Controller::class, 'home'])->name('home');
Route::get('/add', [Controller::class, 'add'])->name('add');
Route::get('/edit/{post}', [Controller::class, 'add'])->name('customer.edit');

Route::delete('/customer/{customer}', [Controller::class, 'destroy'])->name('customer.destroy');

// Route::get('/export/users', [Controller::class, 'exportUsersPDF'])->name('export.users.pdf');
// Route::get('/createFolder', [Controller::class, 'createFolder'])->name('createFolder');
// Route::post('/createFile', [Controller::class, 'createFile'])->name('createFile');
// Route::get('/delete-file/{fileId}', [Controller::class, 'deleteFile'])->name('deleteFile');
// Route::get('/delete-folder/{folderId}', [Controller::class, 'deleteFolder'])->name('deleteFolder');



Route::get('welcome', function () {
    return view('welcome');
});

