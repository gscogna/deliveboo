@extends('layouts.admin-prov')
@section('title', 'Dettagli del tuo piatto')
@section('content')
<div class="container">
    <h2 class="pt-5 text-center">Dettaglio Piatto</h2>
    <div class="card mb-5 def">
        <img class="card-img-top" src="{{ asset('storage/' .$plate->immagine) }}" alt="img piatto">
        <div class="card-body">
            <h3 class="card-title text-center">Nome: {{ $plate->nome }}</h3>
            <h4 class="card-text text-center">Ingredienti: {{ $plate->ingredienti }}</h4>
            <h5 class="card-text text-center">Prezzo: {{ $plate->prezzo }}</h5>
                <button class="btn pl-4 pr-4 button-admin">
                <a href="{{ url('admin/plates') }}">Indietro</a>
                </button>
        </div>
    </div>
</div>
@endsection
