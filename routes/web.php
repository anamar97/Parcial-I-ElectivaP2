<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

Route::get('/', [PedidoController::class, 'index'])->name('pedidos.index');
//Route::get('/pedidos', [PedidoController::class, 'show'])->name('pedidos.show');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos/{pedido}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
Route::put('/pedidos/{pedido}', [PedidoController::class, 'update'])->name('pedidos.update');
Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');
