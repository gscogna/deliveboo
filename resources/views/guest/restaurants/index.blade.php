@extends('layouts.app')
@section('title', 'Deliveboo')

@section('header.content')
  <div class="container header-content-guest">
    <div class="hcg-left">
      <h2> Il piacere del cibo a casa tua</h2>
      <div class="header-searchbar">
        <div class="pippo">
          <input @keyup="search_restaurant" v-model='search' type="text" name="" value="" placeholder="cosa stai cercando?">
          <div class="container-search">

            <div class="search-results" @keyup="div_restaurants">
              <ul>
                <li v-for="(val, index) in ristorantiSelezionati" v-if="search != ''" @click="click_restaurant_choice(index)" :key="val.nome">@{{ val.nome }}</li>
              </ul>
            </div> <!-- /search-result -->

          </div> <!-- /container-search -->
          
        </div> <!-- "" -->

      </div><!-- /header-searchbar -->

    </div> <!-- /hcg-left -->

    <div class="hcg-right">
        <img src="{{asset('')}}" alt="">
        <i class="fas fa-angle-double-right"></i>
        <i class="fas fa-house-user"></i>
    </div>
  </div>
@endsection

@section('content')
 <!-- TIPOLOGIE -->
 <h1>Scegli il tipo di cucina</h1>
<div class="container-tipologie">
      <!-- <div class="pippo">
        <img src="https://www.progettoartes.it/wp-content/uploads/2018/01/2018-anno-del-cibo-italiano.jpg" alt="Nome dell'immagine" title="Nome dell'immagine">
      </div> -->
      <div class="tipologie">
     <img src="https://www.esca.it/uploads/grandi/156320026781850.jpg" alt="">
      <a href="#">Italiano</a>
      </div>

      <div class="tipologie">
     <img src="https://images.lacucinaitaliana.it/wp-content/uploads/2017/10/Pizza.jpg" alt="">
      <a href="#">Pizza</a>
      </div>

      <div class="tipologie">
     <img src="https://www.agenziaformativaulisse.it/formazione/wp-content/uploads/2016/12/cucina-messicana.jpg" alt="">
      <a href="#">Messicano</a>
      </div>

      <div class="tipologie">
     <img src="https://lh3.googleusercontent.com/proxy/qFMy7NY7nCQ7fIDDHhEbe_afGafY9cGrpz2oqbonOc9Djr46XynZqkGeEwgpBnP0-gcdNwf8Bhrws4IlJUVuP_add2_ZvYO3j9lkQfAuGNbcWVl9rIm0oAttT-E" alt="">
      <a href="#">Fast-food</a>
</div>

      <div class="tipologie">
       <img src="https://wips.plug.it/cips/paginegialle.it/magazine/cms/2018/07/piatti-tipici-cinesi.jpg?w=744&h=418&a=c" alt=""> 
      <a href="#">Cinese</a>
      </div>

      <div class="tipologie">
       <img src="https://wips.plug.it/cips/paginegialle.it/magazine/cms/2018/07/piatti-cucina-giapponese.jpg?w=744&h=418&a=c" alt=""> 
      <a href="#">Giapponese</a>
      </div>
</div>

<!-- SEGLI RISTORANTE -->
<h1  class="text-center">Scegli il ristorante da cui ordinare</h1>
  <div class="choose-restaurant">
      {{-- <h2>ristoranti</h2> --}}

      <div class="guest-restaurants">

        <div v-for="(element, index) in arrayRistoranti" class="card" v-if ="(ristoranteScelto.length == 0 && search == '') || ristorantiSelezionati.length > 0">

          <div class="card-img-top">
            <img :src="'http://127.0.0.1:8000/storage/'+ element.immagine" alt="">
            <div class="cover-layover">
             <i class="fas fa-utensils"></i>
            </div>
          </div>
          
          
          <a class="plates_route" href="{{ route('guest.restaurant.show') }}">
            <p @click='restaurant_plates(element.user_id)'>@{{element.nome}}</p>
          </a>
          {{-- <a @click='restaurant_plates(element.user_id)' href="{{ route('guest.restaurant.show') }}"><button  type="button" name="button">@{{element.nome}}</button> </a> --}}
        </div>

        <div v-for="(item, index) in ristoranteScelto" v-if="ristoranteScelto.length > 0" class="card-restaurant">
          <img :src="'http://127.0.0.1:8000/storage/'+ item.immagine" alt="">
          <p class="rainbow-text">@{{item.nome}}</p>
          <a @click='restaurant_plates(item.user_id)'  href="{{ route('guest.restaurant.show') }}"><button type="button" name="button">Vai al menù</button> </a>
        </div>

        <div v-if ="!ristorantiSelezionati.length && !ristoranteScelto.length && search != ''">
          nessun ristorante trovato
        </div>

      </div>
      
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

      
      

  </div>
@endsection
