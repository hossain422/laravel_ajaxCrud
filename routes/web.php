<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [StudentController::class, 'students']);
Route::post('/add_student', [StudentController::class, 'store']);
Route::post('/update_student', [StudentController::class, 'update']);
Route::post('/delete_student', [StudentController::class, 'destroy']);
Route::get('/search', [StudentController::class, 'search']);

