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
                  <img src="{{URL::to('/'.$data->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">
               </div>
               <div>
                  <h4> {{empty($data->first_name) ? '' : $data->first_name.' '.$data->last_name}} </h4>
                  <p> <img src="{{URL::to('/')}}/public/assets/web/images/map-marker.png"> {{empty($data->user_address) ? '' : $data->user_address->city}}{{empty($data->user_address->country) ? '' : ', '.$data->user_address->country->country}} </p>
                  <p> <a href="javascript:void(0)" class="col-black ratingAvg"> {{empty($data->reviews()) ? '0.0' : number_format($data->reviews()->avg('rating'), 1)}} <img src="{{URL::to('/')}}/public/assets/web/images/rating-star.png"> </a></p>
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
                     <a href="javascript:void(0)" class="add_cart" data-id="{{$services->id}}" data-name="{{$services->name}}" data-minutes="{{$services->duration}}" data-price="{{$services->price}}"> Add <i class="fa fa-plus"> </i> </a>
                  </span>
               </div>
            @endforeach   
            </div>
         </div>
         <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <form method="post" action="{{route('booker.order')}}">
              @csrf
              <input type="hidden" name="refid" value="{{base64_encode($data->id)}}">
              <div class="booking-cart">
                 <div class="booking-cart-head">
                    <h4> Booking </h4>
                 </div>
                 <div id="cart_data">
                    @if(\Cart::count() != 0)
                    <div class="booking-cart-items">
                       @foreach(\Cart::content() as $row)
                       <div class="booking-cart-item1">
                          <h5> {{$row->name}} </h5>
                          <input type="hidden" name="service[]" value="{{$row->id}}">
                          <div class="quantity">
                             <button data-decrease>-</button>
                             <input data-value type="text" name="qty[]" value="{{$row->qty}}" readonly />
                             <button data-increase>+</button>
                             <b class="price-cart"> $ {{number_format($row->price,2)}} </b>
                          </div>
                       </div>
                       @endforeach
                    </div>
                    @else
                    <div class="booking-empty text-center">
                       <img src="{{URL::to('/')}}/public/assets/web/images/empty-cart.png">
                       <p> Your cart is empty <br/> Add an item to begin. </p>
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
                                <option value="">select</option>
                             </select>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              @if(Auth::check() && Auth::user()->user_type)
                <button type="submit" id="orderSubmit">Proceed</button>
              @else
                <a id="orderSubmit" data-toggle="modal" data-target=".bs-example-modal-lg"> Sign In as Booker </a>
              @endif
            </form>
         </div>
      </div>
   </div>
</section>
<input type="" name="" id="lat" value="{{\Session::get('booker_lat')}}">
<input type="" name="" id="lng" value="{{\Session::get('booker_lng')}}">

<input type="" name="" value="{{@$user_data->ugeofence->lat}}" id="p_lat">
<input type="" name="" value="{{@$user_data->ugeofence->lng}}" id="p_lng">
<input type="" name="" value="{{@$user_data->ugeofence->radious}}" id="radious">
@endsection
@section('additionalJS')
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
      $('.pract-services').html('<img src="{{URL::to('/')}}/public/assets/images/loader.gif">');
      $.get( "{{URL::to('/')}}/user/services/"+userid+"/"+cat_id, function( data ) {
		  $('.pract-services').html( data );
		});
   });
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

      if (user_lat == '') {
        alert('Open your location');
        return false;
      }

      $.ajax({
         url: "{{ route('add_cart') }}",
         method: 'post',
         data: {'p_id':p_id,'name':name,'minutes':minutes,'price':price,'user_lat':user_lat,'user_lng':user_lng,'p_lat':p_lat,'p_lng':p_lng ,'radious':radious, "_token": "{{ csrf_token() }}",},
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
</script>
@endsection
