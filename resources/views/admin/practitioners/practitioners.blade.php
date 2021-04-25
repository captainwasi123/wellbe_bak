
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
                <tr>
                   <td class="col-blue"> Paige Williams </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> 5  </td>
                   <td> $ 1000 </td>
                   <td> $ 230.00 </td>
                   <td>   <label class="switch">
<input type="checkbox" class="switch-input" checked>
<span class="switch-label" data-on="On" data-off="Off"></span>
<span class="switch-handle"></span>
</label>  </td>
                </tr>

                <tr>
                   <td class="col-blue"> Paige Williams </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> 5  </td>
                   <td> $ 1000 </td>
                   <td> $ 230.00 </td>
                   <td>   <label class="switch">
<input type="checkbox" class="switch-input" checked>
<span class="switch-label" data-on="On" data-off="Off"></span>
<span class="switch-handle"></span>
</label>  </td>
                </tr>


                <tr>
                   <td class="col-blue"> Paige Williams </td>
                   <td> 5 </td>
                   <td> 5 </td>
                   <td> 5  </td>
                   <td> $ 1000 </td>
                   <td> $ 230.00 </td>
                   <td>   <label class="switch">
<input type="checkbox" class="switch-input" checked>
<span class="switch-label" data-on="On" data-off="Off"></span>
<span class="switch-handle"></span>
</label>  </td>
                </tr>
             </tbody>
          </table>
       </div>
    </div>




</div>
</div>
@endsection
