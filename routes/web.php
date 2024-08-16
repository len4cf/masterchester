<?php

use App\Http\Controllers\CozinheiroController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;


// cozinheiros


Route::prefix('/cozinheiro')->group(function () {
    Route::get('/', [CozinheiroController::class, 'show']);

    Route::get('/search', [CozinheiroController::class, 'search'])->name('cozinheiro.search');

    Route::get('/create', [CozinheiroController::class, 'showCreateForm'])->name('cozinheiro.showCreateForm');
    Route::post('/create', [CozinheiroController::class, 'create']);

    Route::get('/{id}/edit', [CozinheiroController::class, 'showUpdateForm']);
    Route::post('/{id}/edit', [CozinheiroController::class, 'update'])->name('cozinheiro.update');


    Route::get('/{id}', [CozinheiroController::class, 'find']);
    Route::delete('/{id}/delete', [CozinheiroController::class, 'delete'])->name('cozinheiro.delete');

    Route::patch('/{id}/restore', [CozinheiroController::class, 'restore'])->name('cozinheiro.restore');
    Route::delete('/{id}/forceDelete', [CozinheiroController::class, 'forceDelete'])->name('cozinheiro.forceDelete');



});

// food

Route::prefix('/food')->group(function () {
    Route::get('/', [foodController::class, 'show']);
    Route::get('/{id}', [foodController::class, 'find']);
});

// menu

Route::prefix('/menu')->group(function () {
    Route::get('/', [MenuController::class, 'show']);
    Route::get('/{id}', [MenuController::class, 'find']);
});

Route::get('/teste', function (){
    $cozinheiro = \App\Models\Cozinheiro::findOrFail(2);
    $menu = \App\Models\Menu::all()->where('cozinheiro_id', $cozinheiro->id);

    return json_encode($cozinheiro->menus()->first());

});
