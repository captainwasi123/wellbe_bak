<div class="bookings-trigger">
   <ul class="nav nav-tabs no-border" role="tablist">
      <li class="nav-item">
         <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"> Practitioners </a>
      </li>
   </ul>
</div>
@php $duration = 0; $bslot = 30; @endphp
@if(Session::get('cart') !== null)
   @foreach(Session::get('cart.services') as $val)
      @php $duration = $duration+($val['duration']*$val['quantity']); @endphp
   @endforeach
   @if(count(Session::get('cart')) == 0)
      @php $duration = 30; @endphp
   @endif
@else
   @php $duration = 30; @endphp
@endif
<div class="tab-content">
   <div class="tab-pane active" id="tabs-1" role="tabpanel">
      <div class="all-bookings">
         @php $ucount = 0; @endphp
         @foreach($users as $val)
            @php $uvalid = 1; @endphp
            @foreach(Session::get('cart.services') as $sval)
               @php $usvalid = 0; @endphp
               @foreach($val->services as $usval)
                  @if(base64_decode($sval['id']) == $usval->service_id)
                     @php $usvalid = 1; @endphp
                  @endif
               @endforeach
               @if($usvalid == 0)
                  @php $uvalid = 0; @endphp
               @endif
            @endforeach
            @if($uvalid == 1)
               <div class="booking-practices">
                  <div class="booking-details-person">
                     <img src="{{URL::to('/')}}/{{$val->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">
                     <h5> {{$val->first_name.' '.$val->last_name}} </h5>
                     <p> 
                        <a href="javascript:void(0)" class="viewUserProfile" data-id="{{base64_encode($val->id)}}"> View Profile </a> 

                        <b class="col-grey font-thin"> 
                           <i class="fa fa-star col-yellow"> </i> 
                           {{empty($val->avgRating) ? '0.0' : number_format($val->avgRating[0]->aggregate, 1)}} 
                        </b> 
                     </p>
                  </div>
                  <div class="booking-persons-time time-slider">
                     @foreach($val->availability as $avail)
                        @if(ucfirst($avail->week_day) == $day)
                           @foreach($avail->slots as $slot)
                              @php
                                 $x = 0; 
                                 $buffer = empty($val->user_store) ? 30 : $val->user_store->buffer_between_appointments; 
                                 if($date == date('Y-m-d')){
                                    $curr = date('H:i:s');
                                    if($curr > $slot->start_booking){
                                       $curr = date('H:i:s',strtotime('+1 hour',strtotime($curr)));
                                       $curr = date('H',strtotime($curr));
                                       $curr = $curr.':00:00';
                                       $start = $curr;
                                    }else{
                                       $start = $slot->start_booking;
                                    }
                                 }else{
                                    $start = $slot->start_booking;
                                 } 
                                 $end = $slot->end_booking; 
                                 $end = date('H:i:s',strtotime($end));
                              @endphp
                              @php $bookingDuration = $duration+$buffer; @endphp
                              @while($start <= $end)
                                 @php $v = 1; @endphp
                                 @foreach($val->p_upcoming as $vup)
                                    @if($vup->start_at == $date)
                                       @foreach($vup->details as $vupd)
                                          @if($start >= $vupd->start_time && $start <= $vupd->end_time)
                                             @php $v = 0; @endphp
                                          @endif
                                          @php 
                                             $endDuration = date('H:i:s',strtotime('+'.$bookingDuration.' minutes',strtotime($start))); 
                                             $endDuration2 = date('H:i:s',strtotime('+'.$buffer.' minutes',strtotime($vupd->end_time))); 
                                          @endphp

                                          @if($endDuration >= $vupd->start_time && $endDuration <= $endDuration2)
                                             @php $v = 0; @endphp
                                          @endif

                                       @endforeach
                                    @endif
                                 @endforeach
                                 @php 
                                    $endDuration = date('H:i:s',strtotime('+'.$bookingDuration.' minutes',strtotime($start)));
                                 @endphp
                                 @if($endDuration > $end)
                                    @php $v = 0; @endphp
                                 @endif
                                 @if($v == 1)
                                    <div>
                                       <input type="radio" id="myCheck{{$slot->id.$x}}" class="timeslot" name="timeslot" data-time="{{date('h:i A', strtotime($start))}}" data-prac="{{base64_encode($val->id)}}" tabindex="-1"> 
                                       <label class="book-time-btn"  for="myCheck{{$slot->id.$x}}" >{{date('h:i A', strtotime($start))}} {{@$endDuration2}}</label>
                                    </div>
                                 @endif
                                 @php $start = date('H:i:s',strtotime('+'.$bslot.' minutes',strtotime($start))); $x++; @endphp
                              @endwhile 
                           @endforeach
                        @endif
                     @endforeach
                  </div>
               </div>
               @php $ucount++; @endphp
            @endif
         @endforeach
         @if(count($users) == 0 || $ucount == 0)
            <div class="empty-bookings">
               <img src="{{URL::to('/public/assets/web/new')}}/images/empty-booking.jpg">
               <h4> Sorry, we dont have anybody available to fulfill this order. Try another date. </h4>
               <p> Tip: If your order contains seperate types of treatments, you may need to split these out as many of our therapist are specialists. </p>
            </div>
         @endif
      </div>
   </div>
   <!-- <div class="tab-pane" id="tabs-2" role="tabpanel">
      <div class="empty-bookings">
         <img src="{{URL::to('/public/assets/web/new')}}/images/empty-booking.jpg">
         <h4> Sorry, we dont have anybody available to fulfill this order. Try another date. </h4>
         <p> Tip: If your order contains seperate types of treatments, you may need to split these out as many of our therapist are specialists. </p>
      </div>
   </div>
   <div class="tab-pane" id="tabs-3" role="tabpanel">
      <div class="empty-bookings">
         <img src="{{URL::to('/public/assets/web/new')}}/images/empty-booking.jpg">
         <h4> Sorry, we dont have anybody available to fulfill this order. Try another date. </h4>
         <p> Tip: If your order contains seperate types of treatments, you may need to split these out as many of our therapist are specialists. </p>
      </div>
   </div>
   <div class="tab-pane" id="tabs-4" role="tabpanel">
      <div class="empty-bookings">
         <img src="{{URL::to('/public/assets/web/new')}}/images/empty-booking.jpg">
         <h4> Sorry, we dont have anybody available to fulfill this order. Try another date. </h4>
         <p> Tip: If your order contains seperate types of treatments, you may need to split these out as many of our therapist are specialists. </p>
      </div>
   </div> -->
</div>