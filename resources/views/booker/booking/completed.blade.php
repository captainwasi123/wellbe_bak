@extends('includes.master')
@section('title', 'Completed Bookings')

@section('sidebar')@include('booker.includes.sidebar')@endsection
@section('topbar')@include('booker.includes.topbar')@endsection

@section('content')

<div class="dashboard-wrapper">
   <div class="box-type4">
      <div class="page-title">
         <h3 class="col-white"> Completed Bookings </h3>
      </div>
      <div class="box-type1">
         <div class="table-overlay table-type1">
            <table>
               <thead>
                  <tr>
                     <th> Date / Time </th>
                     <th> Booking ID </th>
                     <th> Practitioner </th>
                     <th> Rating </th>
                     <th> Charge </th>
                     <th> Actions </th>
                  </tr>
               </thead>
               <tbody>
                 @foreach($data as $val)
                   <tr>
                      <td> {{date('l, d M Y - h:i A', strtotime($val->start_at.' '.$val->details[0]->start_time))}}</td>
                      <td> #{{$val->id}} </td>
                      <td class="col-blue chat" data-ref="{{base64_encode(base64_encode($val->id))}}"> {{empty($val->practitioner) ? 'Deleted User' : $val->practitioner->first_name.' '.$val->practitioner->last_name}} <i class="fa fa-comments col-black"> </i> </td>
                      <td>
                        @if(empty($val->reviews))
                          <a href="javascript:void(0)" class="openRatingModal" data-ref="{{base64_encode($val->id)}}">Add Rating</a>
                        @else
                          @php $rat = $val->reviews->rating; @endphp
                          <span title="{{$val->reviews->review}}">
                            @for($i=1; $i<=5; $i++) 
                              <i class="fa fa-star {{$i > $rat ? 'star-off' : 'star-onn'}}"> </i>
                            @endfor  
                          </span>
                        @endif 
                      </td>
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
                <input type="hidden" name="ref_id" id="oid">
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
          $('#oid').val(refid);
          $('.addRating').modal('show');
        });
      });
    </script>
@endsection
