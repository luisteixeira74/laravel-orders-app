<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);       // listar pedidos
    Route::post('/', [OrderController::class, 'store']);      // criar pedido
    Route::get('/{id}', [OrderController::class, 'show']);    // detalhes de um pedido
});
