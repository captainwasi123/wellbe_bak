<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="{{URL::to('/public/assets/web/new/images/favicon.png')}}" type="image/png" sizes="16x16">
      <title> Sign Up | Wellbe </title>
      @include('web.new.includes.style')
   </head>
   <body>
      <!-- Login Page Content Section Starts Here -->
      <section class="bg-pink pad-top-60 pad-bot-60 login-section">
         <div class="container" style="max-width: 1050px;">
            <div class="row">
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 no-pad">
                  <div class="login-image">
                     <img src="{{URL::to('/public/assets/web/new/')}}/images/signup-image.png">
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
                        <h3 class="text-left"> Create a Practitioner Account </h3>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                     </div>
                     <div class="login-form">
                        <form method="post" action="{{URL::to('/register')}}">
                           @csrf

                          <input type="hidden" name="userType" value="1">
                          <input type="hidden" class="form-control" name="status" value="0" required>
                           <div class="row">
                              <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                                 <div class="block-element m-b-20">
                                    <p class="col-black form-label1"> First Name  </p>
                                    <input type="text" placeholder="First Name" name="first_name" required class="form-control1">
                                 </div>
                              </div>
                              <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                                 <div class="block-element m-b-20">
                                    <p class="col-black form-label1"> Last Name  </p>
                                    <input type="text" placeholder="Last Name" name="last_name" required class="form-control1">
                                 </div>
                              </div>
                           </div>
                           <div class="block-element m-b-20">
                              <p class="col-black form-label1"> Email Address  </p>
                              <input type="email" placeholder="Email Address" name="email" required class="form-control1">
                           </div>
                           <div class="block-element m-b-20">
                              <p class="col-black form-label1"> Phone Number  </p>
                              <div class="input-group" style="display: block;">
                                 <input type="number" class="form-control1 input-num" name="phone" required>
                              </div>
                           </div>
                           <div class="block-element m-b-20">
                              <p class="col-black form-label1"> Password  </p>
                              <input type="password" placeholder="Your Password" name="password" class="form-control1" required>
                           </div>
                           <div class="block-element m-b-20">
                            <p class="col-black form-label1">  Confirm Password  </p>
                            <input type="password" placeholder="Confirm Password" name="confirmation_password" class="form-control1" required>
                         </div>
                           <div class="block-element m-b-20">
                              <div class="checkbox-field1"> <input type="checkbox" name="terms_and_condition" required> By signing up I agree  to Wellbe Terms & Conditions and Privacy Policy </div>
                           </div>
                           <div class="block-element">
                              <button type="submit" class="submit-btn1"> Sign Up </button>
                           </div>
                        </form>
                     </div>
                     <div class="already-account m-t-40">
                        <span class="col-black"> Want to book services instead? <a href="{{URL::to('/register')}}"> Sign up </a> </span><br><br>
                        <span class="col-black"> Already an user? <a href="{{URL::to('/login')}}"> Login </a> </span>
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
      <script type="text/javascript">
         $(".input-num").intlTelInput({
         utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
         });
      </script>
   </body>
</html>
