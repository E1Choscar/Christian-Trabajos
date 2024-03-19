<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cifradocesar;
//use App\Http\Controllers\EncryptionController;

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
    $textocifrado = "";
    return view('index', compact("textocifrado"));
});
Route::post("/cifrartexto",[cifradocesar::class,"cifrartexto"])->name("cifrartexto");
Route::post('/descifrartexto', [cifradocesar::class, 'descifrarTexto'])->name('descifrartexto');
//Route::post('/encrypt-data', [EncryptionController::class, 'encryptData'])->name('encrypt.data');
//Route::get('/decrypt-data/{id}', [EncryptionController::class, 'decryptData'])->name('decrypt.data');
