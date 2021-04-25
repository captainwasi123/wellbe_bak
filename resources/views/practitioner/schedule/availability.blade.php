@extends('includes.master')
@section('title', 'Your Availability')

@section('sidebar')@include('practitioner.includes.sidebar')@endsection
@section('topbar')@include('practitioner.includes.topbar')@endsection
@section('additionalCSS')
   <link href="{{URL::to('/')}}/public/assets/css/timepicker.css" rel="stylesheet">
@endsection
@section('content')
     
<div class="dashboard-wrapper">
   <div class="box-type4">
      <div class="page-title">
         <h3 class="col-white"> Your Availability </h3>
      </div>
      <div class="box-type1">
         <div class="availability-head">
            <h4 class="col-blue"> Opening Hours </h4>
         </div>
         <div class="availability-data">
         <form action="{{route('practitioner.schedule.save')}}" method="post">
         @csrf
            <div class="table-overlay">
               <table class="availability-table">
                     <tbody>
                        <tr>
                           <td> <input type="checkbox" name="is_active[]" value="sunday"> </td>
                           <td> Sunday </td>
                           <td> First Booking </td>
                           <td>
                              <input type="text" name="days[sunday][0]['first_booking']" class="timepicker">
                           </td>
                           <td> Last Booking </td>
                           <td>
                              <input type="text" name="days[sunday][0]['last_booking']" class="timepicker">
                           </td>
                           <td> 
                              <a href="javascript:void(0)" class="col-blue splitShift"  data-id="1" data-day="sunday"> 
                                 + Split Shift 
                              </a> 
                           </td>  
                        </tr>
                     </tbody>

                     <tbody>      
                        <tr>
                           <td> <input type="checkbox" name="is_active[]" value="monday"> </td>
                           <td> Monday </td>
                           <td> First Booking </td>
                           <td>
                              <input type="text" name="days[monday][0]['first_booking']" class="timepicker">
                           </td>
                           <td> Last Booking </td>
                           <td>
                              <input type="text" name="days[monday][0]['last_booking']" class="timepicker">
                           </td>
                           <td> 
                              <a href="javascript:void(0)" class="col-blue splitShift"  data-id="1" data-day="monday"> 
                                 + Split Shift 
                              </a> 
                           </td>  
                        </tr>
                     </tbody>

                     <tbody>
                        <tr>
                           <td> <input type="checkbox" name="is_active[]" value="tuesday"> </td>
                           <td> Tuesday </td>
                           <td> First Booking </td>
                           <td>
                              <input type="text" name="days[tuesday][0]['first_booking']" class="timepicker">
                           </td>
                           <td> Last Booking </td>
                           <td>
                              <input type="text" name="days[tuesday][0]['last_booking']" class="timepicker">
                           </td>
                           <td> 
                              <a href="javascript:void(0)" class="col-blue splitShift"  data-id="1" data-day="tuesday"> 
                                 + Split Shift 
                              </a> 
                           </td>  
                        </tr>
                     </tbody>

                     <tbody>
                        <tr>
                           <td> <input type="checkbox" name="is_active[]" value="wednesday"> </td>
                           <td> Wednesday </td>
                           <td> First Booking </td>
                           <td>
                              <input type="text" name="days[wednesday][0]['first_booking']" class="timepicker">
                           </td>
                           <td> Last Booking </td>
                           <td>
                              <input type="text" name="days[wednesday][0]['last_booking']" class="timepicker">
                           </td>
                           <td> 
                              <a href="javascript:void(0)" class="col-blue splitShift"  data-id="1" data-day="wednesday"> 
                                 + Split Shift 
                              </a> 
                           </td>  
                        </tr>
                     </tbody>

                     <tbody>
                        <tr>
                           <td> <input type="checkbox" name="is_active[]" value="thursday"> </td>
                           <td> Thursday </td>
                           <td> First Booking </td>
                           <td>
                              <input type="text" name="days[thursday][0]['first_booking']" class="timepicker">
                           </td>
                           <td> Last Booking </td>
                           <td>
                              <input type="text" name="days[thursday][0]['last_booking']" class="timepicker">
                           </td>
                           <td> 
                              <a href="javascript:void(0)" class="col-blue splitShift"  data-id="1" data-day="thursday"> 
                                 + Split Shift 
                              </a> 
                           </td>  
                        </tr>
                     </tbody>

                     <tbody>
                        <tr>
                           <td> <input type="checkbox" name="is_active[]" value="friday"> </td>
                           <td> Friday </td>
                           <td> First Booking </td>
                           <td>
                              <input type="text" name="days[friday][0]['first_booking']" class="timepicker">
                           </td>
                           <td> Last Booking </td>
                           <td>
                              <input type="text" name="days[friday][0]['last_booking']" class="timepicker">
                           </td>
                           <td> 
                              <a href="javascript:void(0)" class="col-blue splitShift"  data-id="1" data-day="friday"> 
                                 + Split Shift 
                              </a> 
                           </td>  
                        </tr>
                     </tbody>

                     <tbody>
                        <tr>
                           <td> <input type="checkbox" name="is_active[]" value="saturday"> </td>
                           <td> Saturday </td>
                           <td> First Booking </td>
                           <td>
                              <input type="text" name="days[saturday][0]['first_booking']" class="timepicker">
                           </td>
                           <td> Last Booking </td>
                           <td>
                              <input type="text" name="days[saturday][0]['last_booking']" class="timepicker">
                           </td>
                           <td> 
                              <a href="javascript:void(0)" class="col-blue splitShift"  data-id="1" data-day="saturday"> 
                                 + Split Shift 
                              </a> 
                           </td>  
                        </tr>
                     </tbody>
               </table>
            </div>
               
         </div>
         <div class="block-element">
            <div class="availability-head">
               <h4 class="col-blue"> Dates I Am Closed </h4>
            </div>
            <div class="availability-data2 m-b-20">
               <h5 class="col-black"> Closed on <input type="date" name=""> <a href="" class="col-blue"> +Add </a>  </h5>
               <h5 class="col-black"> Mon 01-Feb-2021 <a href="" class="col-blue"> Remove </a> </h5>
            </div>
            <div class="block-element text-right mob-text-left availability-data2 m-b-30">
               <button class="normal-btn rounded bg-blue col-white" type="submit"> Save </button>
            </div>
         </div>
         </form>
      </div>
   </div>
</div>

@endsection
@section('additionalJS')
   <script src="{{URL::to('/')}}/public/assets/js/dev/practitioner.js"> </script>
   <script src="{{URL::to('/')}}/public/assets/js/timepicker.js"> </script>
   <script type="text/javascript">
      $(document).ready(function(){
       $('.timepicker').mdtimepicker(); //Initializes the time picker
     });
   </script>
@endsection