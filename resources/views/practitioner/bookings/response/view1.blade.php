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
               {{empty($data->booker->user_address) ? '' : $data->booker->user_address->postcode.' - '}}
               {{empty($data->booker->user_address) ? '' : $data->booker->user_address->street.', '}}
               {{empty($data->booker->user_address) ? '' : $data->booker->user_address->city.', '}}
               {{empty($data->booker->user_address) ? '' : $data->booker->user_address->state.', '}}
               {{empty($data->booker->user_address->country) ? '' : $data->booker->user_address->country->country}}
            </h5>
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
<div class="row">
   <div class="col-md-6">
      <div class="booking-modal-text">
         <h3> Details </h3>
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
               {{date('d-M-Y')}}
            </strong>
         </p>
      </div>
   </div>
   @foreach($data->details as $val)    
      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
         <div class="booking-detail-table">
            <table>
               <tbody>
                  <tr>
                     <td class="wd-40"> Product Name </td>
                     <td class="wd-60"> {{$val->service->name}}<br>{{$val->service->duration}} Mins </td>
                  </tr>
                  <tr>
                     <td class="wd-40"> Price: </td>
                     <td class="wd-60"> NZ ${{number_format($val->price, 2)}} </td>
                  </tr>
                  <tr>
                     <td class="wd-40"> Start Time: </td>
                     <td class="wd-60"> {{date('h:i A', strtotime($val->start_time))}} </td>
                  </tr>
                  <tr>
                     <td class="wd-40"> End Time: </td>
                     <td class="wd-60"> {{date('h:i A', strtotime($val->end_time))}} </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   @endforeach
</div>
<!-- <div class="block-element text-right">
   <a href="" class="normal-btn bg-blue col-white rounded"> Cancel Booking </a>
</div> -->