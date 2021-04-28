
@extends('includes.master')
@section('title', 'Practitioners')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper">
    <div class="box-type4">
    <div class="page-title">
       <h3 class="col-white"> Practitioners </h3>
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
                     <td class="col-blue"> {{$val->first_name.' '.$val->last_name}} </td>
                     <td> {{count($val->p_upcoming)}} </td>
                     <td> {{count($val->p_completed)}} </td>
                     <td> {{count($val->p_cancelled)}} </td>
                     <td> {{empty($val->p_revenue) ? '0' : '$'.number_format($val->p_revenue[0]->totalRevenue, 2)}} </td>
                     <td> - </td>
                     <td>   
                      <label class="switch">
                        <input type="checkbox" class="switch-input" checked>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                      </label>  
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
@endsection
