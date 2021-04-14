@extends('layouts.app')
@section('header.content')

@endsection

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Immagine</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Ingredienti</th>
        <th scope="col">Visibile</th>
        <th scope="col"> {{ Auth::user()->name }}</th>

      </tr>
    </thead>
    <tbody>

        @foreach ($plates as $plate)
          @if($plate->user_id == Auth::id())
            <tr>
              <td>{{ $plate->id }}</td>
              <td>{{ $plate->nome }}</td>
              <td>{{ $plate->immagine }}</td>
              <td>{{ $plate->prezzo }}</td>
              <td>{{ $plate->ingredienti }}</td>
              <td>{{ $plate->visibile }}</td>
              <td><a href="{{ route('plates.show', $plate) }}"><button type="button" class="btn btn-primary">Dettagli</button></a></td>
              <td><a href="{{ route('plates.edit', $plate) }}"><button type="button" class="btn btn-primary">Modifica</button></a></td>
              <td>
                <form method="POST" action="{{ route('plates.destroy', $plate) }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-primary">Cancella</button>
                </form>
              </td>
            </tr>
          @endif
    @endforeach
    </tbody>
  </table>
@endsection
