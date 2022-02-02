@extends('layouts.app')

@section('title')
Admin
@endsection

@section('content')
<h2>Изменить продукт</h2>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
<form method="post" action="/changeProduct/{{$id}}" style="margin-bottom: 20px;">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="change_name" class="form-control" placeholder="Введите название продукта">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" style="width: 200px;" type="submit">Изменить название продукта</button>
        </div>
    </div>
</form>
<form method="post" action="/changeProduct/{{$id}}" style="margin-bottom: 20px;">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="change_price" class="form-control" placeholder="Введите цену">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" style="width: 200px;" type="submit">Изменить цену</button>
        </div>
    </div>
</form>
<form method="post" action="/changeProduct/{{$id}}" style="margin-bottom: 20px;" enctype="multipart/form-data">
    @csrf
    <div class="input-group">
        <div class="custom-file">
            {{Form::file('change_image',["class"=>"custom-file-input"])}}
            <label class="custom-file-label" for="inputGroupFile04">Выберите фотографию продукта</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" style="width: 200px;" type="submit">Изменить фото продукта</button>
        </div>
    </div>
</form>

@endsection
