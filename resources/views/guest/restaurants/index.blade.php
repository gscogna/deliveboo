@extends('layouts.app')
@section('header.content')
  <div class="container header-content-guest">
    <div class="hcg-left">
      <h2> Il piacere del cibo a casa tua</h2>
      <div class="header-searchbar">
        <input @keyup="search_restaurant" v-model='search' type="text" name="" value="" placeholder="cosa stai cercando?">
        <button type="button" name="button">Cerca</button>
        <div class="container-search">
          <div class="search-results" @keyup="div_restaurants" v-for="(element,index) in ristorantiSelezionati" v-if="search != ''">
            <ul>
              <li>@{{ element.nome }}</li>
            </ul>
          </div>
        </div>
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
    <h1 class="text-center">Deliveboo in costruzione</h1>
    <div class="choose-restaurant">
      <h2>ristoranti</h2>
      <div class="guest-restaurants">
        <div v-for="(element, index) in arrayRistoranti" v-if="element.nome.includes(search) || search == ''" class="card-restaurant">
          <img src="https://image.freepik.com/premium-vector/pizza-logo-vector_25327-119.jpg" alt="">
            <p class="rainbow-text">@{{element.nome}}</p>
            <a href="#"><button type="button" name="button">Vai al menù</button> </a>
        </div>
        <div v-if ="!ristorantiSelezionati.length && !search == ''">
          nessun ristorante trovato
        </div>
      </div>
    </div>
    {{-- ciao --}}

@endsection
