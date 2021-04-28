@extends('layouts.app')
@section('title', 'Deliveboo')

@section('header.content')
    
<div class="header-content-guest">
  <div class="hcg-left">
    <h1> Il piacere del cibo a casa tua</h1>
    <div class="header-searchbar">
      <div class="pippo">
        <input @keyup="search_restaurant" v-model='search' type="text" name="" value="" placeholder="cosa stai cercando?">
        {{-- <button @click="showAll" type="button" class="btn btn-primary">Mostra tutti i ristranti</button> --}}
        <div class="container-search">

          <div class="search-results" @keyup="div_restaurants">
            <ul>
              <li @click="click_restaurant_choice(index)" v-for="(val, index) in ristorantiSelezionati" v-if="search != ''" :key="val.nome">@{{ val.nome }}</li>
            </ul>
          </div> 

        </div> 
        
      </div> 

    </div>

  </div> 
  {{-- <div class="hcg-right">
      <img src="{{asset('../img/deliveboo.gif')}}" style="margin-top:80px;"  alt="">
  </div> --}}

  </div>
@endsection

@section('content')

 <!-- TIPOLOGIE -->
 <h2>Scegli il tipo di cucina</h2>
<div class="container-tipologie">
     
      <div @click="filterPlate(index)" class="tipologie" v-for="(element, index) in tipologie">
        <img :src="element.immagine" alt="">
          <p>@{{element.nome}}</p>        
      </div>    

</div>

<!-- SEGLI RISTORANTE -->
<h1  class="text-center">Scegli il ristorante da cui ordinare</h1>
  <div class="choose-restaurant">
      {{-- <h2>ristoranti</h2> --}}

      <div class="guest-restaurants">

        <div class="card" v-for="(element, index) in arrayMostrato" v-if ="(ristoranteScelto.length == 0 && search == '') || ristorantiSelezionati.length > 0">
            <a class="plates_route" href="{{ route('guest.restaurant.show') }}">
                  <div class="card-img-top">
                      <img :src="'http://127.0.0.1:8000/storage/'+ element.immagine" alt="">
                      <div class="cover-layover">
                          <div class="font-cover">
                            <i class="fas fa-utensils"></i>
                          </div>
                          <div class="text-cover">
                              <p>Scopri di più</p>
                          </div>             
                      </div>            
                  </div>
              
              
            
                <p @click='restaurant_plates(element.user_id)'>@{{element.nome}}</p>
              </a>

           

        </div>
        

        
        <div class="card" v-for="(item, index) in ristoranteScelto" v-if="ristoranteScelto.length > 0" >
        
          <div class="card-img-top">
         
           <img :src="'http://127.0.0.1:8000/storage/'+ item.immagine" alt="">
           <div class="cover-layover">
           <a class="plates_route" href="{{ route('guest.restaurant.show') }}">
              <div class="font-cover">
                    <i class="fas fa-utensils"></i>
                  </div>
                  <div class="text-cover">
                    <p>Scopri di più</p>
                  </div>
                </div>
            </a>
          </div>                 


          {{-- <p class="rainbow-text">@{{item.nome}}</p> --}}
          <!-- <a @click='restaurant_plates(item.user_id)'  href="{{ route('guest.restaurant.show') }}">
            <!-- <button class="btn-menu" type="button" name="button">Vai al menù</button> 
          </a> -->
          <p @click='restaurant_plates(item.user_id)'>@{{item.nome}}</p>
          
        </div>
        
        

        <div v-if ="!ristorantiSelezionati.length && !ristoranteScelto.length && search != ''">
          nessun ristorante trovato
        </div>

      </div><!-- fine choose-restaurant -->
      










      <h1>Consegniamo tutto ciò che vuoi</h1>
      <div class="container-section">
      <div class="section">
        <img src="https://res.cloudinary.com/glovoapp/image/fetch///https://glovoapp.com/images/why-glovo/restaurants.svg" alt="">
        <h3>I migliori ristoranti della tua città</h3>
        <p>Con un'ampia varietà di ristoranti puoi ordinare i tuoi piatti preferiti oppure esplora nuovi ristoranti in zona! </p>
      </div>
      <div class="section">
        <img src="https://res.cloudinary.com/glovoapp/image/fetch///https://glovoapp.com/images/why-glovo/delivery.svg" alt="">
        <h3>Consegna rapida</h3>
        <p>Con un'ampia varietà di ristoranti puoi ordinare i tuoi piatti preferiti oppure esplora nuovi ristoranti in zona! </p>
      </div>
      <div class="section">
        <img src="https://res.cloudinary.com/glovoapp/image/fetch///https://glovoapp.com/images/why-glovo/groceries.svg" alt="">
        <h3>Consegna a tutte le ore </h3>
        <p>Siamo organizzati al meglio per soddisfare i nostri clienti, puoi ordinare nell'orario che preferisci 24h su 24! </p>
      </div>

      </div>

      {{-- banner app --}}
      <div class="banner">
        <div class="container w-75">
          <div class="left-side-banner d-flex jusify-content-center">
            <img src="https://d2egcvq7li5bpq.cloudfront.net/b/hw/img/decoration/apps_promo-wide-je.png" alt="">
          </div>
          <div class="right-side-banner">
            <h2>Scarica la nostra app e ordina comodamente anche da cellulare!</h2>
            <div class="container-img-app d-flex">
              <img src="https://d2egcvq7li5bpq.cloudfront.net/b/hw/img/icons/appstore/ios.it.svg" alt="">
              <img src="https://d2egcvq7li5bpq.cloudfront.net/b/hw/img/icons/appstore/android.it.svg" alt="">
            </div>
          </div>
        </div>
      </div>

      
      

 
@endsection
