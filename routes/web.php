<?php

use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Models\Product;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', \App\Http\Controllers\TasksController::class);

    Route::resource('providers', \App\Http\Controllers\ProvidersController::class);

    Route::resource('categories', \App\Http\Controllers\CategoriesController::class);

    Route::resource('products', \App\Http\Controllers\ProductsController::class);

    Route::resource('orders', \App\Http\Controllers\OrdersController::class);

    Route::resource('users', \App\Http\Controllers\UsersController::class);
});

Route::get("/order/{id}/clientsxml", function ($id) {
    $orders = Order::all();
    foreach ($orders as $order) {
        if ($id == $order->id) {
            $idCompra = $order->id;
            $nome = $order->product->nome;
            $preçoTotal = $order->precoTotal;
            $quantidade = $order->quantidade;
            $preco = $order->product->preco;
        }
    }
    $compra = [
        "id" => $idCompra, "nome" => $nome,
        "quantidade" => $quantidade,
        "preço" => $preco,
        "preçoTotal" => $preçoTotal,
    ];
    return response()->xml(["compra" => $compra]);
});