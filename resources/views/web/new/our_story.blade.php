@extends('web.new.includes.master')
@section('title', 'Our Story')
@section('content')
<!-- Banner Section Starts Here -->
   <section class="banner-sec  bg-5">
      <div class="container">
         <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 order-lg-5 order-md-5">
               <div class="banner-text">
                <center><h3> Our purpose </h3></center>
                  <center><h4 class="col-blue"> We’re on a mission to make wellness and self-care accessible for everybody. </h4></center>

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
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <div class="sec-head4 sec-head5 text-left">
                  <div class="ser-det-text no-bg mob-bg-pink">
                     <div>
                     <div class="banner-text">
                        <h3> Shaking up the industry </h3>
                        <div></div>
                        </div>
                     </div>
                  </div>

               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <div class="row all-features">
                  <div class="col-md-8 col-lg-8 col-sm-8 col-12">
                     <div class="feature-box mob-text-center">
                      <p class="m-b-20"> After years of living abroad in the United Kingdom and returning home to Aotearoa, Jarrod and Paige were shocked at the lack of options available for convenient and quality self-care and wellness services.</p>
                      <p class="m-b-20"> After doing some research and speaking to those working within the industry, they were also stunned to find that many practitioners would take home as little as 25% for treatments they completed. </p>
                      <p class="m-b-20"> It was clear that the industry needed a shake up. </p>
                     <p class="m-b-20">Wellbe was born with the intention to provide a greater level of service and flexibility to Kiwis and to empower the 1000’s of practitioners around the country to be able to earn on their own terms. </p>
                        <p class="m-b-20">Since launching, the platform has benefited both practitioners and customers alike. On Wellbe customers are able to book trusted, pre-vetted practitioners straight to their door within an hour, and 70% of the booking amount goes straight into the practitioners pocket.</P>
                        <p class="m-b-20">Wellbe is proud to be 100% Kiwi owned and operated, we’re continuing to add new services and expand to more cities to meet our mission of making wellness and self-care accessible for everybody.</p>

                     </div>
                  </div>

               </div>
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
