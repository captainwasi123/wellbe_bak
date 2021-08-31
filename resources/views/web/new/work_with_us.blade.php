@extends('web.new.includes.master')
@section('title', 'Home')
@section('content')
<!-- Banner Section Starts Here -->
   <section class="banner-sec  bg-5">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 order-lg-1 order-md-1">
               <div class="banner-text">
                  <h3> Earn more on your terms. We’ll take care of the rest.  </h3>
                  <p> Join NZ’s No.1 wellness and beauty app and empower people to be their best selves at home and work. We’re looking for people all over New Zealand today.  </p>
                  <a href="{{URL::to('/register')}}" class="custom-btn1"> Sign Up </a>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 order-lg2 order-md-2">
               <div class="banner-image2">
                  <img src="{{URL::to('/public/assets/web/new/')}}/images/banner-girl.png">
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
            <h4 class="col-blue"> Why work with Wellbe? </h4>
            <p> We’re on a mission to empower beauty and health practitioners all over New Zealand. </p>
         </div>
         <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
               <div class="work-service-box">
                 <span class="circle-1">   <img class="work-img" src="{{URL::to('/public/assets/web/new/')}}/images/location-icon1.svg"> </span>
                  <img class="shape-line1" src="{{URL::to('/public/assets/web/new/')}}/images/shape-line1.png">
                  <h4> Set your territory </h4>
                  <p>  Our advanced geo-mapping tools ensure you’ll only be working in areas you choose for your convenience. </p>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
               <div class="work-service-box works-service-box3">
                 <span class="circle-1">   <img class="work-img" src="{{URL::to('/public/assets/web/new/')}}/images/location-icon4.jpg"> </span>
                  <img class="shape-line2" src="{{URL::to('/public/assets/web/new/')}}/images/shape-line2.png">
                  <h4> Control your own schedule </h4>
                  <p>  Our tool lets you set your own schedule to provide you with freedom and flexibility. </p>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
               <div class="work-service-box">
                   <span class="circle-1"> <img class="work-img" src="{{URL::to('/public/assets/web/new/')}}/images/location-icon5.jpg"> </span>
                  <h4> Maximise your earnings </h4>
                  <p> Set your own prices for services. Wellbe will only take a small service fee for bookings processed, you keep the rest!  </p>
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
   <!-- Professionals You can Trust Section Starts Here -->
   <section class="pad-top-60 pad-bot-60 professional-sec bg-blue">
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 order-lg-1">
               <div class="professional-text">
                  <h4 class="col-blue"> How do I join?</h4>
                  <p> Becoming a member of the Wellbe Community is simple. Create a free account and we’ll be in touch to discuss the onboarding process.</p>
                  <p> You’ll be selling your services in no time. </p>
                  <a href="{{URL::to('/register')}}" class="custom-btn1"> Join Wellbe Today </a>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 order-lg-2">
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
   <!-- The Best Services Section Starts here -->
   <section class="">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <div class="sec-head4 sec-head5 text-left">
                  <div class="ser-det-text no-bg mob-bg-pink">
                     <div>
                        <h4 class="col-blue"> What services can I offer? </h4>
                        <p class="m-b-20"> With an ever growing list of services on offer, we’re always looking out for new talent. </p>
                        <a href="{{URL::to('/register')}}" class="custom-btn1"> Join Now </a>
                     </div>
                  </div>
                  <div class="pro-massage">
                  </div>
                  <div class="service-only-image girl-image5">
                     <img src="{{URL::to('/public/assets/web/new/')}}/images/massage-1.png"  >
 
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <div class="row all-features">
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/feature-icon1.jpg">
                        <h5> Nails </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/feature-icon2.jpg">
                        <h5> Massage </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/feature-icon3.jpg">
                        <h5> Hair </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/feature-icon4.jpg">
                        <h5> Fitness </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/feature-icon5.jpg">
                        <h5> Tanning </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/feature-icon6.jpg">
                        <h5> Facials </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/feature-icon7.jpg">
                        <h5> Makeup </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/feature-icon8.jpg">
                        <h5> Lashes </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/feature-icon9.jpg">
                        <h5> Brows </h5>
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
   <!-- Testimonials Section Starts Here -->
   <section class="pad-top-60 pad-bot-60 bg-3">
      <div class="container-fluid">
         <div class="sec-head4 text-center">
            <h4 class="col-blue"> Don’t just take our word for it... </h4>
            <p> Take a look at what some of our practitioners have to say </p>
         </div>
         <div class="testimonial-slider">
            <div>
               <div class="testimonial-box">
                  <div class="testim-image">
                     <img src="{{URL::to('/public/assets/web/new/')}}/images/user-1.png">
                  </div>
                  <div class="testim-review">
                     <h6>  <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> </h6>
                     <h5> Natalie M </h5>
                     <p> The Wellbe portal is really simple to use. I can see all my upcoming bookings and communicate with  clients if I need to. I love that Wellbe takes most of the administration work away.  </p>
                  </div>
               </div>
            </div>
            <div>
               <div class="testimonial-box">
                  <div class="testim-image">
                     <img src="{{URL::to('/public/assets/web/new/')}}/images/user-2.png">
                  </div>
                  <div class="testim-review">
                     <h6>  <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> </h6>
                     <h5> Casey H </h5>
                     <p> Wellbe takes away the effort of having to advertise my services and find new clients. All I need to do is show up for my bookings and I take home a lot more than I do in the salon. </p>
                  </div>
               </div>
            </div>
            <div>
               <div class="testimonial-box">
                  <div class="testim-image">
                     <img src="{{URL::to('/public/assets/web/new/')}}/images/user-3.png">
                  </div>
                  <div class="testim-review">
                     <h6>  <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> </h6>
                     <h5> Monique M </h5>
                     <p> I love the flexibility Wellbe provides. I can work when I want, where I want - I have so much more time to spend with the kids! </p>
                  </div>
               </div>
            </div>
            <div>
               <div class="testimonial-box">
                  <div class="testim-image">
                     <img src="{{URL::to('/public/assets/web/new/')}}/images/user-4.png">
                  </div>
                  <div class="testim-review">
                     <h6>  <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> </h6>
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
               <a > What is Wellbe? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                  </p>
               </div>
            </div>
            <div class="set">
               <a > What documents do I need? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                  </p>
               </div>
            </div>
            <div class="set">
               <a > Do I need my own equipment or insurance? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                  </p>
               </div>
            </div>
            <div class="set">
               <a > Do I have to wear a uniform? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                  </p>
               </div>
            </div>
            <div class="set">
               <a > How do I manage my bookings? <i class="fa fa-angle-right"></i>
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