@extends('layouts.app')
@section('header.content')
  <div class="container header-content-guest">
    <div class="hcg-left">
      <h2> Il piacere del cibo a casa tua</h2>
      <div class="header-searchbar">
        <input v-model='search' type="text" name="" value="" placeholder="cosa stai cercando?">
        <button @click='search_restaurant'type="button" name="button">Cerca</button>
      </div>
    </div>
    <div class="hcg-right">
        <img src="{{asset('img/consegna.png')}}" alt="">
        <i class="fas fa-angle-double-right"></i>
        <i class="fas fa-house-user"></i>
    </div>
  </div>
@endsection
@section('content')
    <h1 class="text-center prova">Deliveboo in costruzione</h1>
@endsection
