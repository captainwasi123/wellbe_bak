
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
                @foreach($data as $val)
                  <tr>
                     <td class="col-blue"> {{$val->first_name.' '.$val->last_name}} </td>
                     <td> {{count($val->b_upcoming)}} </td>
                     <td> {{count($val->b_completed)}} </td>
                     <td> {{count($val->b_cancelled)}} </td>
                     <td> {{empty($val->b_revenue) ? '0' : '$'.number_format($val->b_revenue[0]->totalRevenue, 2)}} </td>
                     <td> {{$val->newsletter == '0' ? 'NO' : 'YES'}} </td>
                     <td> {{empty($val->user_address) ? '' : $val->user_address->city}}</td>
                  </tr>
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
</div>
@endsection
