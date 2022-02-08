@extends('layouts.app')

@section('title')
Admin
@endsection

@section('content')
<h2>Добавить статус</h2>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
<form method="post" action="/addStatus" style="margin-bottom: 20px;">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="add_status" class="form-control" placeholder="Введите статус">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" style="width: 150px;" type="submit">Добавить статус</button>
        </div>
    </div>
</form>
<h2>Удалить статус</h2>
<form method="post" action="/deleteStatus" style="margin-bottom: 20px;">
    @csrf
    <div class="input-group">
            <select name="delete_status" class="form-control">
                @foreach ($statuses as $status)
                    <option>{{$status->status}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-secondary" style="border-top-left-radius: 0;
            border-bottom-left-radius: 0;width: 150px;" type="submit">Удалить</button>

      </div>
</form>
<h2>Редактировать статус</h2>

<form method="post" action="/changeStatus" style="margin-bottom: 20px;">
    @csrf
    <div class="input-group">
            <select name="change_status" class="form-control">
                @foreach ($statuses as $status)
                    <option>{{$status->status}}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" name="status" placeholder="Введите статус">
            <button class="btn btn-outline-secondary" style="border-top-left-radius: 0;
            border-bottom-left-radius: 0; width: 150px;" type="submit">Редактировать</button>

      </div>
</form>

@endsection
