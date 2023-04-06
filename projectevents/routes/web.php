<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('start'); // - start Login form
});

Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

//--------------------------Event list CRUD
//Список - вывод на страницу - get
Route::get('/eventlist', [EventController::class, 'index']);
//---------------------- add event
Route::get('/addevent', [EventController::class, 'create']);
Route::post('/addevent', [EventController::class, 'store']);
//---------------------- event event
Route::get('/editevent/{event}', [EventController::class, 'edit']);
Route::post('/editevent/{event}', [EventController::class, 'update']);
//---------------------- delete event
Route::delete('/eventlist/{event}', [EventController::class, 'destroy']);

//by register user
Route::get('/users', [UserController::class, 'index']);
Route::post('/userByrole', [UserController::class, 'userByrole']);
//add user
Route::get('/adduser', [UserController::class, 'create']);
Route::post('/adduser', [UserController::class, 'store']);
//edit user
Route::get('/edituser/{user}', [UserController::class, 'edit']);
Route::post('/edituser/{user}', [UserController::class, 'update']);

Route::get('/profile/{user}', [UserController::class, 'edit']);
Route::get('/edituser/{user}', [UserController::class, 'edit']);
Route::post('/edituser/{user}', [UserController::class, 'update']);

// //delete user
// Route::delete('/users/{user}', [UserController::class,  'destroy']);

// login to admin panel
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');