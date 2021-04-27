@extends('layouts.admin-prov')
@section('title', 'Dashboard')


@section('content')
<div class="container">
            @if ($restaurants)
            @foreach ($restaurants as $restaurant)
            <div class="cards mt-4 mb-4 text-center" style="width: 18rem; margin: auto;" enctype=“multipart/form-data”>
                <img src=" {{ asset('storage/' .$restaurant -> immagine) }}" class="card-img-top" alt="...">

            <div class="card-body-rist">
               
                    
                <div class="card-text">
                    <p>
                    Nome ristorante: {{ $restaurant -> nome }}
                    </p>

                </div>

                {{-- <button class="btn-ordini">
                    <a href="{{ route('admin.statistiche') }}">Ordini e Statistiche</a>
                </button> --}}
                
                <a href="{{ route('restaurants.edit', $restaurant->user_id) }}">
                    <button type="button" class="btn-modifica">Modifica</button>
                </a>
                <a href="{{ route('plates.index') }}">
                    <button type="submite" class="btn-piatti">Vai ai piatti</button>
                </a>
                <form method="POST" action="{{ route('restaurants.destroy', $restaurant) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn-cancella">Cancella</button>
                </form>
            </div>
        </div>
        
        @endforeach
        @endif
        {{-- @dd((count($restaurants))) --}}
        @if (count($restaurants ) < 1)
        <div class="contenitore-aggiungi-ristorante">

        <p>Ora puoi inserire il tuo ristorante!</p>
        <i class="far fa-smile"></i>
            <a href="{{ route('restaurants.create') }}">
                <button type="submite" class="btn btn-primary">Inserisci il ristorante</button>
            </a>
        </div>
        
        @endif
        </div>
</div>
@endsection
