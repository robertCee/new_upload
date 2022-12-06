<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentDataController;
use App\Http\Controllers\StudentInfoController;

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
//   array_par   name controller       method
// Route::resource('students',StudentDataController::class);


Route::get('/view-students', [StudentInfoController::class, 'index']);
Route::post('/store-new-student', [StudentInfoController::class, 'store']);

Route::delete('/delete-this-student/{id}', [StudentInfoController::class, 'destroy']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
