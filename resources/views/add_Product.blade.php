@extends('layouts.app')

@section('title')
    Admin
@endsection

@section('content')
<h2>Добавить статус</h2>
<form method="post" action="/Product" style="margin-bottom: 20px;" enctype="multipart/form-data">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="add_name" class="form-control" placeholder="Введите название товара" style="width: 60%;">
        <input type="text" name="add_price" class="form-control" placeholder="Введите цену товара">
    </div>
    {{Form::file('main_image')}}
    <button class="btn btn-light float-right" style="width: 150px;" type="submit">Добавить товар</button>

</form>
@endsection
