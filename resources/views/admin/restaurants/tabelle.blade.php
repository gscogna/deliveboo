@extends('layouts.ristoranteAdmin')
@section('header.content')
@section('title', 'la tua tabella')

@endsection

@section('content')
    <div class="sidebar" data-color="orange">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
        <div class="logo">
            <a class="navbar-brand simple text logo-normal text-center" href="{{ url('/') }}">
            DELIVEBOO
            </a>
        </div>

        <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">        
            <li>
                <a href="{{ url('admin/plates') }}">

                    <i class="now-ui-icons design_app"></i>

                    <p>Dashboard</p>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.home') }}">

                    <i class="now-ui-icons users_single-02"></i>

                    <p>Torna al tuo ristorante</p>
                </a>
            </li>

            <li class="active">
                <a href="{{ route('admin.tabelle') }}">

                    <i class="now-ui-icons design_bullet-list-67"></i>

                    <p>Lista tabella</p>
                </a>
            </li>

            <li class="active-pro">
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
                </a>
            </li>
        </ul>
        </div>
    </div>
    </div>
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
                <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                    </div>
                </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="#pablo">
                    <i class="now-ui-icons media-2_sound-wave"></i>
                    <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                    </p>
                </a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="now-ui-icons location_world"></i>
                    <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                    </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#pablo">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>
                    <span class="d-lg-none d-md-block">Account</span>
                    </p>
                </a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        <!-- End Navbar -->
<div class="container">
    <table class="table table-hover">
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
        {{-- <a class="btn btn-success mb-3" href=" {{ route('plates.create') }}">Inserisci un piatto</a> --}}
        {{-- @foreach ($plates as $plate)
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
                    @endif --}}

                {{-- <td><a href="{{ route('plates.show', $plate) }}"><button type="button" class="btn btn-info">Dettagli</button></a></td>
                <td><a href="{{ route('plates.edit', $plate) }}"><button type="button" class="btn btn-warning">Modifica</button></a></td>
                <td>
                    <form method="POST" action="{{ route('plates.destroy', $plate) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Cancella</button>
                    </form>
                </td>
            </tr> --}}
            {{-- @endif --}}
        {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@endsection