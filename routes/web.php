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

Route::get("/order/{order}/comprovante-pagamento", function ($order) {
    abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $orderObj = Order::where("id", $order)->firstOrFail();

    if (!Gate::allows('admin_access')) abort_if($orderObj->usuario_id != auth()->user()->id, Response::HTTP_FORBIDDEN, '403 Forbidden');

    $paymentVoucher = [
        "Fornecedor" => "BioPharmacy",
        "ID" => $orderObj->id,
        "Cliente" => auth()->user()->nome,
        "Produto" => $orderObj->produto_id->nome,
        "Preço Unitário" => $orderObj->produto_id->preco,
        "Quantidade" => $orderObj->quantidade,
        "Preço Total" => $orderObj->preçoTotal,
        "Pagamento" => $orderObj->pagamento
    ];

    return response()->xml(["comprovante-pagamento" => $paymentVoucher]);
});

Route::get("/order/{id}/NF-e", function ($id) {
    $orders = Order::all();
    foreach ($orders as $order) {
        if ($id == $order->id) {
            $preçoTotal = $order->precoTotal;
            $quantidade = $order->quantidade;
            $preco = $order->product->preco;
            $pagamento = $order->pagamento;
        }
    }
    $compra = [
        "Empresa" => "BioPharmacy",
        "Id Compra" => $idCompra,
        "Nome" => $nome,
        "Preço" => $preco,
        "Quantidade" => $quantidade,
        "Preço Total" => $preçoTotal,
        "Pagamento" => $pagamento
    ];
    return response()->xml(["NF-e" => $compra]);
});
