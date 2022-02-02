@extends('layouts.app')

@section('content')

    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}

{{-- @if(auth()->check() && auth()->user()->hasRole('project-manager'))
Project Manager Panel
@endif

@if(auth()->check() && auth()->user()->hasRole('web-developer'))
Web Developer Panel
@endif --}}
<a href='/all_Products'><button type="button" class="btn btn-primary">Primary</button></a>

@endsection
