@extends('layouts.app')





@section('navbar_button')

    <a href="/Order"><button type="button" class="btn btn-light">Корзина</button></a>

@endsection


@section('content')
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-3">
        <div class="card mb-3 box-shadow">
            <img class="card-img-top" style=" width: 100%; display: block;" src="{{ asset($product->image) }}">
            <div class="card-body">
                <p class="card-text" style="height: 70px;">{{$product->name}}</p>
                <small class="text-muted">Цена : {{$product->price}} тг.   </small>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="/all_Products/{{$product->id}}"  class="btn btn-sm btn-outline-secondary">В корзину</a>
                        <a href="/Order/{{$product->id}}"  class="btn btn-sm btn-outline-secondary">Купить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
    {{$products->links("pagination::bootstrap-4")}}

@endsection

