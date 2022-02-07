@extends('layouts.app')

@section('content')

<form method="post" action="/buy" style="margin-bottom: 20px;">
    @csrf
    @if(isset($basket))
    <div style="display: none">{{$i=0}}</div>
        @foreach ($basket as $product)
        <div id="{{$product->id}}" class="col-md-12" style="padding: 0px;">
            <div class="card mb-1 box-shadow">
                <div class="card-body">
                    <p class="card-text">{{$product->title}}<b class="float-right" style="text-align: right!important;"><small class="text-muted">Цена : {{$product->price}} тг.   </small>
                        <label class="btn btn-outline-danger delete_basket" style="margin-right: 30px;" value="{{$product->id}}">Удалить</label></b></p>
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
    <script>
        $(function() {
            $('.delete_basket').on('click',function(){
                var id = $(this).attr('value');
                var el = $(this);
                $.ajax({
                    url: '/delete_basket',
                    type: "POST",
                    data: {id:id},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        alert(el.parent());
                        alert(el.parents()[0]);
                        alert(el.parents()[1]);
                        alert(el.parents()[2]);
                        alert(el.parents()[3]);
                        el.parents()[4].remove();

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
