@extends('layouts.pagamenti')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-ms-offset-1">
      <form method="POST" action="#">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="inputNome">Nome Completo</label>
          <input type="email" class="form-control" id="inputNome" placeholder="Inserisci il tuo nome completo...">
        </div>
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" placeholder="Inserisci Email...">
        </div>
        <div class="form-group">
          <label for="inputIndirizzo">Indirizzo</label>
          <input type="email" class="form-control" id="inputIndirizzo" placeholder="Inserisci il tuo indirizzo...">
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div id="dropin-container"></div>
      <button id="submit-button">Verifica il metodo di pagamento e paga</button>
    </div>
  </div>
</div>
<script>
 var button = document.querySelector('#submit-button');
 braintree.dropin.create({
   authorization: "{{ $token }}",
   container: '#dropin-container'
 }, function (createErr, instance) {
   button.addEventListener('click', function () {
     instance.requestPaymentMethod(function (err, payload) {
       $.get('{{ route('payment.process') }}', {payload}, function (response) {
         if (response.success) {
           alert('Pagamento Riuscito');
         } else {
           alert('Pagamento Fallito');
         }
       }, 'json');
     });
   });
 });
</script>
@endsection