<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;


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
    return view('dashboard');
});

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