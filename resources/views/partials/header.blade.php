<header >
  <div class="layover">

    <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="width: 100%;">
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
              <a class="nav-link" style="color: #eb6338;" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" style="color: #eb6338;" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" style="color: #eb6338;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
  
   @yield('header.content')
  </div>

</header>
