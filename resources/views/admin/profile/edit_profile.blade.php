@extends('includes.master')
@section('title', 'Profile')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")

<div class="dashboard-wrapper">
    @if (count($errors))
@foreach ($errors->all() as $error)
  <p class="alert alert-danger">{{$error}}</p>
@endforeach
@endif
    <div class="box-type4">
 <div class="page-title">
    <h3 class="col-white"> General </h3>
 </div>
 <div class="block-element pad-1">

<form action="{{route('admin.update_profile')}}" method="post">
@csrf
 <div class="row">

 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
 <div class="block-element m-t-15 m-b-10">
 <h4 class="col-blue"> General </h4>
 </div>
 <div class="row">

 <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
 <div class="form-field3">
 <p> First Name/display name </p>
 <input type="text"  name="first_name" value="{{@$user_data->first_name}}">
 </div>
 </div>

 <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
 <div class="form-field3">
 <p> Last name </p>
 <input type="text"  name="last_name" value="{{@$user_data->last_name}}">
 </div>
 </div>

 </div>


 <div class="row">

 <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
 <div class="form-field3">
 <p> Email Address </p>
 <input type="email"  name="" value="{{@$user_data->email}}" readonly>
 </div>
 </div>
 </div>

 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
   <div class="form-field4 m-b-30 text-right mob-text-left">
      <button class="normal-btn bg-blue col-white rounded"> Save </button>
   </div>
 </div>
 </form>

 </div>



 </div>

 </div>
</div>








   <div class="box-type4">
 <div class="page-title">
    <h3 class="col-white"> Marketplace Settings </h3>
 </div>
 <div class="block-element pad-1">
 <form action="{{route('admin.update.comission')}}" method="post">
 @csrf
 <div class="row">
  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
 <div class="form-field3 m-t-30">
 <p> Default Marketplace Comission (%) </p>
 <input type="number"  name="comission" value="{{empty($marketplace_data->comission) ? '0' : $marketplace_data->comission}}">
 </div>
 </div>
 <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
 <div class="form-field3 m-t-30">
 <p> Default Marketplace GST (%)</p>
 <input type="number"  name="gst" value="{{empty($marketplace_data->gst) ? '0' : $marketplace_data->gst}}">
 </div>
 </div>
 </div>
 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
   <div class="form-field4 m-b-30 text-right mob-text-left">
      <button class="normal-btn bg-blue col-white rounded"> Save </button>
   </div>
 </div>
 </form>
 </div>
</div>





<div class="box-type4">
 <div class="page-title">
    <h3 class="col-white"> Security </h3>
 </div>
 <div class="block-element pad-1">
 <div class="row">
 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">



    <form action="{{ route('admin.change_password') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <div class="form-field3 m-t-10">
                    <p>Current Password </p>
                    <input type="password" name="current_password" value="{{ empty($old_password) ? "" : $old_password }}">
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <div class="form-field3 m-t-10">
                    <p> New Password </p>
                    <input type="password" name="new_password" id="password" value="{{ empty($new_password) ? "" : $new_password }}">
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <div class="form-field3 m-t-10">
                    <p> Conform Password </p>
                    <input type="password" name="confirm_password" id="conform_password" value="{{ empty($confirm_password) ? "" : $confirm_password }}">
                    <span id="error"></span>
                </div>
            </div>
            <input type="hidden" name="id" value="{{empty(\Auth::guard('admin')->user()->id) ? '' : ' '.\Auth::guard('admin')->user()->id}}">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="form-field4 m-b-30 text-right mob-text-left">
                   <input id="register" type="Submit" class="normal-btn bg-blue col-white rounded" value="submit">
                </div>
              </div>
        </div>
    </form>






 </div>
 </div>
</div>




</div>

@endsection
@section('additionalJS')
<script type="text/javascript">


    $("#conform_password").keyup(function () {
        var conform_password = $("#conform_password").val()
        var password = $("#password").val()
        if (password != conform_password) {
            $('#error').html('Please enter the same password as above');
            $('#register').prop('disabled', true);

        }else{
            $('#error').html('');
            $('#register').prop('disabled', false);
        }
    });

</script>
@endsection
