@extends('layouts.admin-prov')
@section('title', 'Modifica il tuo piatto')

@section('content')
<form method="POST" action="{{ route('plates.update', $plate)}}" enctype="multipart/form-data">
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
        @method('PUT')
        @csrf
        {{-- nome --}}
        <div class="mb-3 mt-4">
          <label for="exampleInputEmail1"  class="form-label">Nome piatto</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome" value="{{ $plate-> nome }}">
        </div>
        {{-- prezzo --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="exampleInputEmail1" step="any" aria-describedby="emailHelp" value="{{ $plate-> prezzo }}" name="prezzo">
          </div>
          {{-- immagine --}}
          {{-- @if ($plate)
              <h2>Immagine</h2>
              <img style="width: 10rem;"  src="{{ asset($plate->immagine) }}" alt="">
          @endif --}}
          <form method="POST" action="{{ route('plates.update', $plate) }}" enctype="multipart/form-data">
            <div class="form-group">
              <label for="immagine">Carica l'immagine</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="immagine" value={{ $plate->immagine }}>
            </div>
          </form>
          {{-- ingredienti --}}
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ingredienti</label>
            <input type="textarea" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $plate-> ingredienti }}" name="ingredienti">
          </div>
          {{-- visibile --}}
         <h2>Visibile si/no</h2>
         <div class="form-check mb-4">

            <input type="radio" name="visibile" id="visibile" value= 1 @if($plate->visibile == 1) checked @elseif($plate->visibile == 0) unchecked @endif>
            <label class="form-check-label" for="flexRadioDefault1" name="visibile">
                Si
            </label>

            <input type="radio" name="visibile" id="visibile" value= 0 @if($plate->visibile == 0) checked @elseif($plate->visibile == 1) unchecked @endif>
            <label class="form-check-label" for="flexRadioDefault1" name="visibile">
                No
            </label>
          </div>

          <button class="btn button-admin">
            <a href="{{ url('admin/plates') }}">Indietro</a>
        </button>
        <button type="submit" class="btn button-admin">
          <span>Salva</span>
        </button>
    </div>
</form>
@endsection
