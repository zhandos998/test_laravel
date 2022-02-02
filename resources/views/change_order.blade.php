@extends('layouts.app')

@section('content')

{{-- @foreach ($orders as $order) --}}
<div class="col-md-12" style="padding: 0px;">
    <div class="card mb-1 box-shadow">
        <form method="post" action="/Orders">

        <h1 style="margin-top:25px;">Изменить заказ</h1>
            @csrf
            <input name="id"  value="{{$order->id}}" style="display: none">
            <div class="card-body">
                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Имя</label>
                    <div class="col-sm-10">
                        <input name="first_name" class="form-control" value="{{$order->first_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Фамилия</label>
                    <div class="col-sm-10">
                        <input name="last_name" class="form-control" value="{{$order->last_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Номер телефона</label>
                    <div class="col-sm-10">
                        <input name="phone_number" class="form-control" value="{{$order->phone_number}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Статус</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control">
                            @foreach (DB::select('select * from statuses', []) as $status)
                                <option value="{{$status->id}}">{{$status->status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Товары</label>
                    <div class="col-sm-10">
                        @for($i=0;$i<count(json_decode($order->product_name));$i++)
                            <div class="col-md-12" style="padding: 0px;">
                                <div class="card mb-1 box-shadow">
                                    <div class="card-body">
                                        <p class="card-text">{{json_decode($order->product_name)[$i]}}<b class="float-right"><small class="text-muted ">Цена : {{json_decode($order->price)[$i]}} тг.
                                        </small>
                                            <label class="form-check-label" style="margin-right: 30px;">Удалить</label>
                                            {{ Form::checkbox('product[]', $i,null,['class'=>'form-check-input']) }}
                                        </b></p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                {{-- <div class="form-check form-check-inline" name="option">
                    <input name="option3" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                    <input name="option3" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                    <input name="option3" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <label class="form-check-label" for="inlineCheckbox3">3</label>
                </div>
                {{ Form::checkbox('$product[$i]', true) }} --}}
                <button type="submit" class="btn btn-light float-right">Orders</button>
            </div>
        </form>
    </div>
</div>

@endsection
