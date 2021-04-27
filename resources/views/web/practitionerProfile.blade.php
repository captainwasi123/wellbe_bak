@extends('web.includes.master')
@section('title', 'Practitioner Profile')
@section('content')

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
                  <p> <a href="" class="col-black"> <img src="{{URL::to('/')}}/public/assets/web/images/rating-star.png"> Rate Now </a> </p>
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
                  <h5 class="col-grey"> NZ${{number_format($services->duration,2)}} </h5>
                  <span class="service-actions"> <a href="javascript:void(0)"> Add <i class="fa fa-plus"> </i> </a></span>
               </div>
            @endforeach   
            </div>
         </div>
         <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <div class="booking-cart">
               <div class="booking-cart-head">
                  <h4> Booking </h4>
               </div>
               <div class="booking-empty text-center">
                  <img src="{{URL::to('/')}}/public/assets/web/images/empty-cart.png">
                  <p> Your cart is empty <br/> Add an item to begin. </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
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
   })
</script>
@endsection
