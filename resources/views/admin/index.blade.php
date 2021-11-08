@extends('includes.master')
@section('title', 'Dashboard')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
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
                      <th> Practitioner </th>
                      <th> Booker </th>
                      <th> Address </th>
                      <th> Charge </th>
                      <th> Actions </th>
                   </tr>
                </thead>
                <tbody>
                   @foreach($upcomming as $val)
                     <tr>
                        <td> {{date('l, d M Y - h:i A', strtotime($val->start_at.' '.$val->details[0]->start_time))}}</td>
                        <td> #{{$val->id}} </td>
                        <td class="col-blue"> {{empty($val->practitioner) ? 'Deleted User' : $val->practitioner->first_name.' '.$val->practitioner->last_name}}</td>
                        <td class="col-blue"> {{empty($val->booker) ? 'Deleted User' : $val->booker->first_name.' '.$val->booker->last_name}}</td>
                        <td> {{empty($val->booker->user_address) ? '' : $val->booker->user_address->city}}{{empty($val->booker->user_address->country) ? '' : ', '.$val->booker->user_address->country->country}} </td>
                        <td> NZ ${{number_format($val->total_amount, 2)}} </td>
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
          <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
             <div class="box-type2">
                <div class="page-title2">
                   <h3> Statistics </h3>
                </div>
                <div class="stats-records">
                   <div>
                      <h4> {{$data_count['practitioners']}} </h4>
                      <h6> Practitioners </h6>
                   </div>
                   <div>
                      <h4> {{$data_count['upcomming']}} </h4>
                      <h6> Upcoming Bookings </h6>
                   </div>
                   <div>
                      <h4> {{$data_count['completed']}} </h4>
                      <h6> Completed Bookings </h6>
                   </div>
                   <div>
                      <h4> {{$data_count['cancelled']}} </h4>
                      <h6> Cancelled Bookings </h6>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>


    <div class="block-element">
       <div class="row">
          <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-pad">

             <div class="box-type2">
                <div class="sales-set1 m-b-30 m-t-15">
                   <h5> Sales (In NZ$) </h5>
                </div>
                <div class="sales-set2">
                   <div class="row">
                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                         <span class="line-1" style="background:#b5dfff;"> . </span>
                         <h6> Today </h6>
                         <h4 class="col-blue"> NZ$0.00 </h4>
                      </div>
                   </div>
                </div>
             </div>


          </div>


          <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-pad">

             <div class="box-type2">
                <div class="sales-set1 m-b-30 m-t-15">
                   <h5> Comission Paid (In NZ$) </h5>
                </div>
                <div class="sales-set2">
                   <div class="row">
                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                         <span class="line-1" style="background:#b5dfff;"> . </span>
                         <h6> Today </h6>
                         <h4 class="col-blue"> NZ$0.00 </h4>
                      </div>
                   </div>
                </div>
             </div>


          </div>


          <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-pad">

             <div class="box-type2">
                <div class="sales-set1 m-b-30 m-t-15">
                   <h5> Refunds Process (In NZ$) </h5>
                </div>
                <div class="sales-set2">
                   <div class="row">
                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                         <span class="line-1" style="background:#b5dfff;"> . </span>
                         <h6> Today </h6>
                         <h4 class="col-blue"> NZ$0.00 </h4>
                      </div>
                   </div>
                </div>
             </div>


          </div>


          <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-pad">

             <div class="box-type2">
                <div class="sales-set1 m-b-30 m-t-15">
                   <h5> Gross Earnings (In NZ$) </h5>
                </div>
                <div class="sales-set2">
                   <div class="row">
                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                         <span class="line-1" style="background:#b5dfff;"> . </span>
                         <h6> Today </h6>
                         <h4 class="col-blue"> NZ$0.00 </h4>
                      </div>
                   </div>
                </div>
             </div>


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


    <div class="modal fade modal-size2 orderModalCancel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
       <div class="modal-dialog" role="document" style="max-width: 600px;">
          <div class="modal-content">
             <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
             <div class="custom-modal-head">
                <h3> Cancel Booking </h3>
             </div>
             <div class="custom-modal-data">

                <p class="col-grey">Why are you cancelling this booking? This information won't be shared with the booker.</p>

                <form class="text-right" method="post" action="{{route('admin.booking.cancel')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="oid" id="oid">
                    <textarea name="description" required></textarea>
                    <p class="col-grey text-left"> Are you sure you would like to cancel this booking? A notification will be sent to the booker to let them know </p>
                    <button class="bg-blue col-white normal-btn rounded"> Cancel Booking </button>
                </form>

             </div>
          </div>
       </div>
    </div>

@endsection
@section('additionalJS')
   <script src="{{URL::to('/')}}/public/assets/js/dev/admin.js"> </script>
@endsection

