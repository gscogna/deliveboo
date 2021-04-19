@extends('layouts.app')
@section('header.content')
  <div class="container header-content-guest">
    <div class="hcg-left">
      <h2> Il piacere del cibo a casa tua</h2>
      <div class="header-searchbar">
        <input @keyup="search_restaurant" v-model='search' type="text" name="" value="" placeholder="cosa stai cercando?">
        <button type="button" name="button">Cerca</button>
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


    <!-- Inizio sezione telefono -->

  <div class="container-fluid">

    <div class="card">
      <img class="img-fluid" src="https://d2egcvq7li5bpq.cloudfront.net/a/hw/img/decoration/apps_promo-narrow-je.png" class="img-fluid" alt="Immagini su ipad e telefono">  
    </div>

    <div class="card">
        <p class="card-text">
          Scarica l'app e ordina dove vuoi, </p>
          <p class="card-text">
          qualunque cosa desideri! </p>
        
        <div class="card-body"> 
          <img src="https://d2egcvq7li5bpq.cloudfront.net/a/hw/img/icons/appstore/ios.it.svg" alt="Scarica app su Ios">
          <img src="https://d2egcvq7li5bpq.cloudfront.net/a/hw/img/icons/appstore/android.it.svg" alt="Scarica app da google play">
        </div>

    </div>  <!-- fine card -->
   
  </div> <!-- fine container-fluid -->
   
@endsection
