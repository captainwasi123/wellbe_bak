<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Login | Wellbe  </title>
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
                     <img src="{{URL::to('/public/assets/web/new/')}}/images/login-image.png">
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 no-pad">
                  <div class="login-wrapper">
                     <div class="block-element1 text-center m-b-40">
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/wellbe-logo.png" width="150px">
                     </div>
                     <div class="login-heading m-b-40">
                        <h3> Email Check </h3>
                     </div>
                     @if(session()->has('error'))
                        <div class="alert alert-danger">
                           {{ session()->get('error') }}
                        </div>
                     @endif
                     <div class="login-form">
                        <form method="post">
                           @csrf
                           <div class="block-element m-b-20">
                              <p class="col-black form-label1"> Email Address  </p>
                              <input type="email" placeholder="Email Address" name="email" class="form-control1" required>
                           </div>
                           
                           <div class="block-element">
                              <button type="submit" class="submit-btn1"> Submit </button>
                           </div>
                        </form>
                     </div>
                     <div class="forgot-pass1">
                       
                     </div>
                     <div class="already-account">
                        <span class="col-black">   <a href="{{URL::to('/login')}}"> Sign In </a> </span>
                     </div>
                     <div class="legal-links1">
                        <a href=""> Terms & Conditions </a>
                        <a href=""> Privacy Policy </a>
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
