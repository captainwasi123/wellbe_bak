@extends('includes.master')
@section('title', 'Completed Bookings')

@section('sidebar')@include('booker.includes.sidebar')@endsection
@section('topbar')@include('booker.includes.topbar')@endsection

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
                           <th> Practitioner </th>
                           <th> Rating </th>
                           <th> Charge </th>
                           <th> Actions </th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td> Mon 15 Feb 2020 - 08:30 AM </td>
                           <td> #905848 </td>
                           <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                           <td> <a href="" class="col-black"> Add Rating </a> </td>
                           <td> NZ$ - 48.00 </td>
                           <td> <a href="" class="custom-btn1"> View  </a> </td>
                        </tr>
                        <tr>
                           <td> Mon 15 Feb 2020 - 08:30 AM </td>
                           <td> #905848 </td>
                           <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                           <td> <a href="" class="col-black"> Add Rating </a> </td>
                           <td> NZ$ - 48.00 </td>
                           <td> <a href="" class="custom-btn1"> View  </a> </td>
                        </tr>
                        <tr>
                           <td> Mon 15 Feb 2020 - 08:30 AM </td>
                           <td> #905848 </td>
                           <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                           <td> <a href="" class="col-black"> Add Rating </a> </td>
                           <td> NZ$ - 48.00 </td>
                           <td> <a href="" class="custom-btn1"> View  </a> </td>
                        </tr>
                        <tr>
                           <td> Mon 15 Feb 2020 - 08:30 AM </td>
                           <td> #905848 </td>
                           <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                           <td> <a href="" class="col-black"> Add Rating </a> </td>
                           <td> NZ$ - 48.00 </td>
                           <td> <a href="" class="custom-btn1"> View  </a> </td>
                        </tr>
                        <tr>
                           <td> Mon 15 Feb 2020 - 08:30 AM </td>
                           <td> #905848 </td>
                           <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                           <td> <a href="" class="col-black"> Add Rating </a> </td>
                           <td> NZ$ - 48.00 </td>
                           <td> <a href="" class="custom-btn1"> View  </a> </td>
                        </tr>
                        <tr>
                           <td> Mon 15 Feb 2020 - 08:30 AM </td>
                           <td> #905848 </td>
                           <td class="col-blue"> Paige Williams <i class="fa fa-comments col-black"> </i> </td>
                           <td> <span> <i class="fa fa-star star-onn"> </i> <i class="fa fa-star star-onn"> </i> <i class="fa fa-star star-onn"> </i> <i class="fa fa-star star-onn"> </i> <i class="fa fa-star star-off"> </i> </span> </td>
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
