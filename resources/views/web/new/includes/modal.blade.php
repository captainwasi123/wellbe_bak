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
                        <form class="discover-form text-left" method="get" action="{{route('treatments.search')}}">
                           <input type="hidden" name="lat" id="lat">
                           <input type="hidden" name="long" id="long">
                           <i class="fa fa-search"> </i>
                           <input type="text" placeholder="Enter your address" id="pac-inputt" name="value" required>
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
                     <div class="block-element text-center">
                        <form class="discover-form text-left">
                           <i class="fa fa-search"> </i>
                           <input type="text" placeholder="Enter your email address" name="">
                           <button class="discover-btn2"> Subscribe </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>