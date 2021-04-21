@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1>LA TRANSAZIONE E' AVVENUTA CON SUCCESSO</h1>
    <button class="btn btn-success">
        <a href="{{ url('/') }}">Torna alla homepage</a>
    </button>
</div>
@endsection