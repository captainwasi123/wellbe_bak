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
                  <a href="{{URL::to('/register/pro')}}" class="custom-btn1"> Sign Up </a>
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
         <div class="row">
            <div class="col-md-12">
               <div class="sec-head4 text-center">
                  <h4 class="col-blue"> Why work with Wellbe? </h4>
                  <p style="max-width: 650px;"> We’re on a mission to empower beauty and health practitioners all over New Zealand. </p>
               </div>
            </div>
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
                  <a href="{{URL::to('/register/pro')}}" class="custom-btn1"> Join Wellbe Today </a>
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
                        <a href="{{URL::to('/register/pro')}}" class="custom-btn1"> Join Now </a>
                     </div>
                  </div>
                  <div class="pro-massage">
                  </div>
                  <div class="service-only-image girl-image5">
                     <img src="{{URL::to('/public/assets/web/new/')}}/images/massage-1.PNG"  >
 
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <div class="row all-features">
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/new-categories/Nails.png">
                        <h5> Nails </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/new-categories/Massage.png">
                        <h5> Massage </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/new-categories/Hair.png">
                        <h5> Hair </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/new-categories/Fitness.png">
                        <h5> Fitness </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/new-categories/Tanning.png">
                        <h5> Tanning </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/new-categories/Facials.png">
                        <h5> Facials </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/new-categories/Make-Up.png">
                        <h5> Makeup </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/new-categories/Lashes.png">
                        <h5> Lashes </h5>
                     </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                     <div class="feature-box mob-text-center">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/new-categories/Yoga.png">
                        <h5> Yoga </h5>
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
               <br>
                 <div class="testim-review">
                    <h6>  <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> </h6>
                    <h5> Sarah A </h5>
                    <p> Working with Wellbe has been excellent. I have two young children so being able to set my own hours is very important. Wellbe provides me with a lot of flexibility. </p>
                 </div>
              </div>
           </div>
           <div>
              <div class="testimonial-box">
               <br>
                 <div class="testim-review">
                   <h6>  <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> </h6>
                    <h5> Holly W </h5>
                    <p> I moved out of the beauty industry a few years ago to pursue a corporate job. I’m happy I can keep using my skills as a beauty therapist to earn some extra money when it’s convenient for me. The Wellbe team have been very supportive in helping me get set up. </p>
                 </div>
              </div>
           </div>
           <div>
              <div class="testimonial-box">
               <br>
                 <div class="testim-review">
                    <h6>  <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> <img src="{{URL::to('/public/assets/web/new/')}}/images/icon-star.svg"> </h6>
                    <h5> Taylor S </h5>
                    <p> I have been delivering home treatments for a while, but have had trouble finding new clients outside of my network. Wellbe takes care of that for me. I also don’t have to take care of payments/administration which is a hugh benefit! </p>
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
            <p class="pad-bot-20"> View some of our frequently asked questions.. </p>
         </div>
         <div class="faqs-all">
            <div class="set">
               <a > What is Wellbe? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> Wellbe connects the best practitioners directly to clients all over New Zealand provide a range of personal care and wellness services in their homes, hotels, office. No phone calls, cash payments, or stress to deal with. Simply sign up, and we’ll start sending clients your way!
                  </p>
               </div>
            </div>
            <div class="set">
               <a > How does it work? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> Clients simply make their booking online via the Wellbe website – and get matched instantly with one of the available practitioners in their area, who receive all the information they need to complete the job. Practitioners can manage their bookings via our Wellbe portal - which allows them to set their own working days/hours, select the treatments they offer, set prices, communicate with clients, and more.
                  </p>
               </div>
            </div>
            <div class="set">
               <a > Do I need my own insurance? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> All practitioners must have an insurance policy to offer treatments on Wellbe. This ensures (if required) that you can pay compensation for unintended and unexpected personal injury and property damage that might arise from your products or services. We’ve put together <a class="faq_link" style="color: #70a3ff !important;" href="https://wellbeltd.zendesk.com/hc/en-us/articles/4415607842329" >these guidelines</a> to enable new and existing Wellbe professionals to choose the insurance cover that provides you with adequate protection and meets Wellbe's requirements.
                  </p>
               </div>
            </div>
            <div class="set">
               <a > What experience and equipment do I need? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> Wellbe prides itself on connecting high-quality, vetted, and fully trained practitioners to our customers. As such, when coming onboard all practitioners on Wellbe must be able to provide the <a class="faq_link" style="color: #70a3ff !important;" href="https://wellbeltd.zendesk.com/hc/en-us/articles/4415034133529-What-documents-experience-do-I-need-to-deliver-treatments-" >following documentation/proof of experience</a> before they start taking bookings.
                  </p>
               </div>
            </div>
            <div class="set">
               <a > How much will I be paid? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> Wellbe allows you to set your own prices for services you want to offer. Unlike traditional salons, where the practitioners may take home as little as 25%, practitioner earnings for a Wellbe booking is 70% of the total bookings amount. The rest is split between 15% for GST (so you don’t have to pay it), and a 15% commission to Wellbe to cover the costs of running our platform and marketing our services.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- FAQs Section Ends Here -->

@endsection
@section('addScript')

<script type="text/javascript">
   $(document).ready(function(){
      'use strict'

      
      setTimeout(function(){
         var newsletterAtt = getCookie("newsletterAtt");
         if(newsletterAtt != 'Yes'){
            $('.newsletterModal').modal('show');
            setCookie("newsletterAtt","Yes",60);
         }
      }, 10000);
   });

</script>

@endsection