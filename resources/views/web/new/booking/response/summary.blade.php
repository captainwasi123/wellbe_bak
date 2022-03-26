@php $totalAmount = 0; @endphp
<div class="book-summary-head">
   <h3 class="text-center"> Summary  </h3>
</div>
<div class="book-summary-item">
   <h6> <img src="{{URL::to('/public/assets/web/new')}}/images/map-icon1.jpg"> {{Session::get('cart.location.place')}} </h6>
</div>
@if(Session::get('cart') !== null)
   @foreach(Session::get('cart.services') as $val)
      @foreach($val as $it)
         <div class="book-summary-item">
            <h5>{{$it['title']}} </h5>
            @php $addonPrice = 0;$addonDuration = 0; @endphp
            @if(count($it['addons']) > 0)
               <p class="addonLabelTreatment">
                  Includes
                  @foreach($it['addons'] as $key => $adval)
                     {{$key == 0 ? '' : ', '}}{{$adval['name']}}
                     @php $addonPrice = $addonPrice+$adval['price']; @endphp
                     @php $addonDuration = $addonDuration+$adval['duration']; @endphp
                  @endforeach
               </p>
            @endif
            <p> <b class="col-green"> 
            </b> {{$it['duration']+$addonDuration}} minutes </p>
         </div>
         @php $totalAmount = $totalAmount+(($it['price']+$addonPrice)*$it['quantity']); @endphp
      @endforeach
   @endforeach
   @if(count(Session::get('cart')) == 0)
      <h4>No Items Found.</h4>
   @endif
@else
   <h4>No Items Found.</h4>
@endif
<div class="booking-details-item m-t-20">
   <h6> <img src="{{URL::to('/public/assets/web/new')}}/images/booking-icon1.jpg"> Date & Time </h6>
   <h5> <span id="bookingDate">{{date('d-m-Y', strtotime($date))}}</span> - <span id="bookingTime">{{$time}}</span> </h5>
</div>
@php 
   $gst = $marketplace_data->gst;
   $gst_amount = ($totalAmount/100)*$gst;
   $famount = $gst_amount+$totalAmount;
@endphp
<div class="book-summary-instructions m-t-50">
   <h6> Total <b> ${{number_format($famount, 2)}} <small>inc GST</small> </b> </h6>
</div>
<div class="block-element">
   <div class="row m-t-20 m-b-10">
      <form method="post" action="{{route('treatments.booking.step2')}}">
         @csrf
         <input type="hidden" name="booking_date" id="booking_date" value="{{date('d-m-Y', strtotime($date))}}">
         <input type="hidden" name="booking_time" id="booking_time" value="{{date('H:i:s', strtotime($time))}}">
         <input type="hidden" name="booking_prac" id="booking_prac" value="{{$id}}">
         @if(Auth::check())
            <div class="col-md-12" style="padding-left: 30px;padding-right: 30px;">
               <button {{(empty(Session::get('cart')) || count(Session::get('cart.services')) == 0) ? 'type=button'.' id=checkout_btn' : ''}} {{$famount < 25 ? 'type=button'.' id=checkout_btn' : ''}} class="submit-btn1 block-element1" style="padding-left: 50px;padding-right: 50px;"> Continue to Checkout </button>
            </div>
         @else
            <div class="col-md-12" style="padding-left: 30px;padding-right: 30px;">
               <a href="javascript:void(0)" class="submit-btn1 block-element1" style="padding-left: 50px;padding-right: 50px;" data-toggle="modal" data-target=".loginAuthModal"> Continue to Checkout </a>
            </div>
         @endif
      </form>
   </div>
</div>
<div class="order-information">
   <p> Your order must be a minimum of $25 for our mobile treatments </p>
</div>