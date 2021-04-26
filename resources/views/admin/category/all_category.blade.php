
@extends('includes.master')
@section('title', 'Completed Bookings')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper">
    <div class="box-type4">
      <div class="page-title">
        <h3 class="col-white"> Add Category </h3>
      </div>
       <div class="box-type1">
          <div class="row"> 
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> <br>
                  <div class="form-field3">
                    <p> Category Name </p>
                    <input type="text" name="cat_name" required="">
                  </div>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> <br>
                  <div class="form-field3">
                    <p> Image </p>
                    <input type="file" name="cat_name" required="">
                  </div>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <div class="form-field3">
                   <button class="normal-btn bg-blue col-white rounded"> Save </button>
                </div>
              </div>
          </div>
       </div>
    </div>
    <div class="box-type4">
    <div class="page-title">
       <h3 class="col-white"> All Category </h3>
    </div>
    <div class="box-type1">
       <div class="table-overlay table-type1">
          <table>
             <thead>
                <tr>
                   <th> # </th>
                   <th> Category Name </th>
                   <th> Actions </th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td> 1 </td>
                   <td> #905848 </td>
                   <td> 
                      <a href="" class="custom-btn1"> Edit  </a>
                      <a href="" class="custom-btn1"> Delete  </a>
                   </td>
                </tr>
             </tbody>
          </table>
       </div>
    </div>
 </div>

 </div>
 @endsection
