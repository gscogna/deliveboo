<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      

        <div class="layover">
        
           <nav class="navbar-show navbar-expand-md" style="width: 100%;">
           <!-- <div class="container2"> -->

            
              <div class="collapse-show navbar-collapse">
                <!-- Left Side Of Navbar -->
                  @if (Auth::user())
                  <ul class="navbar-nav-show-left">
                      <li class="list-item">
                        
                         <a class="navbar-brand" href="{{ url('/') }}"> 
                        DELIVEBOO
                        <i class="fas fa-angle-double-right"></i>
                        </a>
                      </li>                                   
                    </ul> 
                @endif

                @if (!Auth::user())
                  <ul class="list-unstyled list-group">
                    <li>
                      <a class="navbar-brand" href="{{ url('/') }}">
                      DELIVEBOO
                      <i class="fas fa-angle-double-right"></i>
                    </a></li>
                  </ul>
                  @endif
        
               
        
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav-show-right">
                  <!-- Authentication Links -->
                  
                  @guest
                     <li class="nav-item">
                      <a class="nav-link" style="color: #272343;" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="nav-link" style="color: #272343;" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li> 
                    @endif
                    @else
                    <li class="list-item">
                      <a href="{{ route('admin.home') }}">
                        Torna al tuo ristorante
                      </a>
                     </li>
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" style="color: #272343;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                      </a>
                      
          
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" style="color: #eb6338;" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                       </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </div>
                    </li>
                  @endguest
                </ul>
              </div>
            
          </nav>
        </div>
      
      <div class="jumbotrone">
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
      {{-- Sezione info ristorante e vario --}}
      <!-- <section id="ristorante-info">

      </section> -->
      {{-- Sezione prodotti e piatti --}}

      <h1 class="text-ordina">Ordina i tuoi piatti</h1>

      <section id="products" class="products py-5">
     
        <div class="container2">
         

            <div class="row product-items" id="product-items">
              {{-- singolo oggetto --}}
              <div @click="add_to_chart(index)" v-for="(item,index) in piattiRistorante" class="col-10 col-sm-8 col-lg-4 mx-auto my-3">

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
            
              <div class="contenitore-carrello">
                
                  <form method="POST" action="{{ route('add.carrello.post') }}">
                  @csrf
                  @method('POST')
                
                  <div class="quantita">

                  <!-- <div v-for="(piatto, index) in carrello">
                    <p>@{{ piatto }}</p>
                  </div> 
                   -->
                  <!-- <div v-for="(val, index) in piattiRistorante">
                    <p>@{{ val.contatore }}</p>
                    </div> -->                    
                  </div>

                    <div class="contenitore_nome_piatto">
                      <div v-for="item in piattiRistorante">
                        <div class="nome_piatto"> 
                          <span>@{{item.nome}}</span>
                        </div> 
                    </div>
                  </div>      
                    <div class="conteinitore_prezzo_p">
                    <div v-for="item in piattiRistorante">
                  <input type="text" name="nome" type="hidden" :value="item.nome" readonly>                     -->
                   
                    <div class="prezzo_p">
                    <input type="number" name="prezzo" :value="item.prezzo" readonly>
                    <span>@{{item.prezzo}}</span>
                    </div>
                    
                  </div>             
                 
                    </div>          
                  
                </form>     

              </div>   <!-- fine contenitore-carrello -->
               
          
            <div class="container-btn-pag">
              <a href="{{route('payment.process')}}">
              <button type="submit" class="btn-pagamento">Vai al pagamento</button>
            
              </a>
              
            </div>
         
               
         </div>   <!-- fine #carr -->  


      </section> <!-- fine section #products -->
      


      {{-- Another section --}}
      <section id="about-sec">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5 text-center">
              <img src="https://www.dolcesalato.com/wp-content/uploads/sites/5/2020/04/food-delivery-02.jpg" width="450" height="150" 
              class="img-fluid watch-img">
            </div>
            <div class="col-lg-7 text-lg-right  text-center text-color about-text">
              <h2>Il team 2 della 24</h2>
              <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing 
                elit. Perferendis itaque sequi facere deleniti 
                repellat minima doloribus nostrum consectetur enim 
                accusantium.</p>
            </div>
          </div>
        </div>       
        </div>
      </section>








      {{-- Fine Carrello --}}
    <!--End of Contact Section-->
      <!--Footer-->
      <footer class="footer mt-5">
        <div class="text-center py-5">
            <h2 class="py-3">Time Value</h2>
          <div class="mx-auto heading-line"></div>
        </div>
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla aliquet est nec aliquet. 
                      Cras convallis ultrices sem, id cursus tellus varius. </p>
                    <div class="justify-content-center">
                      <i class="fab fa-facebook fa-2x"></i>
                      <i class="fab fa-twitter fa-2x"></i>
                      <i class="fab fa-instagram fa-2x"></i>
                    </div>
              </div>
            </div>
            <div class="copyright text-center py-3 border-top text-light">
              <p>&copy; Copy Right Time Value</p>
            </div>
        </div>
      </footer>
    </div>
   </div> 
</div>
</div>
</body>