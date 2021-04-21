@extends('includes.master')
@section('title', 'Completed Bookings')

@section('sidebar')@include('practitioner.includes.sidebar')@endsection
@section('topbar')@include('practitioner.includes.topbar')@endsection

@section('content')
     
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
                       <th> Booker </th>
                       <th> Payment Status </th>
                       <th> My Earnings </th>
                       <th> Actions </th>
                    </tr>
                 </thead>
                 <tbody>
                    <tr>
                       <td> Mon 15 Feb 2020 - 08:30 AM </td>
                       <td> #905848 </td>
                       <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                       <td> IN ESCROW </td>
                       <td> NZ $48.00 </td>
                       <td> <a href="" class="custom-btn1"> View  </a> </td>
                    </tr>
                    <tr>
                       <td> Mon 15 Feb 2020 - 08:30 AM </td>
                       <td> #905848 </td>
                       <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                       <td> IN ESCROW </td>
                       <td> NZ $48.00 </td>
                       <td> <a href="" class="custom-btn1"> View  </a> </td>
                    </tr>
                    <tr>
                       <td> Mon 15 Feb 2020 - 08:30 AM </td>
                       <td> #905848 </td>
                       <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                       <td> IN ESCROW </td>
                       <td> NZ $48.00 </td>
                       <td> <a href="" class="custom-btn1"> View  </a> </td>
                    </tr>
                    <tr>
                       <td> Mon 15 Feb 2020 - 08:30 AM </td>
                       <td> #905848 </td>
                       <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                       <td> IN ESCROW </td>
                       <td> NZ $48.00 </td>
                       <td> <a href="" class="custom-btn1"> View  </a> </td>
                    </tr>
                    <tr>
                       <td> Mon 15 Feb 2020 - 08:30 AM </td>
                       <td> #905848 </td>
                       <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                       <td> Paid </td>
                       <td> NZ $48.00 </td>
                       <td> <a href="" class="custom-btn1"> View  </a> </td>
                    </tr>
                    <tr>
                       <td> Mon 15 Feb 2020 - 08:30 AM </td>
                       <td> #905848 </td>
                       <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                       <td> Paid </td>
                       <td> NZ $48.00 </td>
                       <td> <a href="" class="custom-btn1"> View  </a> </td>
                    </tr>
                 </tbody>
              </table>
           </div>
        </div>
     </div>
   </div>

@endsection