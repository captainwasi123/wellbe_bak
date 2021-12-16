<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
                        <img src="{{URL::to('/public/assets/web/new/')}}/images/wellbe-logo.png" width="150px">
                     </div>
                     <div class="login-heading m-b-40">
                        <h3 class="text-left"> Resert Your Password </h3>
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
                   <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
                      
                        
                           
                         {{--  <div class="block-element m-b-20">
                              <p class="col-black form-label1"> Password  </p>
                              <input type="email" placeholder="Your email" id="email" class="form-control" name="email" required autofocus>
                                 @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                           </div>  --}}
                     
                           <div class="block-element m-b-20">
                              <p class="col-black form-label1"> Password  </p>
                              <input type="password" placeholder="Your Password" id="password" class="form-control" name="password" required autofocus>
                                 @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                           </div>
                          

                           <div class="block-element m-b-20">
                            <p class="col-black form-label1">  Confirm Password  </p>
                            <input type="password" id="confirmation_password"  placeholder="Confirm Password" name="confirmation_password" class="form-control1" required autofocus>
                                  @if ($errors->has('confirmation_password'))
                                      <span class="text-danger">{{ $errors->first('confirmation_password') }}</span>
                                  @endif
                         </div>
                         
                           <div class="block-element">
                              <button type="submit" class="submit-btn1"> Resert Password </button>
                           </div>
                        </form>
                     </div>
                     <div class="already-account m-t-40">
                        <span class="col-black">  <a href="{{URL::to('/register')}}"> Sign up </a> </span><br><br>
                        <span class="col-black">  <a href="{{URL::to('/login')}}"> Login </a> </span>
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
      <script type="text/javascript">
         $(".input-num").intlTelInput({
         utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
         });
      </script>
   </body>
</html>
