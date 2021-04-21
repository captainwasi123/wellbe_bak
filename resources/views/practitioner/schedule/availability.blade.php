@extends('includes.master')
@section('title', 'Your Availability')

@section('sidebar')@include('practitioner.includes.sidebar')@endsection
@section('topbar')@include('practitioner.includes.topbar')@endsection

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
            <div class="table-overlay">
               <table>
                  <tbody>
                     <tr>
                        <td> <input type="checkbox" name=""> </td>
                        <td> Sunday </td>
                        <td> First Booking </td>
                        <td>
                           <select>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                           </select>
                        </td>
                        <td> Last Booking </td>
                        <td>
                           <select>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                           </select>
                        </td>
                        <td class="visib1"> Empty </td>
                     </tr>
                     <tr>
                        <td class="visib1"> Empty  </td>
                        <td class="visib1"> Empty  </td>
                        <td> First Booking </td>
                        <td>
                           <select>
                              <option> 7:00 PM </option>
                              <option> 7:00 PM </option>
                              <option> 7:00 PM </option>
                           </select>
                        </td>
                        <td> Last Booking </td>
                        <td>
                           <select>
                              <option> 9:30 PM </option>
                              <option> 9:30 PM </option>
                              <option> 9:30 PM </option>
                           </select>
                        </td>
                        <td class="visib1"> Empty </td>
                     </tr>
                     <tr>
                        <td> <input type="checkbox" name=""> </td>
                        <td> Monday </td>
                        <td> First Booking </td>
                        <td>
                           <select>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                           </select>
                        </td>
                        <td> Last Booking </td>
                        <td>
                           <select>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                           </select>
                        </td>
                        <td> <a href="" class="col-blue"> + Split Shift </a> </td>
                     </tr>
                     <tr>
                        <td> <input type="checkbox" name=""> </td>
                        <td> Tuesday </td>
                        <td> First Booking </td>
                        <td>
                           <select>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                           </select>
                        </td>
                        <td> Last Booking </td>
                        <td>
                           <select>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                           </select>
                        </td>
                        <td> <a href="" class="col-blue"> + Split Shift </a> </td>
                     </tr>
                     <tr>
                        <td> <input type="checkbox" name=""> </td>
                        <td> Wednesday </td>
                        <td> First Booking </td>
                        <td>
                           <select>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                           </select>
                        </td>
                        <td> Last Booking </td>
                        <td>
                           <select>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                           </select>
                        </td>
                        <td> <a href="" class="col-blue"> + Split Shift </a> </td>
                     </tr>
                     <tr>
                        <td> <input type="checkbox" name=""> </td>
                        <td> Thursday </td>
                        <td> First Booking </td>
                        <td>
                           <select>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                           </select>
                        </td>
                        <td> Last Booking </td>
                        <td>
                           <select>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                           </select>
                        </td>
                        <td> <a href="" class="col-blue"> + Split Shift </a> </td>
                     </tr>
                     <tr>
                        <td> <input type="checkbox" name=""> </td>
                        <td> Friday </td>
                        <td> First Booking </td>
                        <td>
                           <select>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                           </select>
                        </td>
                        <td> Last Booking </td>
                        <td>
                           <select>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                           </select>
                        </td>
                        <td> <a href="" class="col-blue"> + Split Shift </a> </td>
                     </tr>
                     <tr>
                        <td> <input type="checkbox" name=""> </td>
                        <td> Saturday </td>
                        <td> First Booking </td>
                        <td>
                           <select>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                              <option> 8:00 AM </option>
                           </select>
                        </td>
                        <td> Last Booking </td>
                        <td>
                           <select>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                              <option> 5:00 PM </option>
                           </select>
                        </td>
                        <td> <a href="" class="col-blue"> + Split Shift </a> </td>
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
               <button class="normal-btn rounded bg-blue col-white"> Save </button>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection