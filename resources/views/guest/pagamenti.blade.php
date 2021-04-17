@extends('layouts.pagamenti')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div id="dropin-container"></div>
      <button id="submit-button">Request payment method</button>
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
           alert('Payment successfull!');
         } else {
           alert('Payment failed');
         }
       }, 'json');
     });
   });
 });
</script>
@endsection