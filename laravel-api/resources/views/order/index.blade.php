@extends("../templates.template")

@section("titlePage")
    Meus pedidos
@endsection

@section("content")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title">Pedidos</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Código
                                    </th>
                                    <th>
                                        Item
                                    </th>
                                    <th>
                                        Quantidade
                                    </th>
                                    <th class="text-right">
                                        Preço Total
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->codigo }}</td>
                                            <td>{{ $order->item }}</td>
                                            <td>{{ $order->quantidade }}</td>
                                            <td class="text-right" >{{ $order->precoTotal }}</td>
                                            <td>
                                                <a href="{{ url('/order/' . $item->id . '/edit') }}" title="Edit">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                                <form method="POST" action="{{ url('/order' . '/' . $order->id) }}">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
