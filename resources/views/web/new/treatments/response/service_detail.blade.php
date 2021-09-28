<div class="block-element card-form-head m-b-10 ">
   <h3 class="text-left"> {{$data->name}} </h3>
   <p> From {{empty($data->lowestPrice) ? '$'.number_format($data->price, 2) : '$'.number_format($data->lowestPrice->price, 2)}}  - Duration {{$data->duration}} Minutes </p>
</div>
<div class="block-element">
   <div class="panel-group wrap faq-panel" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel">
         <div class="panel-heading active" role="tab" id="headingTwo">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
               Description
               </a>
            </h4>
         </div>
         <div id="collapseTwo" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
               {{$data->description}}
            </div>
         </div>
      </div>
      <!-- end of panel -->
      <div class="panel">
         <div class="panel-heading active" role="tab" id="headingThree">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
               Preparation
               </a>
            </h4>
         </div>
         <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
               {{$data->long_description}}
            </div>
         </div>
      </div>
      <!-- end of panel -->
   </div>
   <div class="block-element m-t-30 custom-border1 pad-top-20 m-b-20">
      <ul class="list-style1">
         <li> <i class="fa fa-check"> </i> Cancel at no cost up to 24 hours before your booking </li>
         <li> <i class="fa fa-check"> </i> All professionals insured and background checked </li>
         <li> <i class="fa fa-check"> </i> Mobile treatments straight to your door </li>
      </ul>
   </div>
   <div class="row m-t-30 m-b-10">
      <div class="col-md-12" style="padding-left: 30px;padding-right: 30px;">
         <form method="post" action="{{route('treatments.services.addToCart')}}">
            @csrf
            <input type="hidden" name="sid" value="{{base64_encode($data->id)}}">
            <button class="submit-btn1 block-element1"> Add to Cart </button>
         </form>
      </div>
   </div>
</div>