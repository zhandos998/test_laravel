@extends('layouts.app')

@section('content')

<form method="post" action="/all_Products" style="margin-bottom: 20px;">
    @csrf
    @if(isset($products))
    <div style="display: none">{{$i=0}}</div>
        @foreach ($products as $product)
        <div class="col-md-12" style="padding: 0px;">
            <div class="card mb-1 box-shadow">
                <div class="card-body">
                    <p class="card-text">{{$product->name}}<b class="float-right"><small class="text-muted">Цена : {{$product->price}} тг.   </small>
                        <label class="form-check-label" style="margin-right: 30px;">Удалить</label>
                        {{ Form::checkbox('product[]', $i++,null,['class'=>'form-check-input']) }}</b></p>
                </div>
            </div>
        </div>
        @endforeach

        <h1 style="margin-top:25px;">Заполните форму</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <div class="form-group">
                <label>Фамилия</label>
                <input name="lastname" class="form-control" placeholder="Введите фамилию">
            </div>
            <div class="form-group">
                <label>Имя</label>
                <input name="firstname" class="form-control" placeholder="Введите имя">
            </div>
            <div class="form-group">
                <label>Номер телефона</label>
                <input name="number" class="form-control" placeholder="Введите номер телефона">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    @else
    <h1 style="margin-top:25px;">Корзина пуста</h1>
    @endif


@endsection
