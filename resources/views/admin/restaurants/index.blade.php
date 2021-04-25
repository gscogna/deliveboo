@extends('layouts.ristoranteAdmin')
@section('header.content')
@section('title', 'I tuoi piatti')

@endsection

@section('content')
    <div>
    <div class="sidebar" data-color="orange">
  <!--
      Tip 1: Puoi cambiare colore inserendo uno di questi prefissati s vuo altrimenti nn tuccà: data-color="blue | green | orange | red | yellow"
  -->
      <div class="logo">
          <a class="navbar-brand simple text logo-normal text-center" href="{{ url('/') }}">
            DELIVEBOO
          </a>
      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">        
          <li class="active ">
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

          <li>
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
                <input type="text" value="" class="form-control" placeholder="Cerca...">
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
      <div class="panel-header panel-header-lg">
        {{-- inserire grafico --}}
        <canvas id="bigDashboardChart"></canvas>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Vendite Globali</h5>
                <h4 class="card-title">Prodotti Spediti</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  {{-- inserire grafico --}}
                  <canvas id="lineChartExample"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Vendite 2021</h5>
                <h4 class="card-title">Tutti i prodotti</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  {{-- inserire grafico --}}
                  <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Statistiche piatti</h5>
                <h4 class="card-title">Performance delle ultime 24 ore</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  {{-- inserire grafico --}}
                  <canvas id="barChartSimpleGradientsNumbers"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Backend development /Frontend</h5>
                <h4 class="card-title">Compiti</h4>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked>
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Concludere la parte grafica e l interfaccia che comprenda anche la sezione dell'Admin</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox">
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Completare e mettere in ordine la parte del supporto del carrello e pagamenti</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" checked>
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </td>
                        <td class="text-left">Controllare e far si che tutto funzioni perfettamente, collaudi e aggiustamenti vari.
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="now-ui-icons ui-2_settings-90"></i>
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
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
