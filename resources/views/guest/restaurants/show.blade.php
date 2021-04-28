@extends('layouts.app')
@section('title', 'Il nostro menù')

  @section('header.content')
       {{-- Sezione slider --}}
       <section id="main">
        <div id="Carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#Carousel" data-slide-to="0" class="active"></li>
            <li data-target="#Carousel" data-slide-to="1"></li>
            <li data-target="#Carousel" data-slide-to="2"></li>
          </ol>
            <div class="carousel-inner">
              <div class="carousel-item carousel-image-1 active">
                <div class="container">
                  <div class="carousel-caption d-none d-sm-block text-right mb-5">
                    <h1 class="display -3 title-color">La velocità del nostro team</h1>
                    <p class="lead">In un solo click</p>
                      
                  </div>
                </div>
              </div>
              {{-- End --}}
              <div class="carousel-item carousel-image-2">
                <div class="container">
                  <div class="carousel-caption d-none d-sm-block text-right mb-5">
                    <h1 class="display -3 title-color">Mangiare a tutte le ore</h1>
                    <p class="lead">Sempre insieme</p>                     
                  </div>
                </div>
              </div>
              <div class="carousel-item carousel-image-3">
                <div class="container">
                  <div class="carousel-caption d-none d-sm-block text-right mb-5">
                    <h1 class="display -3 title-color">Tutto quello che hai voglia di mangiare</h1>
                    <p class="lead">Scoprilo qui con noi</p>                     
                  </div>
                </div>
              </div>
           
              <a href="#Carousel" data-slide="prev" class="carousel-control-prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a href="#Carousel" data-slide="next" class="carousel-control-next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
        </div><!-- fine jumbotron -->


      </section>
    @endsection
    @section('content')
    <div class="container-fluid pagina_color">

    
         {{-- Sezione info ristorante e vario --}}
      <!-- <section id="ristorante-info">

      </section> -->
      {{-- Sezione prodotti e piatti --}}

    <section id="carte">
      <div class="contenitore-sezione">
        <div class="abc">
          <img src="{{ asset('img/img-1.jpeg') }}" alt="foto-1">
        </div>
  
        <div class="abc testo">
          <h2>Col cibo si può donare l'allegria e il sorriso!</h2>
          <h4>Il cibo trova sempre coloro che amano cucinare.</h4>
        </div>
  
        <div class="abc testo">
          <h2>Deliveboo è la nostra medicina!</h2>
          <h4>Nessun amore è più sincero dell'amore per il cibo.</h4>
        </div>
  
        <div class="abc">
          <img src="{{ asset('img/img-2.jpeg') }}" alt="foto-2">
        </div>
      </div>
    </section>

      <section id="products">
      
        <div class="container2">        
           
              {{-- singolo oggetto --}}
              <div class="contenitore-piatti-img" v-for="(item,index) in piattiRistorante">

                

                  <div class="img-container">
                      <img :src="'http://127.0.0.1:8000/storage/'+ item.immagine" alt="">
                  </div>

                    <div class="card-piatti">                   
                        <h5>@{{ item.nome }}</h5>
                        <div class="card-text ">
                        <p>@{{ item.ingredienti }} </p>
                    </div>
                      <div class="prezzo-card"name="prezzo" >
                        <i class="fas fa-euro-sign"></i>
                        <span>@{{ item.prezzo }}</span>

                      </div>
                      <span class="contenitore-btn-aggiungi">
                        <button @click="add_to_chart(index)" class="btn-aggiungi">Aggiungi</button>
                      </span>
                                       
                   </div>  <!-- /card-piatti -->                 

              </div> <!-- /@click -->
            
        </div> <!-- /contenitore-piatti-img -->

        <!--  carrello senza click-->
        <div id="carr">
          <h5>Il tuo carrello</h5>
          <div class="img-carr">
          <img class="tempo" src="https://res.cloudinary.com/glovoapp/image/fetch///https://glovoapp.com/images/svg/eta-icon-time-dark.svg" alt="">
          <img class="pollice" src="https://res.cloudinary.com/glovoapp/f_auto,q_auto/store_ratings/rating_regular.png" alt="">
          <img class="moto" src="https://res.cloudinary.com/glovoapp/image/fetch///https://glovoapp.com/images/glyphs/store-delivery-light.svg" alt="">
          </div>
          <div class="text-img-carr">
            <small>20'</small>
            <small>97%</small>
            <small>$1,99</small>
          </div>
            
              <div class="contenitore-carrello-padre">
                
                  <form class="contenitore-carrello" method="POST" action="{{ route('add.carrello.post') }}">
                  @csrf
                  @method('POST')
                
                    <div class="contenitore_nome_piatto">
                      <div v-for="item in carrello">
                        <div class="nome_piatto">
                          <span @click="delete_to_chart(index)"><i class="fas fa-trash-alt"></i></span> 
                          @{{item.nome}}
                        </div> 
                    </div>
                  </div>      
                    <div class="conteinitore_prezzo_p">
                    <div v-for="item in carrello">
                  <input type="hidden" type="text" name="nome" type="hidden" :value="item.nome" readonly>                    
                   
                    <div class="prezzo_p">
                    <input type="hidden" type="number" name="prezzo" :value="item.prezzo" readonly>
                    @{{item.prezzo}} €
                    </div>
                    
                  </div>             
                 
                    </div>        
                    
                  </form>     
                  <div class="prezzo-totale">
                    <h5>Totale: @{{ sommaCarrelloFinale }} €</h5>
                  </div>  

              </div>   <!-- fine contenitore-carrello -->
               
          
            <div class="container-btn-pag">
              <a href="{{route('payment.process')}}">
              <button type="submit" class="btn-pagamento">Vai al pagamento</button>
            
              </a>
              
            </div>
         
               
         </div>   <!-- fine #carr -->  


      </section> <!-- fine section #products -->
   </div>
     @endsection
