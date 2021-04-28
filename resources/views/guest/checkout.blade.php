@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container-checkout d-flex align-items-center flex-column">
        <h1>LA TRANSAZIONE E' AVVENUTA CON SUCCESSO</h1>
        <button class="btn mostra-tutti">
            <a href="{{ url('/') }}">Torna alla homepage</a>
        </button>
    </div>
</div>

{{-- Another section --}}
<section id="about-sec">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 text-center">
          <img src="https://www.dolcesalato.com/wp-content/uploads/sites/5/2020/04/food-delivery-02.jpg" width="450" height="150" 
          class="img-fluid watch-img">
        </div>
      </div>
    </div>       
    </div>
  </section>
@endsection