@extends('includes.master')
@section('title', 'Profile')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper">
    <div class="box-type4">
 <div class="page-title">
    <h3 class="col-white"> General </h3>
 </div>
 <div class="block-element pad-1">


 <div class="row">

 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
 <div class="block-element m-t-15 m-b-10">
 <h4 class="col-blue"> General </h4>
 </div>
 <div class="row">

 <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
 <div class="form-field3">
 <p> First Name/display name </p>
 <input type="text"  name="">
 </div>
 </div>

 <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
 <div class="form-field3">
 <p> Last name </p>
 <input type="text"  name="">
 </div>
 </div>

 </div>

 <div class="row">

 <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
 <div class="form-field3">
 <p> Email Address </p>
 <input type="email"  name="">
 </div>
 </div>





 </div>




 </div>



 </div>

 </div>
</div>








   <div class="box-type4">
 <div class="page-title">
    <h3 class="col-white"> Marketplace Settings </h3>
 </div>
 <div class="block-element pad-1">
 <div class="row">
  <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
 <div class="form-field3 m-t-30">
 <p> Default Marketplace Comission </p>
 <input type="text"  name="">
 </div>
 </div>
 </div>
 </div>
</div>





<div class="box-type4">
 <div class="page-title">
    <h3 class="col-white"> Security </h3>
 </div>
 <div class="block-element pad-1">
 <div class="row">
 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

 <div class="row">

 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
 <div class="form-field4 m-b-30 m-t-30">
 <button class="normal-btn bg-blue col-white rounded"> Request Password Reset </button>
 </div>
 </div>


 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
 <div class="form-field4 m-b-30 text-right mob-text-left">
 <button class="normal-btn bg-blue col-white rounded"> Save </button>
 </div>
 </div>



 </div>
 </div>
 </div>
 </div>
</div>




</div>

@endsection