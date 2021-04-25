
@extends('includes.master')
@section('title', 'Customers')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper">
    <div class="box-type4">
    <div class="page-title">
       <h3 class="col-white"> Customers </h3>
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
                   <th> Subscribed to Newsletter </th>
                   <th> City </th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td class="col-blue"> Paige Williams  </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> $1000 </td>
                   <td> Yes </td>
                   <td> Auckland </td>
                </tr>
                 <tr>
                   <td class="col-blue"> Paige Williams  </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> $1000 </td>
                   <td> Yes </td>
                   <td> Auckland </td>
                </tr>
                 <tr>
                   <td class="col-blue"> Paige Williams  </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> $1000 </td>
                   <td> Yes </td>
                   <td> Auckland </td>
                </tr>
                 <tr>
                   <td class="col-blue"> Paige Williams  </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> $1000 </td>
                   <td> Yes </td>
                   <td> Auckland </td>
                </tr>
                 <tr>
                   <td class="col-blue"> Paige Williams  </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> $1000 </td>
                   <td> Yes </td>
                   <td> Auckland </td>
                </tr>



             </tbody>
          </table>
       </div>
    </div>
</div>
@endsection
