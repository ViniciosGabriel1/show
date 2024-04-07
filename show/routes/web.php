<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ProdutosController;

Route::get('/', [HomeController::class, 'index'])->name('login.home');

Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('/', [LoginController::class, 'store'])->name('login.store');
    Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
});

Route::group(['prefix' => 'cadastro'], function () {
    Route::get('/', [CadastroController::class, 'index'])->name('cadastro.index');
    Route::post('/', [CadastroController::class, 'store'])->name('cadastro.store');
});


Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::group(['prefix' => 'produtos'], function () {
    Route::get('/', [ProdutosController::class, 'index'])->name('produtos.index');
    Route::get('/create', [ProdutosController::class, 'create'])->name('produtos.create');
    Route::post('/', [ProdutosController::class, 'store'])->name('produtos.store');
    Route::get('/{produto}', [ProdutosController::class, 'show'])->name('produtos.show');
    Route::get('/{produto}/edit', [ProdutosController::class, 'edit'])->name('produtos.edit');
    Route::put('/{produto}', [ProdutosController::class, 'update'])->name('produtos.update');
    Route::delete('/{produto}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');
});

