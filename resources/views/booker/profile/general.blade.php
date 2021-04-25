@extends('includes.master')
@section('title', 'General')

@section('sidebar')@include('booker.includes.sidebar')@endsection
@section('topbar')@include('booker.includes.topbar')@endsection

@section('content')
         <div class="dashboard-wrapper">
            <div class="box-type4">
         <div class="page-title">
            <h3 class="col-white"> General </h3>
         </div>
         <div class="block-element pad-1">

   <form action="{{route('booker.profile.save')}}" method="post" enctype='multipart/form-data'>
   @csrf
   <input type="hidden" name="user_id" value="{{$user_data->id}}">
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

         <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
         <div class="form-field3">
         <p> Email Address </p>
         <input type="email"  name="email" value="{{@$user_data->email}}" readonly>
         </div>
         </div>


         <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
         <div class="form-field3">
         <p> Phone Number </p>
         <input type="number"  name="phone" value="{{@$user_data->phone}}">
         </div>
         </div>





         </div>

         <div class="block-element">
         <h4 class="col-blue"> Address </h4>
         </div>

         <div class="row m-b-20">

          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
         <div class="form-field3">
         <p> Street </p>
         <textarea name="street">{{@$user_data->user_address->street}}</textarea>
         </div>
         </div>

          <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
         <div class="form-field3">
         <p> Suburb </p>
         <input type="text" name="suburb" value="{{@$user_data->user_address->suburb}}">
         </div>
         </div>

         <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
         <div class="form-field3">
         <p> City </p>
         <input type="text" name="city" value="{{@$user_data->user_address->city}}">
         </div>
         </div>


         <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
         <div class="form-field3">
         <p> Post code </p>
         <input type="text" name="postcode" value="{{@$user_data->user_address->postcode}}"> 
         </div>
         </div>

         <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
         <div class="form-field3">
         <p> State </p>
         <input type="text" name="state" value="{{@$user_data->user_address->state}}">
         </div>
         </div>

         <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
         <div class="form-field3">
         <p> Country </p>
         <select name="country" id="">
            <option value="">select...</option>
            @foreach($country_data as $country_data)
               <option value="{{$country_data->id}}" {{ isset($user_data) && $country_data->id == @$user_data->user_address->country_id ? 'selected' : ''}}>{{$country_data->country}}</option>
            @endforeach
         </select>
         </div>
         </div>

         </div>



         </div>



         </div>
     
         </div>
      </div>








           <div class="box-type4">
         <div class="page-title">
            <h3 class="col-white"> Marketing </h3>
         </div>
         <div class="block-element pad-1">
         <div class="row">
         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
         <div class="block-element m-t-15 m-b-10">
         <h4 class="col-blue"> Newsletter </h4>
         </div>
         <div class="row">

         <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
         <div class="form-field4 m-b-30">
         <input type="checkbox" name="newsletter" value="1" {{ isset($user_data) && $user_data->newsletter == 1 ? 'checked' : ''  }}> Subscribe to Newsletter
         </div>
         </div>
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
         <div class="block-element m-t-15 m-b-10">
         <h4 class="col-blue"> Reset Password </h4>
         </div>
         <div class="row">

         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
         <div class="form-field4 m-b-30">
         <button class="normal-btn bg-blue col-white rounded"> Request Password Reset </button>
         </div>
         </div>


         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
         <div class="form-field4 m-b-30 text-right mob-text-left">
         <button class="normal-btn bg-blue col-white rounded" type="submit"> Save </button>
         </div>
         </div>

         </form>

         </div>
         </div>
         </div>
         </div>
      </div>




      </section>
      <!-- All Dashboard Content Ends Here -->
      <!-- Bootstrap Javascript -->
      @endsection
