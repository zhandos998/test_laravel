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
        <form method="POST" action="/manager/change_product/{{$product->id}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" class="form-control" placeholder="Username" value="{{$product->title}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input name="price" class="form-control" placeholder="Price" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="count">Count</label>
                <input name="count" class="form-control" placeholder="Count" value="{{$product->count}}">
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input name="brand" class="form-control" placeholder="Brand" value="{{$product->brand}}">
            </div>
            
            <div class="form-group">
                <label for="image">Brand</label>
                <input name="image" type="file" class="form-control" placeholder="Brand" value="{{$product->brand}}">
            </div>
            
            <button type="submit" class="btn btn-primary">Change</button>
        </form>

@endsection
