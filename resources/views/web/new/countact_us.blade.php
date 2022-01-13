@extends('web.new.includes.master')
@section('title', 'Contact Us')
@section('content')
<!-- Banner Section Starts Here -->
   <section class="banner-sec  bg-5  ">
      <div class="container">
         <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 order-lg-5 order-md-5">
               <div class="banner-text">
                <center><h3> Want to speak to someone?</h3></center> 
                  <center>
                    <p>Contact our friendly staff on <a href="mailto:info@wellbe.co.nz">info@wellbe.co.nz</a>, or leave your message below and we’ll get back to you as soon as possible.</p>
                    <p>Please note that due to high volumes of enquiries, you may experience a longer than usual wait time. We thank you for your patience and understanding.</p>
                    
                    </center>
               </div>
            </div>
         
         </div>
      </div>
   </section>
   <!-- Banner Section Ends Here -->
   <!-- How it Works Section Starts here -->

   <!-- How it Works Section Ends here -->
   <!-- Professionals You can Trust Section Starts Here -->

   <!-- Professionals You can Trust Section Ends Here -->
   <!-- The Best Services Section Starts here -->
   <section class="">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 no-pad">
                 
               </div>
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 no-pad">
                       <div class="login-wrapper">
                  
                     
                     @if(session()->has('success'))
                        <div class="alert alert-danger">
                           {{ session()->get('success') }}
                        </div>
                     @endif
   
                     <div class="login-form">
                       <form method="post" action="">
                           @csrf
                           <div class="block-element m-b-40  col-md-6">
                              <p class="col-black form-label1"> Name  </p>
                              <input type="text" placeholder="Name" name="name" class="form-control1" required autocomplete="off">
                           </div>
                           <div class="block-element m-b-40 col-md-6">
                              <p class="col-black form-label1"> Email Address  </p>
                              <input type="email" placeholder="example@gmail.com" name="email" class="form-control1" required autocomplete="off">
                           </div>
                        
              
                           <div class="block-element m-b-20 col-md-12">
                              <p class="col-black form-label1"> Message  </p>
                              <textarea  type="text" name="messages" class="form-control1" autocomplete="off" required  > </textarea>
                           </div>
                           <div class="block-element">
                              <button type="submit" class="submit-btn1"> Send </button>
                           </div>
                        </form>
                     </div>
                   
                   
                  </div>
            </div>
               </div>
                  <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 no-pad">
                 
               </div>
          
          
         </div>
         
      </div>
   </section>


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