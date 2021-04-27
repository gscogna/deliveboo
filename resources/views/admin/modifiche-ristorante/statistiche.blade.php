@extends('layouts.admin-prov')
@section('title', 'I tuoi ordini e le tue statistiche')

@section('content')

    {{-- <div class="sidebar text-center" data-color="orange"> --}}
        <!--
            Tip 1: Puoi cambiare colore inserendo uno di questi prefissati s vuo altrimenti nn tuccà: data-color="blue | green | orange | red | yellow"
        -->
        {{-- <div class="logo">
            <a class="navbar-brand simple text logo-normal text-center" href="{{ url('/') }}">
            DELIVEBOO
            </a>
        </div> --}}

        {{-- <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">        
                <li class="active ">
                    <a href="{{ url('admin/plates') }}">

                    <i class="now-ui-icons media-2_sound-wave"></i>

                        <p>Statistiche</p>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.home') }}">

                        <i class="now-ui-icons users_single-02"></i>

                        <p>Torna al tuo ristorante</p>
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
    </div> --}}

    <h1>Statistiche</h1>
    <div class="main-panel d-sm-flex" id="main-panel" style="height: 100vh;padding: 40px;">


        <div style="width: 500px">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <div>
            <table class="table mt-4">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<script> 
    let orderid = {{ $orders }}
</script>
@endsection