@extends('includes.master')
@section('title', 'Incomplete Bookings')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper">
    <div class="box-type4">
    <div class="page-title">
       <h3 class="col-white"> Incomplete Bookings </h3>
         <div class="pull-right" style="margin-top: -46px;">
            <a href="javascript:void(0)" class="btn btn-default" data-href="{{route('admin.incomplete.export')}}" id="exportIncompleteBooking">Export</a>
         </div>
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
                   <th> Address </th>
                   <th> Charge </th>
                </tr>
             </thead>
             <tbody>
                 @foreach($orders as $val)
                   <tr>
                      <td> {{date('l, d M Y - h:i A', strtotime($val->start_at.' '.@$val->details[0]->start_time))}}</td>
                      <td> #{{$val->id}} </td>
                      <td class="col-blue"> {{empty($val->practitioner) ? 'Deleted User' : $val->practitioner->first_name.' '.$val->practitioner->last_name}}</td>
                      <td class="col-blue"> {{empty($val->booker) ? 'Deleted User' : $val->booker->first_name.' '.$val->booker->last_name}}</td>
                      <td> {{$val->address}} </td>
                      <td> NZ ${{number_format($val->total_amount, 2)}} </td>
                   </tr>
                 @endforeach
                 @if(count($orders) == '0')
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
@endsection
@section('additionalJS')
   <script src="{{URL::to('/')}}/public/assets/js/dev/admin.js"> </script>
   <script type="text/javascript">
      $(document).ready(function(){
         'use strict'

         $(document).on('click', '#exportIncompleteBooking', function(){
            let url = $(this).data('href');
            window.location.href = url;
         });
      });
   </script>
@endsection
