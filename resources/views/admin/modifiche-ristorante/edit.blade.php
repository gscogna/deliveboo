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

        {{-- tipologia --}}
        @foreach ($types as $type)
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name="types[]" id="flexCheckDefault" {{ $restaurant->types->contains($type->id) ? 'checked' : '' }}>
          <label class="form-check-label" for="flexCheckDefault">
            {{ $type->nome }}
          </label>
        </div>
        @endforeach

        {{-- @foreach ($tags as $tag)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="flexCheckDefault" name="tags[]" {{ $post->tags->contains($tag->id) ? 'checked' : '' }}>
            <label class="form-check-label" for="flexCheckDefault">
                {{ $tag->name }}
            </label>
        </div>
        @endforeach --}}

       
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection