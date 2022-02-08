<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DadosPagController;
use App\Http\Controllers\GeraArquivoController;
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


Route::get('import', [DadosPagController::class, 'create']);
Route::post('file-import', [DadosPagController::class, 'store'])->name('file-import');
Route::post('cria_arquivo', [GeraArquivoController::class, 'cria_arquivo'])->name('cria_arquivo');

