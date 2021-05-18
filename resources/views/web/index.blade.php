@extends('web.includes.master')
@section('title', 'Home')
<style type="text/css">
        body {
          overflow-x: hidden;
        }
        .banner-image img {
    width: 110%;
    max-width: 520px;
}
.banner-text {
    float: left;
    width: 100%;
    margin-top: 90px;
    margin-bottom: 50px;
}
.banner-image {
     margin-top: 0px; 
}
.work-service-box img {
    height: 120px;
    margin-bottom: 5px;
}

.work-service-box p {
    color: black;
    font-size: 15px;
    letter-spacing: 0.4px;
    line-height: 23px;
    padding: 0px 15px;
}
.work-service-box2 {
    text-align: left;
}
.work-service-box2 p {
    padding: 0px;
    max-width: 90%;
}
.sec-head5 {
 
    margin: 0px 0px 0px -15px;
}
.ser-det-text {
    display: block;
    max-width: 100%;
    margin: auto;
    padding-top: 40px;
    background: #fbece7;
    padding-bottom: 150px;
}
.ser-det-text div {
  max-width: 450px;
  margin:auto;
}
.ser-det-text p {
    margin-bottom: 20px;
}
.ser-det-text h4 {
    font-size: 38px;
    font-weight: 600;
    line-height: 50px;
    margin-bottom: 15px;
}
.ser-det-text p {
    margin-bottom: 26px;
    line-height: 30px;
}
.service-only-image {
    float: right;
    max-width: 100%;
    margin-top: -290px;
    margin-right: -26px;
}
.service-only-image img {
    width: 100%;
}
.service-parents {
    padding: 0px 15px;
    padding-top: 50px;
}

@media screen and (max-width:767px) and (min-width:520px) { 
.work-service-box2 {
    text-align: left;
    padding: 0px;
}
 }


/*Mobile Devices*/
@media screen and (max-width:519px) and (min-width:320px) { 
.work-service-box2 {
    text-align: center;
}
.work-service-box2 p {
    padding: 0px 20px;
    max-width: 100%;
}
.sec-head5 {
    margin: 0px 0px;
}
.sec-head5 {
    margin: 0px 0px;
    max-width: 108%;
    width: 108%;
    margin-left: -15px;
}
.ser-det-text div {
    max-width: 85%;
    margin: auto;
}
.service-only-image {
    float: right;
    max-width: 100%;
    margin-top: -220px;
    margin-right: -26px;
}
.ser-det-text h4 {
    font-size: 30px;
    line-height: 44px;
    margin-bottom: 15px;
    font-weight: 700;
}
.ser-det-text p {
    margin-bottom: 26px;
    line-height: 28px;
}
.banner-image img {
    width: 110%;
    max-width: 95%;
}
}



      </style>
@section('content')

 <!-- Banner Section Starts Here -->
      <section class="banner-sec bg-blue">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                  <div class="banner-text">
                     <h3> Wellness And Beauty 
                        Straight To Your Door 
                     </h3>
                     <p> Book wellness and beauty services directly to your door. Sit back, relax, and let our verified professionals take care of the rest. All professionals are all independent contractors, so you pay no salon markups, period.  </p>
                     <form>
                        <i class="fa fa-search"> </i>
                        <input type="text" placeholder="Enter your address" name="">
                        <button> Discover </button>
                     </form>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                  <div class="banner-image">
                     <img src="{{URL::to('/')}}/public/assets/web/images/banner-image.jpg">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Banner Section Ends Here -->
      <!-- How it Works Section Starts here -->
      <section class="pad-top-80">
         <div class="container">
            <div class="sec-head4 text-center">
               <h4> How it Works </h4>
            </div>
            <div class="row">
               <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                  <div class="work-service-box">
                     <img src="{{URL::to('/')}}/public/assets/web/images/work-icon1.jpg">
                     <h4> Location </h4>
                     <p>  Enter your address and we’ll connect you with the best professionals available in your location. </p>
                  </div>
               </div>
               <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                  <div class="work-service-box">
                     <img src="{{URL::to('/')}}/public/assets/web/images/work-icon2.jpg">
                     <h4> Services </h4>
                     <p>  Choose from multiple services and select your preferred professional after reading their reviews </p>
                  </div>
               </div>
               <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                  <div class="work-service-box">
                     <img src="{{URL::to('/')}}/public/assets/web/images/work-icon3.jpg">
                     <h4> Meet </h4>
                     <p> Your professional will be on their way to you at the designated time. Office, home, hotel - we can meet you anywhere. Sit back and relax!  </p>
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
      <section class="pad-top-80">
            <div class="container-fluid">
            <div class="row">

            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="sec-head4 sec-head5 text-left">
              <div class="ser-det-text">
                <div>
               <h4> The best services on offer </h4>
               <p class="m-b-20"> With an ever growing list of services on offer, from massages to hair services, we’re here to cater to your every wellbeing and beauty need. </p>
                    <a href="" class="custom-btn1"> View Services </a>
            </div>
        </div>
            <div class="service-only-image">
            <img src="{{URL::to('/')}}/public/assets/web/images/best-service-image.png">
            </div>
        </div>
            </div>



            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">

            <div class="row service-parents">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                  <div class="work-service-box work-service-box2">
                     <img src="{{URL::to('/')}}/public/assets/web/images/service-icon1.jpg">
                     <h4> Nails </h4>
                     <p>  Treat yo’self with popular nail treatments, our experts bring the salon to you. </p>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                  <div class="work-service-box work-service-box2">
                     <img src="{{URL::to('/')}}/public/assets/web/images/service-icon2.jpg">
                     <h4> Massage </h4>
                     <p>  Relaxation, deep tissue or sports massage are the ultimate way to rejuvenate your body. </p>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                  <div class="work-service-box work-service-box2">
                     <img src="{{URL::to('/')}}/public/assets/web/images/service-icon3.jpg">
                     <h4> Brows & Lashes </h4>
                     <p>  Shape and define your eyes with our brow and lash treatments.  </p>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                  <div class="work-service-box work-service-box2">
                     <img src="{{URL::to('/')}}/public/assets/web/images/service-icon4.jpg">
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
      <section class="pad-top-80 professional-sec">
         <div class="container">
            <div class="row">
               <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                  <div class="professional-image">
                     <img src="{{URL::to('/')}}/public/assets/web/images/professional-girl.jpg">
                  </div>
               </div>
               <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                  <div class="professional-text">
                     <h4> Professionals you can trust </h4>
                     <p> All our professionals go through a vigorous vetting process when they come onboard with us, and have a fully transparent rating system so you can be confident when making your booking. </p>
                     <a href="" class="custom-btn1"> Find a Professional </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Professionals You can Trust Section Ends Here -->
      <!-- FAQs Section Starts Here -->
      <section class="pad-top-80">
         <div class="container">
            <div class="sec-head4 text-center">
               <h4> Frequently Asked Questions </h4>
            </div>
            <div class="faqs-all">
               <div class="set">
                  <a >Who are the Wellbe professionals? <i class="fa fa-plus"></i>
                  </a>
                  <div class="content">
                     <p> We carefully screen and certify each professional. They are all professionally trained and incredibly talented. Every professional 
                        that works with us is fully qualified for the services they offer. We collect regular feedback to ensure you consistently
                        receive a five star experience. 
                     </p>
                  </div>
               </div>
               <div class="set">
                  <a > Can I choose my professional? <i class="fa fa-plus"></i>
                  </a>
                  <div class="content">
                     <p> We carefully screen and certify each professional. They are all professionally trained and incredibly talented. Every professional 
                        that works with us is fully qualified for the services they offer. We collect regular feedback to ensure you consistently
                        receive a five star experience. 
                     </p>
                  </div>
               </div>
               <div class="set">
                  <a > How are prices set? <i class="fa fa-plus"></i>
                  </a>
                  <div class="content">
                     <p> We carefully screen and certify each professional. They are all professionally trained and incredibly talented. Every professional 
                        that works with us is fully qualified for the services they offer. We collect regular feedback to ensure you consistently
                        receive a five star experience. 
                     </p>
                  </div>
               </div>
               <div class="set">
                  <a > How do I get ready for my appointment? <i class="fa fa-plus"></i>
                  </a>
                  <div class="content">
                     <p> We carefully screen and certify each professional. They are all professionally trained and incredibly talented. Every professional 
                        that works with us is fully qualified for the services they offer. We collect regular feedback to ensure you consistently
                        receive a five star experience. 
                     </p>
                  </div>
               </div>
               <div class="set">
                  <a > What can you expect from your service?<i class="fa fa-plus"></i>
                  </a>
                  <div class="content">
                     <p> We carefully screen and certify each professional. They are all professionally trained and incredibly talented. Every professional 
                        that works with us is fully qualified for the services they offer. We collect regular feedback to ensure you consistently
                        receive a five star experience. 
                     </p>
                  </div>
               </div>
               <div class="set">
                  <a > What is your cancellation policy?
                  <i class="fa fa-plus"></i>
                  </a>
                  <div class="content">
                     <p> We carefully screen and certify each professional. They are all professionally trained and incredibly talented. Every professional 
                        that works with us is fully qualified for the services they offer. We collect regular feedback to ensure you consistently
                        receive a five star experience. 
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- FAQs Section Ends Here -->
      <!-- Brand Logos Section Starts Here -->
      <section class="pad-top-80 pad-bot-80">
         <div class="container">
            <div class="sec-head4 text-center">
               <h4> Throught the years we  <br/> 
                  cooperate a lot of companies 
               </h4>
            </div>
            <div class="brand-logos">
               <span> <img src="{{URL::to('/')}}/public/assets/web/images/brand-logo1.jpg"> </span>
               <span> <img src="{{URL::to('/')}}/public/assets/web/images/brand-logo2.jpg"> </span>
               <span> <img src="{{URL::to('/')}}/public/assets/web/images/brand-logo3.jpg"> </span>
               <span> <img src="{{URL::to('/')}}/public/assets/web/images/brand-logo4.jpg"> </span>
               <span> <img src="{{URL::to('/')}}/public/assets/web/images/brand-logo5.jpg"> </span>
            </div>
         </div>
      </section>
      <!-- Brand Logos Section Ends Here -->



@if(session()->has('success'))
    <script type="text/javascript">
      $(document).ready(function(){
        swal({
            title: 'Success!',
            text: '{{ session()->get("success") }}',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
        }).then(function(value) {                            
            window.location.href = data.route;
        });
      });
    </script>
  @endif

  @if(session()->has('error'))
    <script type="text/javascript">
      $(document).ready(function(){
        swal({
            title: 'Error!',
            text: '{{ session()->get("error") }}',
            type: "error",
            timer: 3000,
            showCancelButton: true,
            dangerMode: true,
            cancelButtonClass: '#DD6B55',
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Cancel!',
        }).then(function(value) {
                window.location.href = window.location.href;
        });
      });
    </script>
  @endif
@endsection
