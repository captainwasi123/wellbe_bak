<div class="bookings-trigger">
   <ul class="nav nav-tabs no-border" role="tablist">
      <li class="nav-item">
         <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"> Practitioners </a>
      </li>
     <!--  <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"> Morning </a>
      </li>
      <li class="nav-item">
         <a class="nav-link " data-toggle="tab" href="#tabs-3" role="tab"> Afternoon </a>
      </li>
      <li class="nav-item">
         <a class="nav-link " data-toggle="tab" href="#tabs-4" role="tab"> Evening </a>
      </li> -->
   </ul>
</div>
<div class="tab-content">
   <div class="tab-pane active" id="tabs-1" role="tabpanel">
      <div class="all-bookings">
         @foreach($users as $val)
            <div class="booking-practices">
               <div class="booking-details-person">
                  <img src="{{URL::to('/')}}/{{$val->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">
                  <h5> {{$val->first_name.' '.$val->last_name}} </h5>
                  <p> 
                     <a href="javascript:void(0)" class="viewUserProfile" data-id="{{base64_encode($val->id)}}"> View Profile </a> 

                     <b class="col-grey font-thin"> 
                        <i class="fa fa-star col-yellow"> </i> 
                        {{empty($val->avgRating) ? '0.0' : $val->avgRating[0]->aggregate}} 
                     </b> 
                  </p>
               </div>
               <div class="booking-persons-time time-slider">
                  @foreach($val->availability as $avail)
                     @if(ucfirst($avail->week_day) == $day)
                        @foreach($avail->slots as $slot)
                           @php
                              $x = 0;
                              $duration = 30; 
                              $buffer = 120; 
                              $start = $slot->start_booking; 
                              $end = $slot->end_booking; 
                              $end = date('H:i:s',strtotime('-'.$buffer.' minutes',strtotime($end)));
                           @endphp
                           @while($start <= $end)
                           <div>
                              <input type="radio" id="myCheck{{$slot->id.$x}}" class="timeslot" name="timeslot" data-time="{{date('h:i A', strtotime($start))}}" data-prac="{{base64_encode($val->id)}}" tabindex="-1"> 
                              <label class="book-time-btn"  for="myCheck{{$slot->id.$x}}" >{{date('h:i A', strtotime($start))}}</label>
                           </div>
                              @php $start = date('H:i:s',strtotime('+'.$duration.' minutes',strtotime($start))); $x++; @endphp
                           @endwhile 
                        @endforeach
                     @endif
                  @endforeach
               </div>
            </div>
         @endforeach
         @if(count($users) == 0)
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