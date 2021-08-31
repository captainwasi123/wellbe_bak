@extends('web.new.includes.master')
@section('title', 'Home')
@section('content')


<!-- Banner Section Starts Here -->
  <section class="banner-sec  bg-1">
     <div class="container">
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 order-lg-2 order-md-2">
              <div class="banner-text">
                 <h3> All your favourite treatments at home
                 </h3>
                 <p> Wellbe provides beauty & wellness services in the comfort of your home with therapists you can trust.  </p>
                 <form method="get" action="{{route('treatments.search')}}">
                    <input type="hidden" name="lat" id="lat">
                    <input type="hidden" name="long" id="long">
                    <i class="fa fa-search"> </i>
                    <input type="text" placeholder="Enter your address" id="pac-input" name="value" required>
                    <button> Discover </button>
                 </form>
              </div>
           </div>
           <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 order-lg1 order-md-1 mob-no-pad">
              <div class="banner-image">
                 <img src="{{URL::to('/public/assets/web/new/')}}/images/banner-girl1.png">
              </div>
              <div class="banner-users">
                   <div class="">
                    <div class="user-person">
                       <img src="{{URL::to('/public/assets/web/new/')}}/images/user-1.png">
                       <h5> Natalia Martin  </h5>
                       <p> <i class="fa fa-star"> </i> 4.9 </p>
                    </div>
                 </div>
                 <div class="text-right">
                    <div class="user-person text-left">
                       <img src="{{URL::to('/public/assets/web/new/')}}/images/user-2.png">
                       <h5> Casey McPherson  </h5>
                       <p> <i class="fa fa-star"> </i> 5.0 </p>
                    </div>
                 </div>
                 <div class="">
                    <div class="user-person">
                       <img src="{{URL::to('/public/assets/web/new/')}}/images/user-3.png">
                       <h5> Trent Nore  </h5>
                       <p> <i class="fa fa-star"> </i> 4.9 </p>
                    </div>
                 </div>
                 <div class="text-right">
                    <div class="user-person text-left">
                       <img src="{{URL::to('/public/assets/web/new/')}}/images/user-4.png">
                       <h5> Alexia Smith  </h5>
                       <p> <i class="fa fa-star"> </i> 4.8 </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </section>
  <!-- Banner Section Ends Here -->
  <!-- How it Works Section Starts here -->
  <section class="pad-top-80 pad-bot-40 bg-4 ">
     <div class="container">
        <div class="sec-head4 text-center">
           <h4 class="col-blue"> How does it work? </h4>
           <p> Wellbe is NZs leading on demand wellness and beauty marketplace </p>
        </div>
        <div class="row">
           <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
              <div class="work-service-box">
                <span class="circle-1">  <img class="work-img" src="{{URL::to('/public/assets/web/new/')}}/images/location-icon1.svg"> </span>
                 <img class="shape-line1" src="{{URL::to('/public/assets/web/new/')}}/images/shape-line1.png">
                 <h4> Select your location </h4>
                 <p>  Your home, an office, or a hotel - we connect you to the best professionals available in your location! </p>
              </div>
           </div>
           <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
              <div class="work-service-box works-service-box3">
                 <span class="circle-1">  <img class="work-img" src="{{URL::to('/public/assets/web/new/')}}/images/location-icon2.svg"> </span>
                 <img class="shape-line2" src="{{URL::to('/public/assets/web/new/')}}/images/shape-line2.png">
                 <h4> Choose your treatment </h4>
                 <p>  Choose from a range of services and select your preferred professional after reading their reviews. </p>
              </div>
           </div>
           <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
              <div class="work-service-box">
                 <span class="circle-1">  <img class="work-img" src="{{URL::to('/public/assets/web/new/')}}/images/location-icon3.svg"> </span>
                 <h4> Sit back and relax </h4>
                 <p> Select a date/time and your professional will be on their way.  </p>
              </div>
           </div>
        </div>
        <!--  <div class="row ">
           <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">
              <a href="" class="custom-btn1"> View Services </a>
           </div>
           </div> -->
     </div>
  </section>
  <!-- How it Works Section Ends here -->
  <!-- The Best Services Section Starts here -->
  <section class="">
     <div class="container-fluid">
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
              <div class="sec-head4 sec-head5 text-left">
                 <div class="ser-det-text">
                    <div>
                       <h4 class="col-blue"> The best services, whenever you need </h4>
                       <p class="m-b-20"> With an ever growing list of services on offer, our team are here to cater to your every wellbeing and beauty need. </p>
                       <a data-toggle="modal" data-target=".coming-soon-modal" class="custom-btn1"> All Services </a>
                    </div>
                 </div>
                 <div class="service-only-image">
                    <img src="{{URL::to('/public/assets/web/new/')}}/images/massage-1.PNG" class="mobile-off">
                    <img src="{{URL::to('/public/assets/web/new/')}}/images/massage-mobile-image.jpg" class="mobile-onn">
                 </div>
              </div>
           </div>
           <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
              <div class="row service-parents m-t-50">
                 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="work-service-box work-service-box2">
                       <img class="service-img" src="{{URL::to('/public/assets/web/new/')}}/images/service-icon5.svg">
                       <h4> Nails </h4>
                       <p>  Treat yo’self with popular nail treatments, our experts bring the salon to you. </p>
                    </div>
                 </div>
                 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="work-service-box work-service-box2">
                       <img class="service-img" src="{{URL::to('/public/assets/web/new/')}}/images/service-icon6.svg">
                       <h4> Massage </h4>
                       <p>  Relaxation, deep tissue or sports massage are the ultimate way to rejuvenate your body. </p>
                    </div>
                 </div>
                 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="work-service-box work-service-box2">
                       <img class="service-img" src="{{URL::to('/public/assets/web/new/')}}/images/service-icon7.svg">
                       <h4> Brows & Lashes </h4>
                       <p>  Shape and define your eyes with our brow and lash treatments.  </p>
                    </div>
                 </div>
                 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="work-service-box work-service-box2">
                       <img class="service-img" src="{{URL::to('/public/assets/web/new/')}}/images/service-icon8.svg">
                       <h4> Make Up </h4>
                       <p>  No matter the occasion, our make up artists are experts at day-time, evening and wedding looks. </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <!--  <div class="row ">
           <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">
              <a href="" class="custom-btn1"> View Services </a>
           </div>
           </div> -->
     </div>
  </section>
  <!-- The Best Services Section Ends here -->
  <!-- Professionals You can Trust Section Starts Here -->
  <section class="pad-top-60 pad-bot-60 professional-sec">
     <div class="container">
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 order-lg-2">
              <div class="professional-text">
                 <h4 class="col-blue"> The best talent from all over New Zealand </h4>
                 <p> Each and every one of our professionals is qualified and insured. Vetted and tested by us, rated and reviewed by you.   </p>
                 <a data-toggle="modal" data-target=".coming-soon-modal" class="custom-btn1"> Find a Professional </a>
              </div>
           </div>
           <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 order-lg-1">
              <div class="map-persons">
                 <div class="m-b-30 m-t-30">
                    <div class="user-person">
                       <img src="{{URL::to('/public/assets/web/new/')}}/images/user-1.png">
                       <h5> Natalia Martin  </h5>
                       <p> <i class="fa fa-star"> </i> 4.9 </p>
                    </div>
                 </div>
                 <div class="m-b-30 text-right">
                    <div class="user-person text-left">
                       <img src="{{URL::to('/public/assets/web/new/')}}/images/user-2.png">
                       <h5> Casey McPherson  </h5>
                       <p> <i class="fa fa-star"> </i> 5.0 </p>
                    </div>
                 </div>
                 <div class="m-b-30">
                    <div class="user-person">
                       <img src="{{URL::to('/public/assets/web/new/')}}/images/user-3.png">
                       <h5> Trent Nore  </h5>
                       <p> <i class="fa fa-star"> </i> 4.9 </p>
                    </div>
                 </div>
                 <div class="m-b-30 text-right">
                    <div class="user-person text-left">
                       <img src="{{URL::to('/public/assets/web/new/')}}/images/user-4.png">
                       <h5> Alexia Smith  </h5>
                       <p> <i class="fa fa-star"> </i> 4.8 </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </section>
  <!-- Professionals You can Trust Section Ends Here -->
  <!-- Testimonials Section Starts Here -->
  <section class="pad-top-60 pad-bot-60 bg-3">
     <div class="container-fluid">
        <div class="sec-head4 text-center">
           <h4 class="col-blue"> Don’t just take our word for it... </h4>
           <p> Take a look at what some of our fans have to say </p>
        </div>
        <div class="testimonial-slider">
           <div>
              <div class="testimonial-box">
               <br>
                 <div class="testim-review">
                    <h6> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-silver"> </i>  </h6>
                    <h5> Paige A </h5>
                    <p> Great service, therapists are always polite, professional and friendly. Very convenient - highly recommend. </p>
                 </div>
              </div>
           </div>
           <div>
              <div class="testimonial-box">
               <br>
                 <div class="testim-review">
                    <h6> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-silver"> </i>  </h6>
                    <h5> Hayden W </h5>
                    <p> Melanie was amazing. Couldn’t recommend highly enough. I have already booked another massage. </p>
                 </div>
              </div>
           </div>
           <div>
              <div class="testimonial-box">
               <br>
                 <div class="testim-review">
                    <h6> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-silver"> </i>  </h6>
                    <h5> Alex B </h5>
                    <p> Booked deep tissue massage for me and my husband. Jackson was very good - he worked through our knots and tense muscles for two hours. We enjoyed our massage! </p>
                 </div>
              </div>
           </div>
           <div>
              <div class="testimonial-box">
               <br>
                 <div class="testim-review">
                    <h6> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-blue"> </i> <i class="fa fa-star col-silver"> </i>  </h6>
                    <h5> Hayden W </h5>
                    <p> Melanie was amazing. Couldn’t recommend highly enough. I have already booked another massage. </p>
                 </div>
              </div>
           </div>
        </div>
     </div>
     </div>
  </section>
  <!-- Testimonials Section Ends Here -->
  <!-- FAQs Section Starts Here -->
  <section class="pad-top-60 pad-bot-60   bg-2">
     <div class="container">
        <div class="sec-head4 text-center">
           <h4 class="col-blue"> Want to know more? </h4>
           <p> View some of our frequently asked questions.. </p>
        </div>
        <div class="faqs-all">
           <div class="set">
              <a >Who are the Wellbe professionals? <i class="fa fa-angle-right"></i>
              </a>
              <div class="content">
                 <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                 </p>
              </div>
           </div>
           <div class="set">
              <a > Do I need to provide anything for the treatment? <i class="fa fa-angle-right"></i>
              </a>
              <div class="content">
                 <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                 </p>
              </div>
           </div>
           <div class="set">
              <a > When can I book for? <i class="fa fa-angle-right"></i>
              </a>
              <div class="content">
                 <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                 </p>
              </div>
           </div>
           <div class="set">
              <a > What if I need to make changes? <i class="fa fa-angle-right"></i>
              </a>
              <div class="content">
                 <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                 </p>
              </div>
           </div>
        </div>
     </div>
  </section>
  <!-- FAQs Section Ends Here -->

@endsection
@section('addScript')
  <script>
      google.maps.event.addDomListener(window, 'load', initialize);
      function initialize() {
            var input = document.getElementById('pac-input');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            // place variable will have all the information you are looking for.
            $('#lat').val(place.geometry['location'].lat());
            $('#long').val(place.geometry['location'].lng());
         });
      }
  </script>
@endsection