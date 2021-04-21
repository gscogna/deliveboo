@extends('layouts.pagamenti')
@section('title', 'Paga il tuo ordine')

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
  <div class="row">
    <div class="col-md-8 col-ms-offset-1">
      <form id="payment-form" action="{{ route('payment.checkout') }}" method="post">
        @csrf
        @method('POST')
        <section>
          <div class="bt-drop-in-wrapper">
              <div id="bt-dropin"></div>
          </div>
      </section>

      <input type="hidden" id="nonce" name="payment_method_nonce"/>

      <div class="buttons">
          <button class="button btn btn-primary" type="submit"><span>Acquista</span></button>
      </div>
  
      </form>
    </div>
  </div>
</div>
<script>
 var form = document.querySelector('#payment-form');
                var client_token = "{{ $token }}";
                braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin',
                }, function (createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                    });
                });
                });
</script>
@endsection