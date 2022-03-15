<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Thanks for activating your account! | Wellbe  </title>
      <link rel="icon" href="{{URL::to('/public/assets/web/new/images/favicon.png')}}" type="image/png" sizes="16x16">
      <!-- Animate With CSS -->
      @include('web.new.includes.style')
   </head>
   <body>
      <!-- Login Page Content Section Starts Here -->
      <section class="bg-pink pad-top-60 pad-bot-60 login-section">
         <div class="container" style="max-width: 1050px;">
            <div class="row">
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 no-pad">
                  <div class="login-image">
                     <img src="{{URL::to('/public/assets/web/new/')}}/images/login-image2.jpg">
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 no-pad">
                  <div class="login-wrapper">
                     <div class="block-element1 text-center m-b-40">
                        <a href="{{route('home')}}"> 
                           <img src="{{URL::to('/public/assets/web/new/')}}/images/wellbe-logo.png" width="150px">
                        </a>
                     </div>
                     <div class="login-heading m-b-40">
                        <h3> Thanks for activating your account! </h3>
                     </div>
                     <br><br>
                     <div class="alert alert-danger">
                        Your practitioner account is currently being verified and one of our onboarding specialists will be in touch with you shortly. You will be able to login to Wellbe once our onboarding team have verified your details.
                     </div>
                     <br><br><br><br>
                     <div class="forgot-pass1">
                        <a href="{{route('home')}}" class="submit-btn1"> Return to Home </a>
                     </div>
                     <div class="legal-links1">
                        <a href="{{URL::to('/TermCondition')}}"> Terms & Conditions </a>
                        <a href="{{URL::to('/PrivacyPolicy')}}"> Privacy Policy </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Login Page Content Section Ends Here -->
      <!-- Bootstrap Javascript -->
      @include('web.new.includes.script')
   </body>
</html>