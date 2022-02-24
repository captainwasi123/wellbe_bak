
@extends('includes.master')
@section('title', 'Practitioners')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper" >
    <div class="box-type4">
    <div class="page-title">
       <h3 class="col-white"> Practitioners </h3>
       <a href="javascript:void(0)" class="btn btn-default pull-right" data-href="{{route('admin.practitioners.export')}}" id="exportPractitioner" style="margin-top: -46px;">Export</a>
    </div>
    <div class="box-type1">
       <div class="table-overlay table-type1">
          <table>
             <thead>
                <tr>
                   <th> Name </th>
                   <th> Upcoming Bookings </th>
                   <th> Completed Bookings </th>
                   <th> Cancelled Bookings </th>
                   <th> Revenue Generated </th>
                   <th> Comission Paid </th>
                   <th> Active </th>
                </tr>
             </thead>
             <tbody>
                @foreach($data as $val)
                  <tr>
                     <td class="col-blue"><a href="{{route('admin.practitioners.portal',base64_encode($val->id))}}" target="_blank">{{$val->first_name.' '.$val->last_name}}</a>  </td>
                     <td> {{count($val->p_upcoming)}} </td>
                     <td> {{count($val->p_completed)}} </td>
                     <td> {{count($val->p_cancelled)}} </td>
                     <td> {{empty($val->p_revenue) ? '0' : '$'.number_format($val->p_revenue[0]->totalRevenue, 2)}} </td>
                     @php
                        $comPaid = 0;
                         foreach($val->p_completed as $pc){
                             $cpaid = ($pc->sub_total/100)*$pc->comission;
                             $comPaid = $comPaid+$cpaid;
                         }
                     @endphp
                     <td> {{'$'.$comPaid}} </td>
                     <td>
                      <label class="switch">
                        <input type="checkbox"  class="switch-input disableUser" data-ref="{{base64_encode($val->id)}}" {{$val->status == '1' ? 'checked' : ''}}>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                      </label>
                      <a href="javascript:void(0)" class="manageCategory" data-id="{{base64_encode($val->id)}}">
                        <span class="fa fa-ellipsis-v"></span>
                        </a>
                    </td>
                  </tr>
                @endforeach
                @if(count($data) == '0')
                  <tr>
                    <td colspan="7">No Practitioners Found.</td>
                  </tr>
                @endif
             </tbody>
          </table>
       </div>
    </div>
  </div>
</div>

<!-- Disable Modal -->
<div class="modal fade modal-size2 disableUserModal" onclick="window.location.reload();" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog" role="document" style="max-width: 500px;">
      <div class="modal-content">
         <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
         <div class="custom-modal-head">
            <h3> <img src="{{URL::to('/')}}/public/assets/images/red-cross.png" alt="red-cross-icon" width="35px"> Disable User </h3>
            <p class="col-grey text-left"> Are you sure you want to disable this user? They will not be able to re-enable their store until you re-enable them. </p>
         </div>
         <div class="custom-modal-data text-left">
            <form method="post" action="{{route('admin.practitioners.disable')}}">
              {{csrf_field()}}
              <input type="hidden" name="pid" id="dpid">
              <button type="submit" class="bg-blue col-white normal-btn rounded"> Yes </button>

              <span style="display: inline-block;margin:0px 10px"> or </span>

              <button type="reset"  class="bg-silver col-black normal-btn rounded" data-dismiss="modal"> Cancel </button>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- Assume Modal -->
<div class="modal fade modal-size2 assumeUserModal"  onclick="window.location.reload();" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
         <div class="modal-dialog" role="document" style="max-width: 500px;">
            <div class="modal-content">
               <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
               <div class="custom-modal-head">
                  <h3> <img src="{{URL::to('/')}}/public/assets/images/red-cross.png" alt="red-cross-icon" width="35px"> Activate Practitioner </h3>
                  <p class="col-grey text-left"> Are you sure you would like to activate this practitioner account? </p>
               </div>
               <div class="custom-modal-data text-left">
                  <form method="post" action="{{route('admin.practitioners.assume')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="pid" id="apid">
                    <button type="submit"  class="bg-blue col-white normal-btn rounded"> Yes </button>

                    <span style="display: inline-block;margin:0px 10px "> or </span>

                    <button type="reset" onclick="window.location.reload();" class="bg-silver col-black normal-btn rounded " data-dismiss="modal"> Cancel </button>
                  </form>
               </div>
            </div>
         </div>
      </div>


<!-- Manage Categories -->
<div class="modal fade modal-size2 manageCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
   <div class="modal-dialog" role="document" style="max-width: 600px;">
      <div class="modal-content">
         <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
         <div class="custom-modal-head">
            <h3> Manage Category </h3>
         </div>
         <div class="custom-modal-data" id="manageCategoryModalBody">

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

         $(document).on('click', '#exportPractitioner', function(){
            let url = $(this).data('href');
            window.location.href = url;
         });
      });
   </script>
@endsection
