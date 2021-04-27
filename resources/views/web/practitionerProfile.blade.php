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
                     @foreach($categories as $val)
                        <li> 
                           <a href=""> {{$val->category}} </a> 
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="pract-services">
               <div>
                  <h4 class="col-black"> Relaxing Massage </h4>
                  <p class="col-grey"> A soothing massage using gentle strokes and relaxing oils to help relieve tired muscles. <br/> Service Time: 60 Minutes </p>
                  <h5 class="col-grey"> NZ$120.00 </h5>
                  <span class="service-actions"> <a href=""> Add <i class="fa fa-plus"> </i> </a></span>
               </div>
               <div>
                  <h4 class="col-black"> Deep Tissue Massage </h4>
                  <p class="col-grey"> A soothing massage using gentle strokes and relaxing oils to help relieve tired muscles. <br/> Service Time: 60 Minutes </p>
                  <h5 class="col-grey"> NZ$120.00 </h5>
                  <span class="service-actions"> <a href=""> Add <i class="fa fa-plus"> </i> </a></span>
               </div>
               <div>
                  <h4 class="col-black"> Sports Massage </h4>
                  <p class="col-grey"> A soothing massage using gentle strokes and relaxing oils to help relieve tired muscles. <br/> Service Time: 60 Minutes </p>
                  <h5 class="col-grey"> NZ$120.00 </h5>
                  <span class="service-actions"> <a href=""> Add <i class="fa fa-plus"> </i> </a></span>
               </div>
               <div>
                  <h4 class="col-black"> Relaxing Massage </h4>
                  <p class="col-grey"> A soothing massage using gentle strokes and relaxing oils to help relieve tired muscles. <br/> Service Time: 60 Minutes </p>
                  <h5 class="col-grey"> NZ$120.00 </h5>
                  <span class="service-actions"> <a href=""> Add <i class="fa fa-plus"> </i> </a></span>
               </div>
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

@endsection