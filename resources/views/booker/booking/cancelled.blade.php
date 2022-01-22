@extends('includes.master')
@section('title', 'Cancelled Bookings')

@section('sidebar')@include('booker.includes.sidebar')@endsection
@section('topbar')@include('booker.includes.topbar')@endsection

@section('content')
<div class="dashboard-wrapper">
   <div class="box-type4">
      <div class="page-title">
         <h3 class="col-white"> Cancelled Jobs </h3>
      </div>
      <div class="box-type1">
         <div class="table-overlay table-type1">
            <table>
               <thead>
                  <tr>
                     <th> Date / Time </th>
                     <th> Booking ID </th>
                     <th> Practitioner </th>
                     <th> Refund Status </th>
                     <th> Refund Amount </th>
                  </tr>
               </thead>
               <tbody>
                 @foreach($data as $val)
                     @php
                        $cust_percentage = 0;
                        $cust_dues = 0;

                        if($val->pract_id == $val->cancel->user_id){
                           $cust_percentage = 100;
                        }else{
                           $timestamp1 = strtotime($val->start_at.' '.$val->details[0]->start_time);
                           $timestamp2 = strtotime($val->cancel->created_at);
                           $hours_gap = abs($timestamp2 - $timestamp1)/(60*60);
                           if(date('Y-m-d H:i:s', strtotime($val->start_at.' '.$val->details[0]->start_time)) <= date('Y-m-d H:i:s', strtotime($val->cancel->created_at))){
                              $cust_percentage = 0;
                           }else{
                              if($hours_gap > 24){
                                 $cust_percentage = 100;
                              }elseif($hours_gap > 2 && $hours_gap <= 24){
                                 $cust_percentage = 75;
                              }elseif($hours_gap < 2){
                                 $cust_percentage = 0;
                              }
                           }
                        }
                        $cust_dues = ($val->total_amount/100)*$cust_percentage;
                     @endphp
                   <tr>
                      <td> {{date('l, d M Y - h:i A', strtotime($val->start_at.' '.$val->details[0]->start_time))}}</td>
                      <td> #{{$val->id}} </td>
                      <td class="col-blue"> {{empty($val->practitioner) ? 'Deleted User' : $val->practitioner->first_name.' '.$val->practitioner->last_name}}</td>

                      <td> 
                        @if($val->cancel->cust_due == '1')
                           Paid
                        @else
                           {{$cust_dues == 0 ? 'No Refund' : 'In-Escrow'}}
                        @endif 
                     </td>
                      <td> NZ ${{number_format($cust_dues , 2)}} </td>

                    


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
   <script src="{{URL::to('/')}}/public/assets/js/dev/booker.js"> </script>
@endsection
