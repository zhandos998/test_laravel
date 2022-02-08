@extends('layouts.app')

@section('title')
    Admin
@endsection

@section('content')
<h2>Добавить статус</h2>
<form method="post" action="/manager/add_product" style="margin-bottom: 20px;" enctype="multipart/form-data">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="title" class="form-control" placeholder="Введите название товара" style="width: 60%;">
        <input type="text" name="price" class="form-control" placeholder="Введите цену товара">
        <input type="text" name="count" class="form-control" placeholder="Count">
        <input type="text" name="brand" class="form-control" placeholder="Brand">
    </div>
    <div class="custom-file">
        <input type="file" name="image" class="custom-file-input">
        <label class="custom-file-label">Choose file...</label>
  </div>
    <button class="btn btn-light float-right" style="width: 150px;" type="submit">Добавить товар</button>

</form>
@endsection
