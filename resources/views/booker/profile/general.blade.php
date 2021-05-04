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

      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="form-field4 m-b-30 text-right mob-text-left">
               <input type="submit" class="normal-btn bg-blue col-white rounded" value="Update Profile">
            </div>
          </div>
      </div>
    </form>




       <div class="box-type4">
         <div class="page-title">
            <h3 class="col-white"> Security </h3>
         </div>
         <div class="block-element pad-1">
            <form action="{{ route('booker.profile.update_password') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="form-field3 m-t-10">
                            <p>Current Password </p>
                            <input type="password" name="current_password" id="old_password" value="{{ empty($old_password) ? "" : $old_password }}" minlength="8" required>
                            <span id="old"></span>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="form-field3 m-t-10">
                            <p> New Password </p>
                            <input type="password" name="new_password" id="password" value="{{ empty($new_password) ? "" : $new_password }}" minlength="8" required>
                            <span id="old1"></span>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="form-field3 m-t-10">
                            <p> Conform Password </p>
                            <input type="password" name="confirm_password" id="conform_password" value="{{ empty($confirm_password) ? "" : $confirm_password }}" minlength="8" required>
                            <span id="error"></span><br>
                            <span id="old2"></span>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{\Auth::user()->id}}">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="form-field4 m-b-30 text-right mob-text-left">
                           <input id="register" type="submit" class="normal-btn bg-blue col-white rounded" value="Submit">
                        </div>
                      </div>
                </div>
            </form>
         </div>
      </div>




      </section>
      <!-- All Dashboard Content Ends Here -->
      <!-- Bootstrap Javascript -->
      @endsection
      @section('additionalJS')
      <script type="text/javascript">

            $("#old_password").keyup(function(){
                var old = $("#old_password").val();
                if(old.length >= 8){
                    $('#old').html('');
                    $("#old_password").removeAttr("style");
                    $('#register').prop('disabled', false);
                }else{
                    $('#old').html('Please enter the password more then 8 characters');
                    $('#old').css('color', 'red');
                    $("#old_password").css('border-color','red');
                    $('#register').prop('disabled', true);
                }
            })

            $("#password").keyup(function(){
                var old = $("#password").val();
                if(old.length >= 8){
                    $('#old1').html('');
                    $("#password").removeAttr("style");
                    $('#register').prop('disabled', false);
                }else{
                    $('#old1').html('Please enter the password more then 8 characters');
                    $('#old1').css('color', 'red');
                    $("#password").css('border-color','red');
                    $('#register').prop('disabled', true);
                }
            })

            $("#conform_password").keyup(function(){
                var old = $("#conform_password").val();
                if(old.length >= 8){
                    $('#old2').html('');
                    $("#conform_password").removeAttr("style");
                    $('#register').prop('disabled', false);
                }else{
                    $('#old2').html('Please enter the password more then 8 characters');
                    $('#old2').css('color', 'red');
                    $("#conform_password").css('border-color','red');
                    $('#register').prop('disabled', true);
                }
            })


            $("#conform_password").keyup(function () {
                var old = $("#old_password").val();
                var conform_password = $("#conform_password").val()
                var password = $("#password").val()
                if (password != conform_password) {

                    $('#error').html('Please enter the same password as above');
                    $('#error').css('color', 'red');
                    $('#register').prop('disabled', true);

                }else{
                    $('#error').html('');
                    $('#register').prop('disabled', false);
                }
            });
      </script>
      @endsection
