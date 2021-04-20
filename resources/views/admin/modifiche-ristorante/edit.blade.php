@extends('layouts.app')
@section('title', 'Modifica il tuo ristorante')

@section('content')
<div class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('restaurants.update', $restaurant) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        {{-- nome --}}
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nome</label>
          <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $restaurant->nome }}">
        </div>
        {{-- indirizzo --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Indirizzo</label>
            <input type="text" name="indirizzo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ $restaurant->indirizzo }}">
          </div>
          {{-- immagine --}}
          <div class="form-group">
            <label for="exampleFormControlFile1">Carica l'immagine</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="immagine" value="{{ $restaurant->immagine }}">
        </div>
       
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection