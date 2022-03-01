
@extends('includes.master')
@section('title', 'Cancelled Bookings')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper">
    <div class="box-type4">
    <div class="page-title">
       <h3 class="col-white"> Cancelled Bookings </h3>
         <a href="javascript:void(0)" class="btn btn-default pull-right" data-href="{{route('admin.cancelled.export')}}" id="exportCancelledBooking" style="margin-top: -46px;">Export</a>
    </div>
    <div class="box-type1">
       <div class="table-overlay table-type1">
          <table>
             <thead>
                <tr>
                   <th> Date / Time </th>
                   <th> Booking ID </th>
                   <th> Practitioner </th>
                   <th> Booker </th>
                   <th> Refund Due </th>
                   <th> Comissioned Payout Due </th>
                   <th> Actions </th>
                </tr>
             </thead>
             <tbody>
               @foreach($data as $val)
                  @php
                     $pract_percentage = $val->cancel->pract_per;
                     $cust_percentage = $val->cancel->cust_per;
                     $pract_dues = ($val->total_amount/100)*$pract_percentage;
                     $cust_dues = ($val->total_amount/100)*$cust_percentage;
                  @endphp
                 <tr>
                    <td> {{date('l, d M Y - h:i A', strtotime($val->start_at.' '.$val->details[0]->start_time))}}</td>
                    <td> #{{$val->id}} </td>
                    <td class="col-blue"> {{empty($val->practitioner) ? 'Deleted User' : $val->practitioner->first_name.' '.$val->practitioner->last_name}}</td>
                    <td class="col-blue"> {{empty($val->booker) ? 'Deleted User' : $val->booker->first_name.' '.$val->booker->last_name}}</td>
                    <td>
                        @if($val->cancel->cust_due == '1')
                           No
                        @else
                           {{$cust_dues == 0 ? 'No' : 'Yes'}}
                        @endif 
                     </td>
                    <td>
                       @if($val->cancel->pract_due == '1')
                           No
                        @else
                           {{$pract_dues == 0 ? 'No' : 'Yes'}}
                        @endif 
                    </td>
                    <td> <a href="javascript:void(0)" class="custom-btn1 orderModal" data-id="{{base64_encode($val->id)}}"> View  </a> </td>
                 </tr>
               @endforeach
               @if(count($data) == '0')
                 <tr>
                   <td colspan="6">
                     No Bookings Found.
                   </td>
                 </tr>
               @endif
             </tbody>
          </table>
       </div>
    </div>
 </div>


 <!-- Modal -->
  <div class="modal fade modal-size2 orderView" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog" role="document" style="max-width: 850px;">
         <div class="modal-content">
            <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="booking-modal-popup" id="orderViewContent">
               
            </div>
         </div>
      </div>
   </div>

@endsection
@section('additionalJS')
   <script src="{{URL::to('/')}}/public/assets/js/dev/admin.js"> </script>
   <script type="text/javascript">
      $(document).ready(function(){
         'use strict'

         $(document).on('click', '#exportCancelledBooking', function(){
            let url = $(this).data('href');
            window.location.href = url;
         });
      });
   </script>
@endsection
