@extends('layouts.admin-prov')
@section('title', 'I tuoi ordini e le tue statistiche')

@section('content')
<div class="container">
        <h1 class="text-center py-4">Statistiche</h1>
    
    <div class="main-panel statistiche" id="main-panel">
        <div class="formato_3 mr-5 mb-5">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>     
        <table class="table-responsive-lg table table-success ">
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
                <td>{{$order->user_id}}</td>
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
            </tbody>
        </table>
    </div>
    <button class="btn button-admin mt-5">
        <a href="{{ url('admin/plates') }}">Indietro</a>
    </button>
</div>
<script> 
    let orderid = {{ $orders }}
</script>
@endsection