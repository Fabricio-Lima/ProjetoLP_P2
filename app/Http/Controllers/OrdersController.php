<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::all();
        $products = Product::all();

        return view('orders.index', compact('orders', 'products'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();

        return view('orders.create', compact('products'));
    }

    public function store(StoreOrderRequest $request)
    {
        $product = Product::where("id", $request->produto_id)->firstOrFail();
        $precoTotal = $product->preco * $request->quantidade;
        $userCurrent = auth()->user()->id;

        if ($request->validated()) {
            $order = new Order();

            $order->quantidade = $request->quantidade;
            $order->produto_id = $request->produto_id;
            $order->usuario_id = $userCurrent;
            $order->pagamento  = $request->pagamento;
            $order->precoTotal = $precoTotal;

            $order->save();
        };

        return redirect()->route('orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (!Gate::allows('admin_access')) abort_if($order->usuario_id != auth()->user()->id, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();

        return view('orders.edit', compact('order', 'products'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (!Gate::allows('admin_access')) abort_if($order->usuario_id != auth()->user()->id, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return redirect()->route('orders.index');
    }
}
