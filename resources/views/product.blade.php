@extends('layouts.app')

@section('title')
Admin
@endsection

@section('navbar_button')
    <a href="/addProduct"><button type="button" class="btn btn-light">Добавить товар</button></a>
@endsection

@section('content')
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-3">
        <div class="card mb-3 box-shadow">
            <img class="card-img-top" style=" width: 100%; display: block;" src="{{ asset($product->image) }}">
            <div class="card-body">
                <p class="card-text" style="height: 60px;">{{$product->name}}</p>
                <small class="text-muted" >Цена : {{$product->price}} тг.   </small>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/Product/{{$product->id}}"  class="btn btn-sm btn-outline-secondary">Delete</a>
                      <a href="/changeProduct/{{$product->id}}"  class="btn btn-sm btn-outline-secondary">Change</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
    {{$products->links("pagination::bootstrap-4")}}

@endsection

{{--

@section('content')

<h2>Добавить статус</h2>
<form method="post" action="/addProduct" style="margin-bottom: 20px;">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="add_product_name" class="form-control" placeholder="Введите статус">
        <input type="text" name="add_product_price" class="form-control" placeholder="Введите статус">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" style="width: 150px;" type="submit">Добавить статус</button>
        </div>
    </div>
</form>
<h2>Удалить статус</h2>
<form method="post" action="/deleteProduct" style="margin-bottom: 20px;">
    @csrf
    <div class="input-group">
            <select name="delete_product" class="form-control">
                @foreach ($products as $product)
                    <option>{{$product->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-secondary" style="border-top-left-radius: 0;
            border-bottom-left-radius: 0;width: 150px;" type="submit">Удалить</button>

      </div>
</form>
<h2>Редактировать статус</h2>
<form method="post" action="/changeProduct" style="margin-bottom: 20px;">
    @csrf
    <div class="input-group">
            <select name="change_product" class="form-control">
                @foreach ($products as $product)
                    <option>{{$product->name}}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" name="product" placeholder="Введите статус">
            <button class="btn btn-outline-secondary" style="border-top-left-radius: 0;
            border-bottom-left-radius: 0; width: 150px;" type="submit">Редактировать</button>

      </div>
</form>

@endsection --}}
