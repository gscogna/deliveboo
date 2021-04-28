@extends('layouts.admin-prov')
@section('title', 'I tuoi ordini e le tue statistiche')

@section('content')
<button class="btn button-admin posizionamento">
    <a href="{{ url('admin/plates') }}">Torna ai piatti</a>
</button>

<h1 class="text-center py-4">Statistiche</h1>
<div class="main-panel statistiche" id="main-panel">


        <div style="width: 500px">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <div>
            <table class="table  table table-success table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Prezzo Totale</th>
                    <th scope="col">Pagamento Avvenuto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordini as $order)
                    <tr>
                    <th scope="row">{{$order->user_id}}</th>
                    <td>{{ $order->nome }}</td>
                    <td>{{ $order->indirizzo_consegna }}</td>
                    <td>{{ $order->email}}</td>
                    <td>{{ $order->prezzo_totale}}</td>
                    @if($order->pagamento_avvenuto == 1) 
                    <td>Si</td>
                    @elseif($order->pagamento_avvenuto == 0)
                    <td>No</td>
                    @endif
                    @endforeach
                    </tr>
                    <tr>
                </tbody>
            </table>
        </div>
    </div>

    
<script> 
    let orderid = {{ $orders }}
</script>
@endsection