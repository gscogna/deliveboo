@extends('layouts.ristoranteAdmin')
@section('header.content')
@section('title', 'I tuoi piatti')

@endsection

@section('content')
    <div class="wrapper">
    <div class="sidebar" data-color="orange">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
      <div class="logo">
          <a href="http://www.creative-tim.com" class="simple-text logo-mini">
              CT
          </a>

          <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
          </a>
      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">        
          <li class="active ">
              <a href="../dashboard.html">

                    <i class="now-ui-icons design_app"></i>

                  <p>Dashboard</p>
              </a>
          </li>

          <li>
              <a href="../icons.html">

                    <i class="now-ui-icons education_atom"></i>

                  <p>Icons</p>
              </a>
          </li>

          <li>
              <a href="../map.html">

                    <i class="now-ui-icons location_map-big"></i>

                  <p>Maps</p>
              </a>
          </li>

          <li>
              <a href="../notifications.html">

                    <i class="now-ui-icons ui-1_bell-53"></i>

                  <p>Notifications</p>
              </a>
          </li>

          <li>
              <a href="../user.html">

                    <i class="now-ui-icons users_single-02"></i>

                  <p>User Profile</p>
              </a>
          </li>

          <li>
              <a href="../tables.html">

                    <i class="now-ui-icons design_bullet-list-67"></i>

                  <p>Table List</p>
              </a>
          </li>

          <li>
              <a href="../typography.html">

                    <i class="now-ui-icons text_caps-small"></i>

                  <p>Typography</p>
              </a>
          </li>

          <li class="active-pro">
              <a href="../upgrade.html">

                    <i class="now-ui-icons arrows-1_cloud-download-93"></i>

                  <p>Upgrade to PRO</p>
              </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
<div class="container">
  <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Immagine</th>
          <th scope="col">Prezzo</th>
          <th scope="col">Ingredienti</th>
          <th scope="col">Visibile</th>
          <th scope="col">Dettagli</th>
          <th scope="col">Modifica</th>
          <th scope="col">Cancella</th>
        </tr>
      </thead>
      <tbody>
        <a class="btn btn-success mb-3" href=" {{ route('plates.create') }}">Inserisci un piatto</a>
        @foreach ($plates as $plate)
          @if($plate->user_id == Auth::id())
            <tr>
                <td>{{ $plate->id }}</td>
                <td>{{ $plate->nome }}</td>
                <td>{{ $plate->immagine }}</td>
                <td>{{ $plate->prezzo }}</td>
                <td>{{ $plate->ingredienti }}</td>
                  @if ( $plate->visibile == 1)
                    <td>Si</td>
                  @else
                      <td>No</td>
                  @endif

                <td><a href="{{ route('plates.show', $plate) }}"><button type="button" class="btn btn-info">Dettagli</button></a></td>
                <td><a href="{{ route('plates.edit', $plate) }}"><button type="button" class="btn btn-warning">Modifica</button></a></td>
                <td>
                    <form method="POST" action="{{ route('plates.destroy', $plate) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Cancella</button>
                    </form>
                </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
</div>
@endsection
