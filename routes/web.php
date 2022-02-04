<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadosPagController;
use App\Http\Controllers\UserController;

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
    return view('file-import');
});

// Route::get('import', [UserController::class, 'import']);
// Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');

Route::get('import', [DadosPagController::class, 'import']);
Route::post('file-import', [DadosPagController::class, 'fileImport'])->name('file-import');

