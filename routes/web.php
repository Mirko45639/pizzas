<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\LangingPageController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentasController;
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

Route::get("/",[LangingPageController::class,"get_home"]);
Route::get("/carrito",[LangingPageController::class,"get_carrito"]);
Route::get('/admin', function () {
    return redirect("/admin/login");
});
Route::prefix("admin")->group(function () {
    Route::get("home",[IndicadorController::class,"get_home"]);
    Route::resource("cliente", ClienteController::class);
    Route::resource('usuario', UsuarioController::class);
    Route::resource('categoria', CategoriaController::class);
    Route::get("productos",[ProductoController::class,"allProducts"]);
    Route::resource('producto', ProductoController::class);
    Route::put("editar/reserva/{pedido}",[PedidosController::class,"pedido_editar"]);
    Route::get("pedido/pendiente",[PedidosController::class,"pedidos_pendiente"]);
    Route::delete("pedido/preparar/{pedido}",[PedidosController::class,"preparar_pedido"])->name("pedido.preparar_pedido");
    Route::get("pedido/preparado",[PedidosController::class,"pedidos_preparado"]);
    Route::resource("pedido",PedidosController::class);
    Route::resource("venta",VentasController::class);
    require __DIR__ . '/auth.php';

});

