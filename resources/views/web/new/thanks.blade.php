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
                        <h3> Thanks for signing up! </h3>
                     </div>
                     <br><br>
                     <div class="alert alert-danger">
                        We’ve sent you an account verification link. Please click the link in your email to verify your account. Once verified, one of our onboarding specialists will be in touch as soon as possible to enable your login so that you can access Wellbe.
                     </div>
                     <br><br><br><br>
                     <div class="forgot-pass1">
                        <a href="{{route('home')}}" class="submit-btn1"> Return to Home </a>
                     </div>
                     <div class="legal-links1">
                        <a href="{{URL::to('/PractitionerAgree')}}"> Terms & Conditions </a>
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