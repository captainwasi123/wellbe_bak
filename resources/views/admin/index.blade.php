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
                   <tr>
                      <td> Mon 15 Feb 2020 - 08:30 AM </td>
                      <td> #905848 </td>
                      <td class="col-blue"> Paige </td>
                      <td class="col-blue"> Paige Williams </td>
                      <td> 116 William Street, Petone, Lo... </td>
                      <td> NZ$ - 48.00 </td>
                      <td> <a href="" class="custom-btn1"> View </a> </td>
                   </tr>

                   <tr>
                      <td> Mon 15 Feb 2020 - 08:30 AM </td>
                      <td> #905848 </td>
                      <td class="col-blue"> Paige </td>
                      <td class="col-blue"> Paige Williams </td>
                      <td> 116 William Street, Petone, Lo... </td>
                      <td> NZ$ - 48.00 </td>
                      <td> <a href="" class="custom-btn1"> View </a> </td>
                   </tr>

                   <tr>
                      <td> Mon 15 Feb 2020 - 08:30 AM </td>
                      <td> #905848 </td>
                      <td class="col-blue"> Paige </td>
                      <td class="col-blue"> Paige Williams </td>
                      <td> 116 William Street, Petone, Lo... </td>
                      <td> NZ$ - 48.00 </td>
                      <td> <a href="" class="custom-btn1"> View </a> </td>
                   </tr>

                   <tr>
                      <td> Mon 15 Feb 2020 - 08:30 AM </td>
                      <td> #905848 </td>
                      <td class="col-blue"> Paige </td>
                      <td class="col-blue"> Paige Williams </td>
                      <td> 116 William Street, Petone, Lo... </td>
                      <td> NZ$ - 48.00 </td>
                      <td> <a href="" class="custom-btn1"> View </a> </td>
                   </tr>

                   <tr>
                      <td> Mon 15 Feb 2020 - 08:30 AM </td>
                      <td> #905848 </td>
                      <td class="col-blue"> Paige </td>
                      <td class="col-blue"> Paige Williams </td>
                      <td> 116 William Street, Petone, Lo... </td>
                      <td> NZ$ - 48.00 </td>
                      <td> <a href="" class="custom-btn1"> View </a> </td>
                   </tr>

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
                   <h3> Statistics </h3>
                </div>
                <div class="stats-records">
                   <div>
                      <h4> 1 </h4>
                      <h6> Practitioners </h6>
                   </div>
                   <div>
                      <h4> 1 </h4>
                      <h6> Upcoming Bookings </h6>
                   </div>
                   <div>
                      <h4> 1 </h4>
                      <h6> Completed Bookings </h6>
                   </div>
                   <div>
                      <h4> 1 </h4>
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
    <!--
          <div class="block-element">
             <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                   <div class="box-type2">
                      <div class="page-title2">
                         <h3> Statistics </h3>
                      </div>
                      <div class="sales-set1">
                         <h5> Sales (In NZ$) </h5>
                      </div>
                      <div class="sales-set2">
                         <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                               <span class="line-1" style="background:#b5dfff;"> . </span>
                               <h6> Today </h6>
                               <h4 class="col-blue"> NZ$0.00  </h4>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                               <span class="line-1" style="background:#f9cac3;"> . </span>
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
          </div> -->
 </div>
@endsection
