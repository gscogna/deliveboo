@extends('layouts.app')
@section('title', 'I tuoi ordini e le tue statistiche')

@section('content')
<div class="container">
    <div style="width: 300px">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
</div>

@endsection