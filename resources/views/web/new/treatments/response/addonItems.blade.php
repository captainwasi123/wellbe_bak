<form method="post" action="{{route('treatments.services.addToCart')}}">
   @csrf
   <input type="hidden" name="sid" value="{{base64_encode($service->id)}}">
   <div class="block-element card-form-head m-b-10 ">
      <h3 class="text-left"> Personalise Your Treatment  </h3>
   </div>
   <div class="cart-extras-head">
      <h5 > EXTRAS </h5>
   </div>
   @foreach($addons as $val)
      <div class="cart-single-item">
         <div>
            <h4 class="col-blue m-0"> Add {{$val->name}} </h4>
            <p class="m-0"> +${{empty($val->lowestPrice) ? number_format($val->addonsDetail[0]->price, 2) : number_format($val->lowestPrice->price, 2)}}</p>
         </div>
         <div>
            <input type="checkbox" name="addon_item[]" value="{{$val->id}}" class="addon_checkbox" id="addon{{$val->id}}">
            <label class="cart-btn1" for="addon{{$val->id}}" data-price="{{empty($val->lowestPrice) ? $val->addonsDetail[0]->price : $val->lowestPrice->price}}" data-duration="{{$val->addonsDetail[0]->duration}}"> Add </label>
         </div>
      </div>
   @endforeach
   @if(count($addons) == 0)
      <div style="height:200px">
         <p>No Addons Available.</p>
      </div>
   @endif
   <div class="cart-single-item m-t-30">
      <div>
         <input type="hidden" id="totalAmountTray" value="{{empty($service->lowestPrice) || $service->lowestPrice->price == 0 ? $service->price : $service->lowestPrice->price}}">
         <input type="hidden" id="totalDurationTray" value="{{$service->duration}}">
         <h4 class="col-blue m-0" id="totalAmountTrayDisplay"> From: {{empty($service->lowestPrice) ? '$'.number_format($service->price) : '$'.number_format($service->lowestPrice->price)}} </h4>
         <p class="m-0" id="totalDurationTrayDisplay"> {{$service->duration}} mins </p>
      </div>
      <div>
         <button type="submit" class="custom-anchor1"> Add to Booking </button>
      </div>
   </div>
</form>