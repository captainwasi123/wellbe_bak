@extends('includes.master')
@section('title', 'Dashboard')

@section('sidebar')@include('booker.includes.sidebar')@endsection
@section('topbar')@include('booker.includes.topbar')@endsection

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
                     <th> Practitioner </th>
                     <th> Location </th>
                     <th> Charge </th>
                     <th> Actions </th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($upcomming as $val)
                     <tr>
                        <td> {{date('l, d M Y - h:i A', strtotime($val->start_at.' '.$val->details[0]->start_time))}}</td>
                        <td> #{{$val->id}} </td>
                        <td class="col-blue chat" data-ref="{{base64_encode(base64_encode($val->id))}}"> {{empty($val->practitioner) ? 'Deleted User' : $val->practitioner->first_name.' '.$val->practitioner->last_name}} <i class="fa fa-comments col-black"> </i> </td>
                        <td> {{$val->address}} </td>
                        <td> NZ - ${{number_format($val->total_amount, 2)}} </td>
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
                     <h3> Rate Your Bookings </h3>
                  </div>
                     @if(count($rating) == '0')
                        <div class="block-element pad-1">
                           <h5 class="col-grey"> You have no bookings to rate </h5>
                        </div>
                     @else
                        <table class="table">
                           <thead>
                              <tr>
                                 <th> Booking ID </th>
                                 <th> Practitioner </th>
                                 <th> Rating </th>
                                 <th> Charge </th>
                              </tr>
                           </thead>
                           <tbody>
                             @foreach($rating as $val)
                               <tr>
                                  <td> #{{$val->id}} </td>
                                  <td class="col-blue"> {{empty($val->practitioner) ? 'Deleted User' : $val->practitioner->first_name.' '.$val->practitioner->last_name}} <i class="fa fa-comments col-black"> </i> </td>
                                  <td>
                                      <a href="javascript:void(0)" class="openRatingModal" data-ref="{{base64_encode($val->id)}}">Add Rating</a>
                                  </td>
                                  <td> NZ ${{number_format($val->total_amount, 2)}} </td>
                               </tr>
                             @endforeach
                           </tbody>
                        </table>
                     @endif
               </div>
            </div>
            {{--  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <div class="box-type2">
                  <div class="page-title2">
                     <h3> Recent Messages </h3>
                  </div>
                   <div class="block-element pad-1">
                   <h5 class="col-grey"> You have no messages </h5>
                   </div>
               </div>
            </div>  --}}
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
                    <p class="col-grey text-left"> Are you sure you would like to cancel this booking? A notification will be sent to the practitioner  to let them know </p>
                    <button class="bg-blue col-white normal-btn rounded"> Cancel Booking </button>
                </form>

             </div>
          </div>
       </div>
    </div>


   <div class="modal fade modal-size2 addRating" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
     <div class="modal-dialog" role="document" style="max-width: 600px;">
        <div class="modal-content">
           <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
           <div class="custom-modal-head">
              <h3> Rate Your Practitioner </h3>
           </div>
           <div class="custom-modal-data">
              <form method="post" action="{{route('booker.booking.rating')}}">
                @csrf
                <input type="hidden" name="ref_id" id="roid">
                <div class="rating_block">
                  <input type="number" name="rating" id="rating1" value="1" class="rating text-warning" required />
                </div>
                <textarea placeholder="Enter description" name="description" class="form-control" required></textarea>
                <button class="bg-blue col-white normal-btn rounded"> Save </button>
              </form>
           </div>
        </div>
     </div>
  </div>
@endsection
@section('additionalJS')
    <script src="https://use.fontawesome.com/5ac93d4ca8.js"></script>
    <script src="{{URL::to('/')}}/public/assets/js/dev/booker.js"> </script>
    <script src="{{URL::to('/')}}/public/assets/js/dev/bootstrap4-rating-input.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        'use strict'

        $(document).on('click', '.openRatingModal', function(){
          var refid = $(this).data('ref');
          $('#roid').val(refid);
          $('.addRating').modal('show');
        });
      });
    </script>
@endsection
