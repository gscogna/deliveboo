<header >
  <div class="layover">

    <nav class="navbar navbar-expand-md position-fixed" style="width: 100%; height:140px;">
      <div class="container">
        
        @if (Auth::user())
        <ul class="list-unstyled list-group d-flex">          
          <li class="list-item">
            <a class="navbar-brand" href="{{ url('/') }}">
            DELIVEBOO
            </a>
          </li>         
        </ul>
        @endif

        @if (!Auth::user())
        <ul class="list-unstyled list-group">
          <li><a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('../img/1.png')}}" alt="logo">
          </a></li>
        </ul>
        @endif
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            
          </ul>
  
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link" style="color: #272343; font-size:25px; font-weight:bold;" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" style="color: #272343;font-size:25px; font-weight:bold; margin-right:150px;" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else

            <div class="list-item2">
            <a href="{{ route('admin.home') }}">Torna al tuo ristorante</a>
           </div>

            <li class="nav-item dropdown">

              <a id="navbarDropdown" style="color: #272343;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
              
  
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" style="color: 272343;" href="{{ route('logout') }}"
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
  
   @yield('header.content')
  </div>

</header>
