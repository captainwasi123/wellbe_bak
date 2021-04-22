@extends('web.includes.master')
@section('title', 'Professionals')
@section('content')

<section class="all-content bg-pink pad-top-60 pad-bot-60">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="textual-content1">
               <h4> Connect with a qualified <br/> wellness professional </h4>
               <ul class="list-type1">
                  <li> <i class="fa fa-map-marker"> </i> Whatever you fancy - massage, beauty, fitness, and more - enter your address to find practitioners nearby.  </li>
                  <li> <i class="fa fa-user"> </i> Choose from multiple treatments, and select if you want to travelm or if you want the practitioner to come to you.  </li>
                  <li> <i class="fa fa-folder"> </i> Enter your preferred data and time, select your practitioner and sit back and relax - we'll sort the rest.  </li>
               </ul>
               <h5> We meet every Wellbe practitioner first </h5>
               <p> We check they have the qualifications, skills and safety record to work with you one-to-one. You can view user ratings and reviews of each professional on their individual profile. </p>
            </div>
         </div>
         <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="appointment-box">
               <h4> Where would you like your appointment? </h4>
               <p> (This will help us match you with practitioners in your area) </p>
               <form>
                  <input type="email" placeholder="Enter your address" name="">
                  <button> <i class="fa fa-search"> </i> </button>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection