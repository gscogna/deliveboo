
@extends('layouts.app')
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
         {{-- Sezione info ristorante e vario --}}
      <!-- <section id="ristorante-info">

      </section> -->
      {{-- Sezione prodotti e piatti --}}

      <h1 class="text-ordina">Nome del ristorante</h1>

     

      <section id="products">
      
        <div class="container2">        
            <div class="row product-items" id="product-items">
           
              {{-- singolo oggetto --}}
              <div v-for="(item,index) in piattiRistorante" class="col-10 col-sm-8 col-lg-4 mx-auto my-3">

                <div class="contenitore-piatti-img">

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

                </div> <!-- /card -->

              </div> <!-- /@click -->

            </div><!-- /row -->
            
        </div> <!-- /contenitore-piatti-img -->



        <!-- carrello header con click -->
        <!-- <div id="carr-header">

        <form method="POST" action="{{ route('add.carrello.post') }}">
          @csrf
          @method('POST')
            {{-- carrello col click --}}
          <div @click="showCarrello" class="carrello carr-header">
           <i class="fas fa-shopping-cart"></i>
          </div>  

       
        <div :class="show" class="oggetti_carrello carr-header">
          <h5>Il mio carrello</h5>
          <hr>
          <div v-for="(piatto, index) in carrello" class="container-piatti">
            <p>@{{ piatto }}</p>
          </div>
          <div v-for="(val, index) in piattiRistorante">
            <p>@{{ val.contatore }}</p>
          </div>
          <button type="submit" class="btn btn-primary">Primary</button>
  
          <div v-for="item in piattiRistorante" class="input">
            <input type="text" name="nome" :value="item.nome" readonly>
            <input type="number" name="prezzo" :value="item.prezzo" readonly>
          </div>
  
          </form>              
        </div> -->


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
                    <p>Totale da pagare: @{{ sommaCarrelloFinale }} </p>
                  </div>  

              </div>   <!-- fine contenitore-carrello -->
               
          
            <div class="container-btn-pag">
              <a href="{{route('payment.process')}}">
              <button type="submit" class="btn-pagamento">Vai al pagamento</button>
            
              </a>
              
            </div>
         
               
         </div>   <!-- fine #carr -->  


      </section> <!-- fine section #products -->
   
     @endsection
