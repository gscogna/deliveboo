@extends('layouts.app')
@section('header.content')
  <div class="container header-content-guest">
    <div class="hcg-left">
      <h2> Il piacere del cibo a casa tua</h2>
      <div class="header-searchbar">
        <div class="">
          <input @keyup="search_restaurant" v-model='search' type="text" name="" value="" placeholder="cosa stai cercando?">
          <div class="container-search">
            <div class="search-results" @keyup="div_restaurants">
              <ul>
                <li v-for="(val, index) in ristorantiSelezionati" v-if="search != ''" @click="click_restaurant_choice(index)" :key="val.nome">@{{ val.nome }}</li>
              </ul>
            </div>
          </div>
        </div>
        <button @click='vedi' type="button" name="button">Cerca</button>
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

<div class="choose-restaurant">
  <div class="guest-restaurants">
    <div v-for='item in piattiRistorante' v-if="item.visibile == 1" class="card-restaurant">
      <img :src="'http://127.0.0.1:8000/storage/'+ item.immagine" alt="">
        <p class="rainbow-text">@{{item.nome}}</p>
        <p>Ingredienti: @{{ item.ingredienti }}</p>
        <p>Prezzo: @{{ item.prezzo }}€</p>
    </div>
  </div>
</div>

@endsection
