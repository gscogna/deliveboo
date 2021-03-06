@extends('layouts.admin-prov')
@section('title', 'Crea Piatto')
@section('content')


<h4 class="pt-5 text-center">Inserisci un Piatto</h4>
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
            <form class="form-group" method="post" action="{{ route('plates.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                {{-- nome --}}
                <div class="mb-3">
                    <label for="example1" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" id="example1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
    
                {{-- prezzo --}}
                <div class="mb-3">
                    <label for="example2" class="form-label">Prezzo</label>
                    <input type="number" step="any" class="form-control" name="prezzo" id="example2" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>
    
                {{-- immagine --}}
                <div>
                    <label for="exampleFormControlFile1">Carica l'immagine</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="immagine">
                </div>

    
                {{-- ingredienti --}}
                <div class="mb-3 mt-3">
                    <label for="example3" class="form-label">Ingredienti</label>
                    <textarea class="form-control" name="ingredienti" id="example3" cols="5" rows="3"></textarea>
                </div>
    
                {{-- visibile --}}
    
                  <div class="form-check mb-4">
                    <input name="visibile" type="radio" value=1>
                    <label class="form-check-label" for="flexRadioDefault1" name="visibile">
                        Si
                    </label>
                    <input name="visibile" type="radio" value=0>
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
            </form>
      </div>
@endsection
