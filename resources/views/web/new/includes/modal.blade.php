<!-- Coming Soon Popup -->
<div class="modal popup-1 fade coming-soon-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 900px;">
      <div class="modal-content">
         <div class="custom-modal-data">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="row">
               <div class="col-md-6 col-lg-6 col-sm-6 col-12 order-lg-2 order-md-2 order-sm-2">
                  <div class="launch-image">
                     <img src="{{URL::to('/public/assets/web/new/')}}/images/banner-girl1.png">   
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-12 order-lg-1 order-md-1 order-sm-1">
                  <div class="launch-text">
                     <h4> Launching Soon </h4>
                     <p> Wellbe - NZ’s newest Beauty and Wellbeing marketplace. Your favourite treatments directly to your door. </p>
                     <p> Our service is not available, yet. Subscribe now to be one of the first people to try it!   </p>
                     <form>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <!-- Coming Soon Popup -->

<div class="modal popup-1 treatmentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 900px;">
      <div class="modal-content">
         <div class="rounded-1 bg-pink text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="booked-content">
               <img src="{{URL::to('/public/assets/web/new/')}}/images/wellbe-logo.png" class="m-b-40">
               <h3 class="m-b-30"> Enter your <br/> address...  </h3>
               <p class="m-b-30 col-black" style="max-width: 350px;margin-left: auto;margin-right: auto;"> Let us know where you would like your treatment so we can find nearby specialists </p>
               <div class="row">
                  <div class="col-12">
                     <div class="block-element text-center">
                        <form class="discover-form text-left" method="get" id="mtreatmentForm" action="{{route('treatments.search')}}">
                           <input type="hidden" name="lat" id="mlat">
                           <input type="hidden" name="long" id="mlong">
                           <i class="fa fa-search"> </i>
                           <input type="text" placeholder="Enter your address" id="mpac-inputt" name="value" required>
                           <button class="discover-btn2"> Discover </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<div class="modal popup-1 fade newsletterModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 900px;">
      <div class="modal-content">
         <div class="rounded-1 bg-pink text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="booked-content">
               <img src="{{URL::to('/public/assets/web/new/')}}/images/wellbe-logo.png" class="m-b-40">
               <h3 class="m-b-30"> Subscribe to Our Newsletter  </h3>
               <p class="m-b-30 col-black" style="max-width: 350px;margin-left: auto;margin-right: auto;">
                  Subscribe our newsletter to receive the latest news and exclusive offers every week.
               </p>
               <div class="row">
                  <div class="col-12">
                     <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                     </div>
                     <div class="block-element text-center">
                        <form action="https://wellbe.us7.list-manage.com/subscribe/post?u=c4b7f7c6e0da00c6eed209165&amp;id=6e21148b8c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate discover-form" target="_blank" novalidate>
                           <i class="fa fa-search"> </i>
                           <input type="email" placeholder="Enter your email address" value="" style="width: 95%" name="EMAIL" id="mce-EMAIL" required>
                           <div style="position: absolute; left: -5000px;" aria-hidden="true">
                              <input type="text" name="b_c4b7f7c6e0da00c6eed209165_6e21148b8c" tabindex="-1" value="">
                           </div>
                           <div class="clear">
                              <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="discover-btn2">Subscribe</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal popup-1 fade safe-treatment-popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog modal-lg modal-dialog2" role="document" style="max-width: 700px;">
      <div class="modal-content">
         <div class="safe-treatment">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="row">
               <div class="col-md-6 col-lg-6 col-sm-6 col-12 order-lg-2 order-md-2 order-sm-2">
                  <div style="padding-right: 10px;">
                     <img src="{{URL::to('/public/assets/web/')}}/images/image.png" width="100%">   
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-12 order-lg-1 order-md-1 order-sm-1">
                  <div class="safe-treatment-text">
                     <h4> Safer Treatments at home </h4>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                  <div class="safe-treatment-text1" style="">
                     <p>We are taking every precaution in line with Government guidance to ensure treatments can be carried out safely and the Wellbe community is protected.</p>
                  </div>
                  <div class="safe-treatment-text2">
                     <hr>
                     <p>Vaccine Passes-All lients must provide evidence of a valid Covid 19 waccine passport before the the treatment begins. If a pass cannot be provided, the booking will be concelled with no refund.</p>
                     <p>PPE - Therapists are required to wear a face covering for the duration of bookings in line wth government guidance</p>
                     <p>Hygiene - Therapists will sanitise their hands before and after the treatment. </p>
                     <p>Ventilation - Clients should provide a station for your therapist to set up with good ventilation, ideally near a window. </p>
                  </div>
                  <div class="safe-treatment-text3" style="">
                     <a class="custom-btn1" style="background: #5D4E6D; width: 100%;"> Accept & Continue </a>
                     <p>By continuing your accept our updated <a href="{{URL::to('/TermCondition')}}"><b>Terms & Conditions</b></a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
