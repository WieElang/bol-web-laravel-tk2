<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradeController;

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

Route::get('/about', function () {
    return view('welcome');
});

Route::get('/', [UserController::class, 'index']);
Route::get('/{id}', [UserController::class, 'detail']);
Route::get('/{id}/grade/view-add', [GradeController::class, 'viewAdd']);
Route::post('/grade/post-add', [GradeController::class, 'postAdd']);
