@extends('layouts.app')

@section('title')
Admin
@endsection

@section('content')


<a href="/Status"><button type="button" class="btn btn-light">Statuses</button></a>
<a href="/Product"><button type="button" class="btn btn-light">Products</button></a>
<a href="/Orders"><button type="button" class="btn btn-light">Orders</button></a>

@endsection
