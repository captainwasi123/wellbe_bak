
@extends('includes.master')
@section('title', 'Customers')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper">
    <div class="box-type4">
    <div class="page-title">
       <h3 class="col-white"> Customers </h3>
       <a href="javascript:void(0)" class="btn btn-default pull-right" data-href="{{route('admin.customers.export')}}" id="exportCustomer" style="margin-top: -46px;">Export</a>
    </div>
    <div class="box-type1">
       <div class="table-overlay table-type1">
          <table>
             <thead>
                <tr>
                   <th> Name </th>
                   <th> Email </th>
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
                     <td> {{$val->email}} </td>
                     <td> {{count($val->b_upcoming)}} </td>
                     <td> {{count($val->b_completed)}} </td>
                     <td> {{count($val->b_cancelled)}} </td>
                     <td> {{empty($val->b_revenue) ? '0' : '$'.number_format($val->b_revenue[0]->totalRevenue, 2)}} </td>
                     <td> {{$val->newsletter == '0' ? 'NO' : 'YES'}} </td>
                     <td> {{empty($val->user_address) ? '' : $val->user_address->city}}</td>
                  </tr>
                @endforeach
                @if(count($data) == '0')
                  <tr>
                    <td colspan="7">No Customers Found.</td>
                  </tr>
                @endif
             </tbody>
          </table>
       </div>
    </div>
</div>
@endsection
@section('additionalJS')
   <script type="text/javascript">
      $(document).ready(function(){
         'use strict'

         $(document).on('click', '#exportCustomer', function(){
            let url = $(this).data('href');
            window.location.href = url;
         });
      });
   </script>
@endsection
