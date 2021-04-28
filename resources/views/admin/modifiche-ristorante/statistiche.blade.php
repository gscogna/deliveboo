@extends('layouts.admin-prov')
@section('title', 'I tuoi ordini e le tue statistiche')

@section('content')
    <h1>Statistiche</h1>
    <button class="btn button-admin posizionamento">
        <a href="{{ url('admin/plates') }}">Torna ai piatti</a>
    </button>

    <div class="main-panel statistiche" id="main-panel">


        <div style="width: 500px">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <div>
            <table class="table  table-striped table-celestina">
                <thead class="table-celestina">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo Totale</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pagamento Avvenuto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    </tr>
                    <tr>
                    <th scope="row">4</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    </tr>
                    <tr>
                    <th scope="row">5</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
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