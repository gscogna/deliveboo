@extends('layouts.app')
@section('title', 'Dettagli del tuo piatto')
@section('content')
<div class="container">
    <h4 class="pt-5">Dettaglio Piatto</h4>
    <table class="table table-dark table-striped">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Prezzo</th>
                    <th>immagine</th>
                    <th>Ingredienti</th>
                    <th>Visibile</th>
                </tr>
            </thead>
            <tbody>            
                <tr>
                    <td>{{ $plate->id }}</td>
                    <td>{{ $plate->nome }}</td>
                    <td>{{ $plate->prezzo }}</td>
                    <td><img src="{{ asset('storage/' .$plate->immagine) }}" alt=""></td>
                    <td>{{ $plate->ingredienti }}</td>
                    <td>{{ $plate->visibile }}</td>
                </tr>
            </tbody>
        </table>
    </table>
</div>
@endsection
