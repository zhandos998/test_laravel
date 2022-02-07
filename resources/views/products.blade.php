@extends('layouts.app')

@section('title')
Admin
@endsection

@section('navbar_button')
    <li class="nav-item">
        <a class="nav-link" href="/basket">{{ __('Basket') }}</a>
    </li>
@endsection

@section('content')
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-3">
        <div class="card mb-3 box-shadow">
            <img class="card-img-top" style=" width: 100%; display: block;" src="{{ asset($product->image) }}">
            <div class="card-body">
                <p class="card-text" style="height: 60px;">{{$product->title}}</p>
                <small class="text-muted" >Цена : {{$product->price}} тг.</small>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <!-- <a href="/all_Products/{{$product->id}}"  class="btn btn-sm btn-outline-secondary">В корзину</a>
                        <a href="/Order/{{$product->id}}"  class="btn btn-sm btn-outline-secondary">Купить</a> -->
                        <a class="btn btn-sm btn-outline-secondary to_basket" name="basket" value="{{$product->id}}">В корзину</a>
                        <a href="/basket/{{$product->id}}" class="btn btn-sm btn-outline-secondary">Купить</a>
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
                        alert(data);
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

