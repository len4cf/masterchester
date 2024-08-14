<?php

use App\Http\Controllers\CozinheiroController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// cozinheiros


Route::prefix('/cozinheiro')->group(function () {
    Route::get('/', [CozinheiroController::class, 'show']);

    Route::get('/create', [CozinheiroController::class, 'showCreateForm']);
    Route::post('/create', [CozinheiroController::class, 'create']);

    Route::get('/{id}/edit', [CozinheiroController::class, 'showUpdateForm']);
    Route::post('/{id}/edit', [CozinheiroController::class, 'update']);


    Route::get('/{id}', [CozinheiroController::class, 'find']);
    Route::get('/{id}/delete', [CozinheiroController::class, 'delete']);
    Route::get('/{id}/restore', [CozinheiroController::class, 'restore']);
    Route::get('/{id}/forceDelete', [CozinheiroController::class, 'forceDelete']);

    Route::get('/cozinheiros/search', [CozinheiroController::class, 'search'])->name('cozinheiro.search');


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
