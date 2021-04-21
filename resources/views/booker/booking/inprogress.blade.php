@extends('includes.master')
@section('title', 'In-Porgress Bookings')

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
                        <tr>
                           <td> Mon 15 Feb 2020 - 08:30 AM </td>
                           <td> Sports Massage -30 Mins <br/>  Sports Massage -30 Mins <br/> Sports Massage -30 Mins </td>
                           <td class="col-blue"> Paige <i class="fa fa-comments col-black"> </i> </td>
                           <td> 116 William Street, Petone, Lo... </td>
                           <td> NZ$ - 48.00 </td>
                           <td> <a href="" class="custom-btn1"> View  </a> </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         </div>
      </section>
      <!-- All Dashboard Content Ends Here -->
      @endsection
