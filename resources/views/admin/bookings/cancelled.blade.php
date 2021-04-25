
@extends('includes.master')
@section('title', 'Cancelled Bookings')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
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
                   <th> Booker </th>
                   <th> Refund Due </th>
                   <th> Comissioned Payout Due </th>
                   <th> Actions </th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td> Mon 15 Feb 2020 - 08:30 AM </td>
                   <td> #905848 </td>
                   <td class="col-blue"> Paige   </td>
                   <td class="col-blue"> Paige Williams  </td>
                   <td> Yes </td>
                   <td> Yes </td>
                   <td> <a href="" class="custom-btn1"> View  </a> </td>
                </tr>
                 <tr>
                   <td> Mon 15 Feb 2020 - 08:30 AM </td>
                   <td> #905848 </td>
                   <td class="col-blue"> Paige   </td>
                   <td class="col-blue"> Paige Williams  </td>
                   <td> Yes </td>
                   <td> Yes </td>
                   <td> <a href="" class="custom-btn1"> View  </a> </td>
                </tr>
                 <tr>
                   <td> Mon 15 Feb 2020 - 08:30 AM </td>
                   <td> #905848 </td>
                   <td class="col-blue"> Paige   </td>
                   <td class="col-blue"> Paige Williams  </td>
                   <td> Yes </td>
                   <td> Yes </td>
                   <td> <a href="" class="custom-btn1"> View  </a> </td>
                </tr>
                 <tr>
                   <td> Mon 15 Feb 2020 - 08:30 AM </td>
                   <td> #905848 </td>
                   <td class="col-blue"> Paige   </td>
                   <td class="col-blue"> Paige Williams  </td>
                   <td> Yes </td>
                   <td> Yes </td>
                   <td> <a href="" class="custom-btn1"> View  </a> </td>
                </tr>
                 <tr>
                   <td> Mon 15 Feb 2020 - 08:30 AM </td>
                   <td> #905848 </td>
                   <td class="col-blue"> Paige   </td>
                   <td class="col-blue"> Paige Williams  </td>
                   <td> Yes </td>
                   <td> Yes </td>
                   <td> <a href="" class="custom-btn1"> View  </a> </td>
                </tr>



             </tbody>
          </table>
       </div>
    </div>
 </div>
@endsection
