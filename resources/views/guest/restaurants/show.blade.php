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
      <div class="header_diversa">
        <div class="layover">

          <nav class="navbar navbar-expand-md navbar-light position-fixed shadow-sm" style="width: 100%;">
            <div class="container">
              @if (Auth::user())
              <ul class="list-unstyled list-group d-flex">
                <li class="list-item"><a class="navbar-brand" href="{{ url('/') }}">
                  DELIVEROO
                </a></li>
                    
                <li class="list-item"><a href="{{ route('admin.home') }}">Torna al tuo ristorante</a></li>
              </ul>
              @endif

              @if (!Auth::user())
              <ul class="list-unstyled list-group">
                <li><a class="navbar-brand" href="{{ url('/') }}">
                  DELIVEROO
                </a></li>
              </ul>
              @endif
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
              </button>
        
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                  
                </ul>
        
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
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
            </div>
          </nav>
        </div>
      </div>
      <div class="jumbotrone">
      </div>
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
                    <h1 class="display -3 title-color">Title One</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                      <a href="#" class="btn btn-color slide-btn btnl-lg">
                        Sign up Now
                      </a>
                  </div>
                </div>
              </div>
              {{-- End --}}
              <div class="carousel-item carousel-image-2">
                <div class="container">
                  <div class="carousel-caption d-none d-sm-block text-right mb-5">
                    <h1 class="display -3 title-color">Title 2</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                      <a href="#" class="btn btn-color slide-btn btnl-lg">
                        Add
                      </a>
                  </div>
                </div>
              </div>
              <div class="carousel-item carousel-image-3">
                <div class="container">
                  <div class="carousel-caption d-none d-sm-block text-right mb-5">
                    <h1 class="display -3 title-color">Title 3</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                      <a href="#" class="btn btn-color slide-btn btnl-lg">
                        Add 3333
                      </a>
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
        </div>
      </section>
      {{-- Sezione info ristorante e vario --}}
      <section id="ristorante e info">

      </section>
      {{-- Sezione prodotti e piatti --}}
      <section id="products" class="products py-5">
        <div class="container">
          <div class="row">
            <div class="col-10 mx-auto col-sm-6 text-center">
              <h1 class="text-capitalize product-title">
                Piatti Tipici e tradizionali
              </h1>
            </div>
          </div>
          <div class="row product-items" id="product-items">
            {{-- singolo oggetto --}}
            <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
              <div class="card single-item">
                <div class="img-container">
                  <img src="https://static.cookist.it/wp-content/uploads/sites/21/2018/05/pizza-fritta-638x425.jpg" class="card-img-top product-img" alt="">
                </div>
                <div class="card-body">
                  <div class="card-text d-flex justify-content-between text-capitalize">
                    <h5 id="item-name">Pizza Fritta</h5>
                    <span><i class="fas fa-dollar-sign"></i>12</span>
                  </div>
                </div>
              </div>
            </div>
            {{-- singolo oggetto --}}
            <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
              <div class="card single-item">
                <div class="img-container">
                  <img src="https://static.cookist.it/wp-content/uploads/sites/21/2018/05/pizza-fritta-638x425.jpg" class="card-img-top product-img" alt="">
                </div>
                <div class="card-body">
                  <div class="card-text d-flex justify-content-between text-capitalize">
                    <h5 id="item-name">Pizza Fritta</h5>
                    <span><i class="fas fa-dollar-sign"></i>12</span>
                  </div>
                </div>
              </div>
            </div>
            {{-- singolo oggetto --}}
            <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
              <div class="card single-item">
                <div class="img-container">
                  <img src="https://static.cookist.it/wp-content/uploads/sites/21/2018/05/pizza-fritta-638x425.jpg" class="card-img-top product-img" alt="">
                </div>
                <div class="card-body">
                  <div class="card-text d-flex justify-content-between text-capitalize">
                    <h5 id="item-name">Pizza Fritta</h5>
                    <span><i class="fas fa-dollar-sign"></i>12</span>
                  </div>
                </div>
              </div>
            </div>
                {{-- singolo oggetto --}}
            <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
              <div class="card single-item">
                <div class="img-container">
                  <img src="https://static.cookist.it/wp-content/uploads/sites/21/2018/05/pizza-fritta-638x425.jpg" class="card-img-top product-img" alt="">
                </div>
                <div class="card-body">
                  <div class="card-text d-flex justify-content-between text-capitalize">
                    <h5 id="item-name">Pizza Fritta</h5>
                    <span><i class="fas fa-dollar-sign"></i>12</span>
                  </div>
                </div>
              </div>
            </div>
                {{-- singolo oggetto --}}
            <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
              <div class="card single-item">
                <div class="img-container">
                  <img src="https://static.cookist.it/wp-content/uploads/sites/21/2018/05/pizza-fritta-638x425.jpg" class="card-img-top product-img" alt="">
                </div>
                <div class="card-body">
                  <div class="card-text d-flex justify-content-between text-capitalize">
                    <h5 id="item-name">Pizza Fritta</h5>
                    <span><i class="fas fa-dollar-sign"></i>12</span>
                  </div>
                </div>
              </div>
            </div>
                {{-- singolo oggetto --}}
            <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
              <div class="card single-item">
                <div class="img-container">
                  <img src="https://static.cookist.it/wp-content/uploads/sites/21/2018/05/pizza-fritta-638x425.jpg" class="card-img-top product-img" alt="">
                </div>
                <div class="card-body">
                  <div class="card-text d-flex justify-content-between text-capitalize">
                    <h5 id="item-name">Pizza Fritta</h5>
                    <span><i class="fas fa-dollar-sign"></i>12</span>
                  </div>
                </div>
              </div>
            </div>
                {{-- singolo oggetto --}}
            <div class="col-10 col-sm-8 col-lg-4 mx-auto my-3">
              <div class="card single-item">
                <div class="img-container">
                  <img src="https://static.cookist.it/wp-content/uploads/sites/21/2018/05/pizza-fritta-638x425.jpg" class="card-img-top product-img" alt="">
                </div>
                <div class="card-body">
                  <div class="card-text d-flex justify-content-between text-capitalize">
                    <h5 id="item-name">Pizza Fritta</h5>
                    <span><i class="fas fa-dollar-sign"></i>12</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
</body>