@extends('web.includes.master')
@section('title', 'Home')
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
        <div class="row ">
           <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">
              <a href="" class="custom-btn1"> View Services </a>
           </div>
        </div>
     </div>
  </section>
  <!-- How it Works Section Ends here -->
  <!-- The Best Services Section Starts here -->
  <section class="pad-top-80">
     <div class="container">
        <div class="sec-head4 text-center">
           <h4> The best services on offer </h4>
           <p> With an ever growing list of services on offer, from massages to hair services, we’re here to cater to your every wellbeing and beauty need. </p>
        </div>
        <div class="row">
           <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
              <div class="work-service-box">
                 <img src="{{URL::to('/')}}/public/assets/web/images/service-icon1.jpg">
                 <h4> Nails </h4>
                 <p>  Treat yo’self with popular nail treatments, our experts bring the salon to you. </p>
              </div>
           </div>
           <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
              <div class="work-service-box">
                 <img src="{{URL::to('/')}}/public/assets/web/images/service-icon2.jpg">
                 <h4> Massage </h4>
                 <p>  Relaxation, deep tissue or sports massage are the ultimate way to rejuvenate your body. </p>
              </div>
           </div>
           <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
              <div class="work-service-box">
                 <img src="{{URL::to('/')}}/public/assets/web/images/service-icon3.jpg">
                 <h4> Brows & Lashes </h4>
                 <p>  Shape and define your eyes with our brow and lash treatments.  </p>
              </div>
           </div>
           <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
              <div class="work-service-box">
                 <img src="{{URL::to('/')}}/public/assets/web/images/service-icon4.jpg">
                 <h4> Make Up </h4>
                 <p>  No matter the occasion, our make up artists are experts at day-time, evening and wedding looks. </p>
              </div>
           </div>
        </div>
        <div class="row ">
           <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">
              <a href="" class="custom-btn1"> View Services </a>
           </div>
        </div>
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

@endsection
@section('additionalJS')
<script>
$("#login").click(function (e) {
    e.preventDefault();
    // var formData = {
    //     email : $("#email").val(),
    //     password : $("#password").val(),
    // }
    var email = $("#email").val();
    var password = $("#password").val();
    $.ajax({
        type: "post",
        url: "./loginAttempt",
        data: {
            'email':email,
            'password':password,
            _token:'{{ csrf_token() }}',
            },
        dataType: "json",
        success: function (data) {
            if(data.status == 200){
                if(data.user_type == 2){
                    $(".modal").hide();
                    swal({
                        title: 'Logged In',
                        text: 'Successfully Logged In As A Booker',
                        icon: 'success',
                        showConfirmButton: false
                    }).then(function(value) {
                        if (value) {
                            window.location.href = data.route;
                        }
                    });
                }else if (data.user_type == 1) {
                    $(".modal").hide();
                    swal({
                        title: 'Logged In',
                        text: 'Successfully Logged In As A Practitioner',
                        icon: 'success',
                        showConfirmButton: false
                    }).then(function(value) {
                        if (value) {
                            window.location.href = data.route;
                        }
                    });
                }
            }else if(data.status == 500){
                $(".modal").hide();
                swal({
                    title: 'Logged In Faild',
                    text: 'Email Or Password Does Not Match Try Again!',
                    type: "error",
                    showCancelButton: true,
                    dangerMode: true,
                    cancelButtonClass: '#DD6B55',
                    confirmButtonColor: '#dc3545',
                    confirmButtonText: 'Cancel!',
                }).then(function(value) {
                    if (value) {
                        window.location.href = "{{ route('home') }}";
                    }
                });
            }
        }
    });
});
</script>
@endsection
