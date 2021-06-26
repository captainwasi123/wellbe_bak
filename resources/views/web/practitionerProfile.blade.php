@extends('web.includes.master')
@section('title', 'Practitioner Profile')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<section class="all-content bg-pink pad-top-40 pad-bot-40">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="profile-long">
               <div>
                  <img src="{{empty($data->profile_img) ? '' : URL::to('/'.$data->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">
               </div>
               <div>
                  <h4> {{empty($data->first_name) ? '' : $data->first_name.' '.$data->last_name}} </h4>
                  <p> <img src="{{URL::to('/')}}/public/assets/web/images/map-marker.png"> {{empty($data->user_address) ? '' : $data->user_address->city}}{{empty($data->user_address->country) ? '' : ', '.$data->user_address->country->country}} </p>
                  <p> <a href="javascript:void(0)" class="col-black ratingAvg"> {{empty($data->reviews()) ? '0.0' : number_format($data->reviews()->avg('rating'), 1)}} <span class="fa fa-star" style="color:#ffc126"></span> </a></p>
               </div>
               <div>
                  <p>
                     {{empty($data->bio_description) ? '-' : $data->bio_description}} 
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Practitioner Profile Section Ends Here -->
<!-- All Content Section Starts Here -->
<section class="all-content pad-top-40 pad-bot-40 bg-blue">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="search-form3">
               <form>
                  <input type="text" placeholder="Find Services" name="">
                  <button class="col-pink"> <i class="fa fa-search">  </i> </button>
               </form>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <div class="sidenav-menu">
               <div class="booking-cart-head">
                  <h4> Menu </h4>
               </div>
               <div class="sidenav-menu-items">
                  <ul>
                     @foreach($categories as $key => $val)
                        <li  class="{{ $key == 0 ? 'active' : '' }}" id="{{$val->id}}"> 
                           <a href="javascript:void(0)" class="category" data-id="{{$val->id}}" data-userid="{{$data->id}}"> {{$val->category}}  </a> 
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="pract-services">
            @if(count($services) == 0)
               <div>
                  <h4 class="col-black"> No Services Found </h4>
               </div>
            @endif
            @foreach($services as $services)
               <div>
                  <h4 class="col-black"> {{$services->name}} </h4>
                  <p class="col-grey">  {{$services->description}}
                     <br/> Service Time: {{$services->duration}} Minutes 
                   </p>
                  <h5 class="col-grey"> NZ${{number_format($services->price,2)}} </h5>
                  <span class="service-actions"> 
                     <a href="javascript:void(0)" class="add_cart_pop" data-id="{{$services->id}}" data-name="{{$services->name}}" data-minutes="{{$services->duration}}" data-price="{{$services->price}}" data-price="{{$services->price}}" data-description="{{$services->description}}" data-long_description="{{$services->long_description}}"> Add <i class="fa fa-plus"> </i> </a>
                  </span>
               </div>
            @endforeach   
            </div>
         </div>
         <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <form method="post" action="{{route('booker.order')}}">
              @csrf
              <input type="hidden" name="refid" id="user_id" value="{{base64_encode($data->id)}}">
              <div class="booking-cart">
                 <div class="booking-cart-head">
                    <h4> Booking </h4>
                 </div>
                 <div id="cart_data">
                    @if(\Cart::count() != 0)
                    <div class="booking-cart-items">
                       @foreach(\Cart::content() as $row)
                       <div class="booking-cart-item1">
                       <a class="remove_item" data-id="{{$row->rowId}}">X</a>
                          <h5> {{$row->name}} </h5>
                          <input type="hidden" name="service[]" value="{{$row->id}}">
                          <div class="quantity">
                           <button type="button" class="qtyCounter" data-type="minus" data-id="{{$row->rowId}}">-</button>
                             <input data-value type="text" name="qty[]" value="{{$row->qty}}" readonly />
                           <button type="button" class="qtyCounter" data-type="plus" data-id="{{$row->rowId}}">+</button>
                             <b class="price-cart"> $ {{number_format($row->price,2)}} </b>
                          </div>
                       </div>
                       @endforeach
                    </div>
                    @else
                    <div class="booking-empty text-center">
                       <img src="{{URL::to('/')}}/public/assets/web/images/empty-cartt.png">
                       <p> Your cart is empty <br/></p>
                    </div>
                    @endif
                 </div>
              </div>
              <div class="booking-cart" style="margin-top: 40px;">
                 <div class="booking-cart-head">
                    <h5> Choose Date/Time   </h5>
                 </div>
                 <div class="booking-cart-items" style="padding-top: 20px;">
                    <div class="row">
                       <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                          <div class="form-field4">
                             <p> Choose Date </p>
                             <input type="text" class="form-control" id="iDate" name="booking_date" required>
                          </div>
                       </div>
                       <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                          <div class="form-field4">
                             <p> Choose Time </p>
                             <select class="form-control" id="slots" name="start_time" required>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              @if(Auth::check() && Auth::user()->user_type)
                <button type="submit" id="orderSubmit">Book Now</button>
              @else
                <a id="orderSubmit" data-toggle="modal" data-target=".bs-example-modal-lg"> Sign in to Book </a>
              @endif
            </form>
         </div>
      </div>
   </div>
</section>
<input type="hidden" name="" id="lat" value="{{\Session::get('booker_lat')}}">
<input type="hidden" name="" id="lng" value="{{\Session::get('booker_lng')}}">

<input type="hidden" name="" value="{{@$user_data->ugeofence->lat}}" id="p_lat">
<input type="hidden" name="" value="{{@$user_data->ugeofence->lng}}" id="p_lng">
<input type="hidden" name="" value="{{@$user_data->ugeofence->radious}}" id="radious">

<!-- services pop code -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form id="add_cart">
    <input type="hidden" id="p_id">
    <input type="hidden" id="name">
    <input type="hidden" id="minutes">
    <input type="hidden" id="price">
      <div class="modal-header" style="display:block">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLongTitle" ></h5>
        <br>
        <p id="model_price"><p>
        <div class="booking-cart-item1" style='border-bottom:none;margin-top: -40px'>
            <div class="quantity" style="float:right;">
               <button type="button" class="qtyCounter" data-type="minus">-</button>
               <input data-value type="number" id="qty" value="1" readonly />
               <button type="button" class="qtyCounter" data-type="plus">+</button>
            </div>
         </div>
        
      </div>
      <div class="modal-body">
        <p id="dec1"></p>
        <p id="dec2"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add to cart</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- login code -->
<div class="modal fade modal-size2 bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document" style="max-width: 550px;">
    <div class="modal-content">
      <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      <div class="custom-modal-triggers">
        <ul class="nav nav-tabs" role="tablist">
        	<li class="nav-item">
         		<a class="nav-link active" data-toggle="tab" href="#tabs-11" role="tab">Login</a>
         	</li>
         	<li class="nav-item">
         		<a class="nav-link" data-toggle="tab" href="#tabs-22" role="tab">Sign Up</a>
         	</li>
        </ul>
      </div>
      <div class="custom-modal-head">
      </div>
      <div class="custom-modal-data">
       	<div class="tab-content">
         	<div class="tab-pane active" id="tabs-11" role="tabpanel">
            <br>
            <form id="loginForm2" action="{{URL::to('/loginAttempt')}}">
              <input type="hidden" name="_token" id="loginToken2" value="{{csrf_token()}}">
              <div class="form-field6">
                <p> Email Address </p>
                <input type="email" name="email" id="email2" required>
              </div>
              <div class="form-field6">
                <p> Password </p>
                <input type="password" name="password" id="password2" required>
              </div>
              <div class="forgot-password">
                <a href=""> Forgot Password? </a>
              </div>
             	<div class="form-field7 text-center">
                <button id="login2" class="bg-blue col-white normal-btn rounded"> Login </button>
              </div>
            </form>
         	</div>
         	<div class="tab-pane" id="tabs-22" role="tabpanel">
            <br>
            <form method="post" action="{{URL::to('/register')}}">
              @csrf

              <input type="hidden" name="userType" value="2">

              <input type="hidden" class="form-control" name="status" value="0" required>

              <div class="row">
                <div class="col-md-6">
                  <label> First Name </label>
                  <input type="text" class="form-control" name="first_name" required>
                </div>
                <div class="col-md-6">
                  <label> Last Name </label>
                  <input type="text" class="form-control" name="last_name" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <label> Email Address </label>
                  <input type="email" class="form-control" name="email" required>
                </div>

                <div class="col-md-6">
                  <label> Phone </label>
                  <input type="number" class="form-control" name="phone">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <p> Password </p>
                  <input type="password" class="form-control" name="password" required>
                </div>
                <div class="col-md-6">
                  <p> Confirm Password </p>
                  <input type="password" class="form-control" name="confirmation_password" required>
                </div>
                <div class="col-md-12" id="register_error"></div>
                <div class="col-md-12">
                  <br>
                  <div class="form-field7 text-center">
                     <button class="bg-blue col-white normal-btn rounded"> SIGN UP </button>
                  </div>
                  <br>
                  <p class="modal-msg">Want to work with us? <a href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target=".pro-modal">Register here instead</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('additionalJS')
<script>
$('.add_cart_pop').click(function(){
   var p_id = $(this).data('id');
   var name = $(this).data('name');
   var minutes = $(this).data('minutes');
   var price = parseFloat($(this).data('price')).toFixed(2);
   $('#exampleModalLongTitle').text(name);
   $('#model_price').text('NZ$'+price);
   $('#dec1').text($(this).data('description'));
   $('#dec2').text($(this).data('long_description'));
    
      var p_id = $('#p_id').val(p_id);
      var name = $('#name').val(name);
      var minutes = $('#minutes').val(minutes);
      var price = $('#price').val(price);
  
      $('#exampleModalCenter').modal('show');
});

</script>
@if(session()->has('success'))
  <script type="text/javascript">
    swal({
        title: "Order#: {{ session()->get('success') }}",
        text: 'Thank you for your Order.',
        icon: 'success',
        timer: 1500,
        showConfirmButton: false
    }).then(function(value) {
        window.location.href = window.location.href;
    });    
  </script>
@endif
<script>
   $('.category').click(function(){ 
      var userid = $(this).data('userid');
      var cat_id = $(this).data('id');
      $("li").removeClass("active");
      $("#"+cat_id).addClass("active");
      $('.pract-services').html('<img src="{{URL::to('/')}}/public/assets/images/loaderr.gif">');
      $.get( "{{URL::to('/')}}/user/services/"+userid+"/"+cat_id, function( data ) {
		  $('.pract-services').html( data );
		});
   });
   $('#add_cart').submit(function(e){
      e.preventDefault();
      var p_id = $('#p_id').val();
      var name = $('#name').val();
      var minutes = $('#minutes').val();
      var price = $('#price').val();
      var qty = $('#qty').val();
      var user_id = $('#user_id').val();
      $.ajax({
         url: "{{ route('add_cart') }}",
         method: 'post',
         data: {'p_id':p_id,'name':name,'minutes':minutes,'price':price,'qty':qty,'user_id':user_id, "_token": "{{ csrf_token() }}",},
         dataType: 'json',
         success: function (result) { 
          if (result.status) {
            $('#cart_data').html(result.html);
            $('#exampleModalCenter').modal('hide');
          }else{
            alert('This Practitioners Services Not Available');
          }
            
          
         },
         error: function (msg) {

         },
          
                     
     });
   })
   $('body').on('click','.add_cart',function() {
      var p_id = $(this).data('id');
      var name = $(this).data('name');
      var minutes = $(this).data('minutes');
      var price = $(this).data('price');

      var user_lat = $('#lat').val();
      var user_lng = $('#lng').val();

      var p_lat = $('#p_lat').val();
      var p_lng = $('#p_lng').val();
      var radious = $('#radious').val();

      var user_id = $('#user_id').val();
      if (user_lat == '') {
        alert('Open your location');
        return false;
      }

      $.ajax({
         url: "{{ route('add_cart') }}",
         method: 'post',
         data: {'p_id':p_id,'name':name,'minutes':minutes,'price':price,'user_lat':user_lat,'user_lng':user_lng,'p_lat':p_lat,'p_lng':p_lng ,'radious':radious,'user_id':user_id, "_token": "{{ csrf_token() }}",},
         dataType: 'json',
         success: function (result) { 
          if (result.status) {
            $('#cart_data').html(result.html);
          }else{
            alert('This Practitioners Services Not Available');
          }
            
          
         },
         error: function (msg) {

         },
          
                     
     });
   })
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
   var unavailableDates = @json($holiday);
   function unavailable(date) {
         dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
         if ($.inArray(dmy, unavailableDates) == -1) {
            return [true, ""];
         } else {
            return [false, "", "Unavailable"];
         }
   }
    function nonWorkingDates(date){
        var day = date.getDay(), sunday = 0, monday = 1, tuesday = 2, wednesday = 3, thursday = 4, friday = 5, saturday = 6;
        var closedDates = unavailableDates;
        var closedDays = @json($availability); 
        for (var i = 0; i < closedDays.length; i++) {
            let val = convertDayIntoInt(closedDays[i]);
            if (day == val) {
                return [false];
            }
        }
        for (i = 0; i < closedDates.length; i++) {
            if (date.getMonth() == closedDates[i][0] - 1 &&
            date.getDate() == closedDates[i][1] &&
            date.getFullYear() == closedDates[i][2]) {
                return [false];
            }
        }

        return [true];
    }
    $( "#iDate" ).datepicker({
      minDate: new Date("{{date('d-M-Y')}}"),
      beforeShowDay: nonWorkingDates,
      firstDay: 0,
      dateFormat: 'dd-mm-yy'
    });

    function convertDayIntoInt(str){
      
      switch(str){
        case "sunday":
          return 0;
          break;

        case "monday":
          return 1;
          break;

        case "tuesday":
          return 2;
          break;

        case "wednesday":
          return 3;
          break;

        case "thursday":
          return 4;
          break;

        case "friday":
          return 5;
          break;

        case "saturday":
          return 6;
          break;
      }
    }
})    
</script>
<script>
   $('#iDate').change(function(){
      date = $('#iDate').val();
       userid = $(this).data('userid'); 
      $.get( "{{URL::to('/')}}/user/slots/"+date+"/"+'{{$data->id}}', function( data ) {
		 $('#slots').html( data );
		});
   });
</script>
<script>
  $(document ).ready(function() {
    var lat = $('lat').val();
    if (lat != '') {
      getLocation();  
    }
  });


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  $('#lat').val(position.coords.latitude);
  $('#lng').val(position.coords.longitude);
}

$('body').on('click','.remove_item',function(){
   id = $(this).data('id'); 
      $.get( "{{URL::to('/')}}/cart_update/"+id, function( data ) {
		   $('#cart_data').html(data);
		});
});
</script>
@endsection
