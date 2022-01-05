<!DOCTYPE html>
<html lang="en">
<head>
  <title>Stripe Payment Gateway</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    .stripe-logo {
        width: 210px;
        float: right;
        margin-top: -15px;
    }
    .payment-logo {
        width: 165px;
        margin-top: 11px;
        float: left;
    }
  </style>
</head>
<body>
<div class="container">
      <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="jumbotron text-center">
          <div class="row">
            <div class="col-md-6">
              <img src="{{URL::to('/')}}/public/assets/web/new/images/wellbe-logo.png" class="payment-logo">
            </div>
            <div class="col-md-6">
              <img src="{{URL::to('/')}}/public/assets/web/images/stripe.png" class="stripe-logo">
            </div>
            <div class="col-md-12">
              <hr>
              <h1>Stripe Payment Gateway</h1>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
                <form id="payment-form">
                    @csrf
                    <input type="hidden" name="amount" value="{{$amount}}">
                    <input type="hidden" name="orderId" value="{{$id}}">
                    <label>Please enter your card details below to complete your booking</label>
                    <br><br>
                    <div id="card-element"></div>
                    <br>
                    <div class="col-md-12"  id="pybtn">
                      <button class="btn btn-primary btn-block">Pay ${{$amount}} NZD</button>
                    </div>
                    <div class="col-md-12" id="epybtn">
                    </div>
                </form>
            </div>
          </div>
      </div>
      <div class="col-md-3"></div>
      </div>
    </div>
  
</div>
  <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        var url = "{{route('payment.stripe.charge')}}";
        var stripe = Stripe("{{env('STRIPE_API_KEY')}}");
        var form = document.getElementById('payment-form');
        
        var element = stripe.elements();
        var cardElement = element.create('card');
        cardElement.mount('#card-element');
        
        
       console.log('Registering Form submit handling....');
        form.addEventListener('submit', function(e){
            e.preventDefault();
            
            document.getElementById("epybtn").innerHTML = "<img src='https://static.tildacdn.com/tild3637-3962-4434-b061-613661376165/loader.gif' width='150px' />";

            console.log('Createing Payment intent');
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type' : 'application/json',
                },
                body: JSON.stringify({_token: '{{csrf_token()}}', orderId: '{{$id}}', amount: '{{$amount}}'}),
            })
            .then((response) => response.json())
            .then((data) => {
                
                console.log('Created payment intent: '+data.client_secret);
                stripe.confirmCardPayment(
                    data.client_secret, {
                        payment_method: {
                            card: cardElement,
                        }
                    }
                )
                .then(function(result){
                    if(result.error){
                        document.getElementById("epybtn").innerHTML = '<div class="alert alert-danger"><strong>Please try again.</strong> Please check your card details and try again.</div>';
                        console.log(result.error.message);
                    }else{
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("pybtn").innerHTML = '<div class="alert alert-success"><strong>Payment Successful!</strong></div>';
                                document.getElementById("epybtn").innerHTML = '';
                                setTimeout(function(){
                                    window.location.href = "{{URL::to('/booker')}}";
                                }, 200)
                                console.log(JSON.stringify(result, null, 2));
                            }else{
                                document.getElementById("epybtn").innerHTML = "<img src='https://static.tildacdn.com/tild3637-3962-4434-b061-613661376165/loader.gif' width='150px' />";
                            }
                        };
                        xhttp.open("GET", "{{URL::to('/booker/order/confirmation/'.$id)}}", true);
                        xhttp.send();
                        
                    }
                })
            })
            .catch((error) => {
                
            });
        });
    </script>
</body>
</html>













