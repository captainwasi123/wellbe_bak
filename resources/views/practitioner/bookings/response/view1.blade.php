<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="booking-modal-head">
         <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <div class="booking-modal-text">
                  <h3> Booking Information: #{{$data->id}} </h3>
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <div class="booking-modal-text text-right">
                  <h3> Total Amount  <b class="col-blue"> NZ ${{number_format($data->total_amount, 2)}} </b> </h3>
               </div>
            </div>
         </div>
      </div>
      <div class="booking-modal-content">
         <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <div class="booking-modal-set1">
                  <h6 class="col-grey"> Customer  </h6>
                  <h5 class="col-blue"> {{empty($data->booker) ? 'Deleted User' : $data->booker->first_name.' '.$data->booker->last_name}} </h5>
                  <h6 class="col-grey"> Customer Address  </h6>
                  <h5 class="col-black">
                     {{empty($data->address) ? '' : $data->address}}
                  </h5>
                  @if($data->status == '3')
                     <h6 class="col-grey"> Guest Rating  </h6>
                     <h5 class="col-blue">
                        @if(empty($data->reviews))
                          N/A
                        @else
                          @php $rat = $data->reviews->rating; @endphp
                          <span>
                            @for($i=1; $i<=5; $i++)
                              <i class="fa fa-star {{$i > $rat ? 'star-off' : 'star-onn'}}"> </i>
                            @endfor
                          </span>
                        @endif
                     </h5>

                     <h6 class="col-grey"> Guest Review  </h6>
                     <h5 class="col-blue">
                        @if(empty($data->reviews))
                          N/A
                        @else
                          {{$data->reviews->review}}
                        @endif
                     </h5>
                  @endif
               </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <div class="booking-modal-set2">
                  <table>
                     <tbody>
                        <tr>
                           <td> Subtotal:  </td>
                           <td> NZ ${{number_format($data->sub_total, 2)}} </td>
                        </tr>
                        <tr>
                           <td> GST - {{$gst}}% </td>
                           <td> NZ ${{number_format($data->gst, 2)}} </td>
                        </tr>
                     </tbody>
                     <tfoot>
                        <tr>
                           <td> <b> Total Amount </b> </td>
                           <td> <b class="col-blue"> NZ ${{number_format($data->total_amount, 2)}} </b> </td>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-6">
      <div class="booking-modal-text">
         <h3> Details   </h3>
         <p>Booking Status:
            <strong>
               @switch($data->status)
                  @case('1')
                     Upcoming
                     @break

                  @case('2')
                     In-Progress
                     @break

                  @case('3')
                     Completed
                     @break

                  @case('4')
                     Cancelled
                     @break

               @endswitch
            </strong>
         </p>
      </div>
   </div>
   <div class="col-md-6">
      <div class="booking-modal-text">
         <h3><br></h3>
         <p>Booking Date:
            <strong>
               {{date('F j, Y, g:i a', strtotime($data->start_at.' '.$data->details[0]->start_time))}}
            </strong>
         </p>
         @if($data->status == '4')
           <p>Cancellation Date:
            <strong>
               {{date('F j, Y, g:i a', strtotime(@$data->cancel->created_at))}}
            </strong>
         </p>
            <p>Cancellation Reason:
               <text>
               {{@$data->cancel->reason}}
               </text>
         </p>
         @endif
      </div>
   </div>
   <div class="col-md-12">
      <div class="booking-modal-text">
         <p>Booking Instructions:<br>
            <strong>
               {{empty($data->instructions) ? 'N/A' : $data->instructions}}
            </strong>
         </p>
      </div>
   </div>
   @foreach($data->details as $val)
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
         <div class="booking-detail-table" style="overflow: auto;">
            <table>
               <tbody>
                  <tr>
                     <td> 
                        <label>Start Time</label>  {{date('h:i A', strtotime($val->start_time))}} 
                     </td>
                     <td> 
                        <label>End Time</label>  {{date('h:i A', strtotime($val->end_time))}} 
                     </td>
                  </tr>
                  @php 
                     $timeFirst  = strtotime($val->start_time);
                     $timeSecond = strtotime($val->end_time);
                     $differenceInSeconds = $timeSecond - $timeFirst;
                     $duration = $differenceInSeconds/60;
                  @endphp
                  <tr>
                     <td class="wd-40" colspan="2"> 
                        <label>Product Name</label>{{$val->service->name}} 
                        <small>{{$duration}} Mins</small> 
                     </td>
                     <td> <label>Quantity</label> {{$val->qty}}x </td>
                     <td> <label>Price</label> NZ ${{number_format($val->price, 2)}} </td>
                  </tr>
                  <tr>
                     <td class="wd-40" colspan="4"> 
                        <label>Addons</label>
                        @foreach($val->addons as $ad)
                           <div class="addonLabel">
                              <span>{{empty($ad->addon->name) ? 'Deleted Addon' : $ad->addon->name}}</span><br>
                              <span></span>
                              <span>${{$ad->price}}</span>
                           </div> 
                        @endforeach
                        @if(count($val->addons) == 0)
                           N/A
                        @endif
                     </td>
                  </tr>
                 
               </tbody>
            </table>
         </div>
      </div>
   @endforeach
</div>
<div class="block-element text-right booking-btn-custom">
@if($data->status == '1' || $data->status == '2')
   <a href="javascript:void(0)" class="normal-btn bg-blue col-white rounded orderCancel" data-ref="{{base64_encode(base64_encode($data->id))}}"> Cancel Booking </a>
@endif
@if($data->status == '1')
   <a href="javascript:void(0)" class="normal-btn bg-green col-white rounded orderStart" data-ref="{{base64_encode(base64_encode($data->id))}}"> Start Booking </a>
@endif
@if($data->status == '2')
   <a href="javascript:void(0)" class="normal-btn bg-green col-white rounded orderComplete" data-ref="{{base64_encode(base64_encode($data->id))}}"> Booking Completed </a>
@endif
</div>
