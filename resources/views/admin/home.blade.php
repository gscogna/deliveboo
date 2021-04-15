@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
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
            <div class="card mt-4 text-center" style="width: 18rem;">
                @foreach ($restaurants as $restaurant)
                <img src=" {{ asset($restaurant -> immagine) }}" class="card-img-top" alt="...">
            <div class="card-body">
                    
                <p class="card-text">Nome ristorante: {{ $restaurant -> nome }}</p>
                @endforeach
                <a href="{{ route('plates.index') }}"><button type="submite" class="btn btn-primary">Vai ai piatti</button></a>
            </div>
        </div>
        <a href="{{ route('restaurants.create') }}"><button type="submite" class="btn btn-primary">Crea ristorante</button></a>
        </div>
    </div>
</div>
@endsection
