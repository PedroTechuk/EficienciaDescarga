<?php

use App\Livewire\Placas;
use App\Livewire\Relatorio;
use Livewire\Livewire;
use Livewire\Volt\Volt;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\SetorController;
use App\Livewire\Descarte;
use App\Livewire\Counter;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

if (env('APP_ENV') === 'production') {
    Livewire::setScriptRoute(function ($handle) {
        return Route::get('v-compras/livewire/livewire.js', $handle);
    });

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('v-compras/livewire/update', $handle);
    });
}

//Route::match(['get','post'],'/descartes', [Descarte::class, 'render'])->name('descarte.index');
Route::get('/descargas', Descarte::class)->name('descargas.index');
Route::get('/placas', Placas::class)->name('placas.index');
Route::get('/relatorios', Relatorio::class)->name('relatorios.index');


Route::prefix('/erros')->group(function () {
    Route::view('/403', 'erros.403')->name('erros.403');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
