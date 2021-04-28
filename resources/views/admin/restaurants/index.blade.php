@extends('layouts.ristoranteAdmin')
@section('header.content')
@section('title', 'I tuoi piatti')

@endsection

@section('content')
    <div>
    <div class="sidebar" data-color="yellow">
  <!--
      Tip 1: Puoi cambiare colore inserendo uno di questi prefissati s vuo altrimenti nn tuccà: data-color="blue | green | orange | red | yellow"
  -->
      <div class="logo">
          <a style="color: #0f2a4b" class="navbar-brand simple text logo-normal text-center" href="{{ url('/') }}">
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

                  <p>Il tuo ristorante</p>
              </a>
          </li>

          <li>
            <a href="#">
              <i class="fas fa-utensils"></i>
              I tuoi piatti
            </a>
          </li>

          <li>
            <a href="{{ route('plates.create') }}">
              <i class="fas fa-plus"></i>
              aggiungi un piatto
            </a>
          </li>

          <li>
            <a href="{{ route('admin.statistiche') }}">
              <i class="fas fa-chart-line"></i>
              Ordini e Statistiche
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
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg grafico sfondo_prova">
        <div class="container">
          <div class="row">
              <div class="neons col-12">
                <h4>DELIVEBOO</h4>
              </div>
            </div>
          </div>
      </div>
      <div class="content">
          <div class="row mt-5 mb-5">
            <div class="col-md-12 table-responsive">
              <table class="table table-hover">
                <caption>Lista dei piatti</caption>
                  <thead>
                  <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Prezzo</th>
                      <th scope="col">Ingredienti</th>
                      <th scope="col">Visibile</th>
                      <th scope="col">Dettagli</th>
                      <th scope="col">Modifica</th>
                      <th scope="col">Cancella</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($plates as $plate)
                          @if($plate->user_id == Auth::id())
                          <tr> 
                              <td>{{ $plate->nome }}</td>
                              <td>{{ $plate->prezzo }}€</td>
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
          </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Tutta la lista del personale</h5>
                <h4 class="card-title">Statistiche dei dipendenti</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nome
                      </th>
                      <th>
                        Paese
                      </th>
                      <th>
                        Città
                      </th>
                      <th class="text-right">
                        Salario
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Gennaro Luca Scognamiglio
                        </td>
                        <td>
                          Italia
                        </td>
                        <td>
                          Napoli
                        </td>
                        <td class="text-right">
                          €96,738
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Sara Gorletta
                        </td>
                        <td>
                          Argentina
                        </td>
                        <td>
                          Mendoza
                        </td>
                        <td class="text-right">
                          €23,789
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Ilaria Mammuccari
                        </td>
                        <td>
                          Francia
                        </td>
                        <td>
                          Bordeaux
                        </td>
                        <td class="text-right">
                          €56,142
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Simone Cardinale
                        </td>
                        <td>
                          Spagna
                        </td>
                        <td>
                          Barcellona
                        </td>
                        <td class="text-right">
                          €26,542
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Andrea Corrò
                        </td>
                        <td>
                          Cile
                        </td>
                        <td>
                          Santiago del Cile
                        </td>
                        <td class="text-right">
                          €38,615
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


