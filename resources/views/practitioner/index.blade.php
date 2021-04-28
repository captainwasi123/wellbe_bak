@extends('includes.master')
@section('title', 'Dashboard')

@section('sidebar')@include('practitioner.includes.sidebar')@endsection
@section('topbar')@include('practitioner.includes.topbar')@endsection

@section('content')
     
<div class="dashboard-wrapper">
   <div class="box-type4">
      <div class="page-title">
         <h3 class="col-white"> Upcoming Bookings </h3>
      </div>
      <div class="box-type1">
         <div class="table-overlay table-type1">
            <table>
               <thead>
                  <tr>
                     <th> Date / Time </th>
                     <th> Booking ID </th>
                     <th> Booker </th>
                     <th> Address </th>
                     <th> My Earnings </th>
                     <th> Actions </th>
                  </tr>
               </thead>
               <tbody>
                 @foreach($upcomming as $val)
                   <tr>
                      <td> {{date('l, d M Y - h:i A', strtotime($val->start_at))}}</td>
                      <td> #{{$val->id}} </td>
                      <td class="col-blue"> {{empty($val->booker) ? 'Deleted User' : $val->booker->first_name.' '.$val->booker->last_name}} <i class="fa fa-comments col-black"> </i> </td>
                      <td> {{empty($val->booker->user_address) ? '' : $val->booker->user_address->city}}{{empty($val->booker->user_address->country) ? '' : ', '.$val->booker->user_address->country->country}} </td>
                      <td> NZ ${{number_format($val->pract_earning, 2)}} </td>
                      <td> <a href="javascript:void(0)" class="custom-btn1 orderModal" data-id="{{base64_encode($val->id)}}"> View  </a> </td>
                   </tr>
                 @endforeach
                 @if(count($upcomming) == '0')
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


   <div class="block-element">
      <div class="row">
         <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="box-type2">
               <div class="page-title2">
                  <h3> Revenue </h3>
               </div>

               <div class="sales-set2">
                  <div class="row">
                     <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">

                        <h6> Today </h6>
                        <h4 class="col-blue"> NZ$0.00  </h4>
                     </div>
                     <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">

                        <h6> Total </h6>
                        <h4 class="col-blue"> NZ$0.00  </h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="box-type2">
               <div class="page-title2">
                  <h3> Statistics </h3>
               </div>
               <div class="stats-records">
                  <div>
                     <h4> 1 </h4>
                     <h6> Pending Jobs </h6>
                  </div>
                  <div>
                     <h4> 0 </h4>
                     <h6> Completed Jobs </h6>
                  </div>
                  <div>
                     <h4> 0 </h4>
                     <h6> Cancelled Jobs </h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection