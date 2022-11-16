<?php

use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

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

Route::get("/order/{id}/comprovante", function ($id) {
    abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $orders = Order::all();

    foreach ($orders as $order) {
        if ($id == $order->id) {
            $usuario_id = $order->usuario_id;
            $idPedido = $order->id;
            $cliente = auth()->user()->nome;
            $produto = $order->product->nome;
            $precoUni = $order->product->preco;
            $quantidade = $order->quantidade;
            $preçoTotal = $order->precoTotal;
            $pagamento = $order->pagamento;
        }
    }

    if (!Gate::allows('admin_access')) abort_if($usuario_id != auth()->user()->id, Response::HTTP_FORBIDDEN, '403 Forbidden');

    $pedido = [
        "Fornecedor" => "BioPharmacy",
        "ID" => $idPedido,
        "Cliente" => $cliente,
        "Produto" => $produto,
        "Preço Unitário" => $precoUni,
        "Quantidade" => $quantidade,
        "Preço Total" => $preçoTotal,
        "Pagamento" => $pagamento
    ];
    return response()->xml(["Comprovante" => $pedido]);
});
