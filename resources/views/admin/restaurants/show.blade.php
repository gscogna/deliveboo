@extends('layouts.admin-prov')
@section('title', 'Dettagli del tuo piatto')
@section('content')
<div class="container">
    <h2 class="pt-5 text-center">Dettaglio Piatto</h2>
    <div class="card mb-5" style="width: 30rem; margin: auto; border: 4px solid #0f2a4b;">
        <img class="card-img-top" src="{{ asset('storage/' .$plate->immagine) }}" alt="img piatto">
        <div class="card-body">
          <h3 class="card-title text-center">Nome: {{ $plate->nome }}</h3>
          <h4 class="card-text text-center">Ingredienti: {{ $plate->ingredienti }}</h4>
          <h5 class="card-text text-center">Prezzo: {{ $plate->prezzo }}</h5>
          <button class="btn pl-4 pr-4" style="background-color:#0f2a4b">
            <a style="color:white " href="{{ url('admin/plates') }}">Indietro</a>
        </button>
        </div>
    </div>
</div>
@endsection
