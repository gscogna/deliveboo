@extends('layouts.app')
@section('content')
    <h4 class="pt-5 text-center">Inserisci un Piatto</h4>
    <div class="container">
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
                <input type="number" class="form-control" name="prezzo" id="example2" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
            </div>

            {{-- immagine --}}
            <div class="form-group">
                <label for="exampleFormControlFile1">Carica l'immagine</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="immagine">
            </div>

            {{-- ingredienti --}}
            <div class="mb-3">
                <label for="example3" class="form-label">Ingredienti</label>
                <textarea class="form-control" name="content" id="example3" cols="30" rows="10"></textarea>
            </div>

            {{-- visibile --}}
            <div class="mb-3">
                <label for="example7" class="form-label">Visibile</label>
                <input type="text" class="form-control" name="visibile" id="example7" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
@endsection