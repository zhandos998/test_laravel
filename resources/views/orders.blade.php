@extends('layouts.app')

@section('content')

    @foreach ($orders as $order)
    <div class="col-md-12" style="padding: 0px;">
        <div class="card mb-1 box-shadow">
            <div class="card-body">
                <h4 class="card-text">{{$order->first_name}} {{$order->last_name}}<b class="card-text float-right">{{$order->phone_number}}</b></h4>
                <p class="card-text">Статус: {{DB::select('select status from statuses where id = ?', [$order->id_status])[0]->status}}</p>
                <p class="card-text">Товары</p>
                @foreach (json_decode($order->product_name) as $product_name)
                    <p class="card-text">{{$product_name}}</p>
                @endforeach
                <p class="card-text">Цена: {{array_sum(json_decode($order->price))}} тг. <a class="float-right" href="/change_order/{{$order->id}}"><button type="button" class="btn btn-light">Orders</button></a></p>
            </div>
        </div>
    </div>
    @endforeach

@endsection
