@extends('layouts.app')

@section('title')
Admin
@endsection

@section('navbar_button')
    <li class="nav-item">
        <a class="nav-link" href="/manager/orders">{{ __('Orders') }}</a>
    </li>
@endsection

@section('content')
<div class="row">
    <a href="/manager/add_product"><button type="button" class="btn btn-outline-dark">Add Products</button></a>
    @foreach ($products as $product)
    <div class="col-md-3">
        <div class="card mb-3 box-shadow">
            <img class="card-img-top" style=" width: 100%; display: block;" src="{{ asset($product->image) }}">
            <div class="card-body">
                <p class="card-text" style="height: 60px;">{{$product->title}}</p>
                <small class="text-muted" >Цена : {{$product->price}} тг.</small>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-dark"><a href="/manager/change_product/{{$product->id}}">Change Products</a></button>
                        <button type="button" class="btn btn-outline-dark"><a href="/manager/delete_product/{{$product->id}}">Delete Products</a></button>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
    {{$products->links("pagination::bootstrap-4")}}

    
    
    <script>
        $(function() {
            $('.to_basket').on('click',function(){
                var id = $(this).attr('value');
                $.ajax({
                    url: '/basket_add',
                    type: "POST",
                    data: {id:id},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        // if (data == true)
                        //     alert("Success");
                        // else
                        //     alert("Failed");
                    },
                    error: function (msg) {
                        alert('Ошибка');
                    }
                });
            });
        })

    </script>
@endsection

