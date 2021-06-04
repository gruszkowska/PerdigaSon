<?php

use App\Http\Controllers\OutroController;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\VermifugoController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::resource('blog', 'BlogController');

Auth::routes(['verify' => true]);

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('alimento', 'AlimentoController');
Route::resource('bichinho', 'BichinhoController');
Route::resource('crescimento', 'CrescimentoController');
Route::resource('medicamento', 'MedicamentoController');
Route::resource('outro', 'OutroController');
Route::resource('vacina', 'VacinaController');
Route::resource('vermifugo', 'VermifugoController');

