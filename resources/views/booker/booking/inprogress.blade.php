@extends('includes.master')
@section('title', 'In Progress Bookings')

@section('sidebar')@include('booker.includes.sidebar')@endsection
@section('topbar')@include('booker.includes.topbar')@endsection

@section('content')
   <div class="dashboard-wrapper">
      <div class="box-type4">
         <div class="page-title">
            <h3 class="col-white"> In Progress Bookings </h3>
         </div>
         <div class="box-type1">
            <div class="table-overlay table-type1">
               <table>
                  <thead>
                     <tr>
                        <th> Date / Time </th>
                        <th> Services </th>
                        <th> Practitioner </th>
                        <th> Location </th>
                        <th> Charge </th>
                        <th> Actions </th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $val)
                      <tr>
                         <td> {{date('l, d M Y - h:i A', strtotime($val->start_at.' '.$val->details[0]->start_time))}}</td>
                         <td> #{{$val->id}} </td>
                         <td>{{empty($val->practitioner) ? 'Deleted User' : $val->practitioner->first_name.' '.$val->practitioner->last_name}} <br><a href="javascript:void(0)" class="col-blue chat" data-ref="{{base64_encode(base64_encode($val->id))}}"> <i class="fa fa-comments col-black"> </i> {{count($val->unreadMessages) > 0 ? count($val->unreadMessages).' New Messages' : 'Send Message'}} </a> </td>
                         <td> {{$val->address}} </td>
                         <td> NZ ${{number_format($val->total_amount, 2)}} </td>
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

                <p class="col-grey"> Why are you cancelling this booking? </p>

                <form class="text-right" method="post" action="{{route('booker.booking.cancel')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="oid" id="oid">
                    <textarea name="description" required></textarea>
                    <p class="col-grey text-left"> Are you sure you would like to cancel this booking? A notification will be sent to the practitioner to let them know </p>
                    <button class="bg-blue col-white normal-btn rounded"> Cancel Booking </button>
                </form>

             </div>
          </div>
       </div>
    </div>


@endsection
@section('additionalJS')
   <script src="{{URL::to('/')}}/public/assets/js/dev/booker.js"> </script>
@endsection

