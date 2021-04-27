@extends('layouts.admin-prov')
@section('title', 'Crea il tuo ristorante')

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
    <form class="mt-4" action="{{ route('restaurants.store') }}" method="post" enctype="multipart/form-data">
        @method('POST')
        @csrf
        {{-- nome --}}
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nome</label>
          <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        {{-- indirizzo --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Indirizzo</label>
            <input type="text" name="indirizzo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          {{-- immagine --}}
          <div class="form-group">
            <label for="exampleFormControlFile1">Carica l'immagine</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="immagine">
        </div>
        {{-- tipologia --}}
        @foreach ($types as $type)
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name="types[]" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            {{ $type->nome }}
          </label>
        </div>
        @endforeach
       
        <button class="btn mt-4" style="background-color:#0f2a4b">
          <a style="color:white " href="{{ url('admin/plates') }}">Indietro</a>
      </button>
      <button type="submit" class="btn mt-4"style="background-color:#0f2a4b; color: white">Salva</button>
      </form>
</div>
@endsection