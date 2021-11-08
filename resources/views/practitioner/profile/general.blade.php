@extends('includes.master')
@section('title', 'General')

@section('sidebar')@include('practitioner.includes.sidebar')@endsection
@section('topbar')@include('practitioner.includes.topbar')@endsection

@section('content')

<div class="dashboard-wrapper">
   <form action="{{route('practitioner.profile.save')}}" method="post" enctype='multipart/form-data'>
   @csrf
   <input type="hidden" name="user_id" value="{{$user_data->id}}">
   <div class="box-type4">
      <div class="page-title">
         <h3 class="col-white"> General </h3>
      </div>
   <div class="block-element pad-1">
      <div class="row">
         <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
            <div class="block-element m-t-15 m-b-10">
               <h4 class="col-blue"> General </h4>
            </div>
            <div class="row">
               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="form-field3 m-t-20">
                     <div class="form-group mb-3 profileImageBlock">
                         @if(empty($user_data->profile_img))
                           <p>Upload Profile Photo</p>
                         @endif
                         <img id="profileImage" class="profile_picture" src="{{URL::to('')}}/{{$user_data->profile_img}}" onerror="this.src = '{{URL::to('/public/')}}/img_placeholder.jpg';" style="width: 110px;">
                        <!--  <span class="fas fa-pencil-alt" id="profilePicIcon"></span> -->
                         <input type="file" class="form-control" name="profile_img" id="imageUpload" style="display: none;" accept=".jpeg , .jpg">
                        <!-- <p> Profile Photo <input type="file" name="profile_img" class="bg-blue normal-btn col-white pad-1 rounded"></p> -->
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> First Name/display name </p>
                     <input type="text"  name="first_name" value="{{$user_data->first_name}}">
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> Last name </p>
                     <input type="text"  name="last_name" value="{{$user_data->last_name}}">
                  </div>
               </div>
               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> Email </p>
                     <input type="email"  name="email" value="{{$user_data->email}}" readonly>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> Phone </p>
                     <input type="text"  name="phone" value="{{$user_data->phone}}">
                  </div>
               </div>
               <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> Gender </p>
                     <select name="gender" class="form-control">
                        <option value="male" {{ isset($user_data) && 'male' == @$user_data->gender ? 'selected' : ''}}> Male </option>
                        <option value="female" {{ isset($user_data) && 'female' == @$user_data->gender ? 'selected' : ''}}> Female </option>
                        <option value="other" {{ isset($user_data) && 'other' == @$user_data->gender ? 'selected' : ''}}> Other </option>
                     </select>
                  </div>
               </div>
               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> Bio/Your Experience </p>
                     <input type="text"  name="bio" value="{{$user_data->bio_description}}">
                  </div>
               </div>

            <div class="block-element">
               <h4 class="col-blue"> Address </h4>
            </div>
            <div class="row m-b-20">
               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> Street </p>
                     <textarea name="street">{{empty($user_data->user_address) ? '' : $user_data->user_address->street}}</textarea>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> Suburb </p>
                     <input type="text" name="suburb" value="{{empty($user_data->user_address) ? '' : $user_data->user_address->suburb}}">
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> City </p>
                     <input type="text" name="city" value="{{empty($user_data->user_address) ? '' : $user_data->user_address->city}}">
                  </div>
               </div>
               <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> Post code </p>
                     <input type="text" name="postcode" value="{{empty($user_data->user_address) ? '' : $user_data->user_address->postcode}}">
                  </div>
               </div>
               <!-- <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> State </p>
                     <input type="text" name="state" value="{{empty($user_data->user_address) ? '' : $user_data->user_address->state}}">
                  </div>
               </div>
               <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                  <div class="form-field3">
                     <p> Country </p>
                     <select name="country" id="" class="form-control">
                        <option value="">select...</option>
                        @foreach($country_data as $country_data)
                         <option value="{{$country_data->id}}" {{ !empty($user_data->user_address) && $country_data->id == @$user_data->user_address->country_id ? 'selected' : ''}}>{{$country_data->country}}</option>
                        @endforeach
                     </select>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
         <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
            <div class="block-element m-t-15 m-b-10" style="position: relative;">
               <h4 class="col-blue"> Store </h4>
               <div class="store-status">
                  <span> Status: <b class="col-blue"> {{Auth::user()->status == '1' ? 'Active' : 'In-Active'}} </b> </span>
               </div>
            </div>
            <!-- <div class="form-field3">
               <p> Where do you offer services? </p>
               <div class="drop-options">
                  <span> <input type="radio" name="offer_services" value="mobile" {{ isset($user_data) && 'mobile' == @$user_data->user_store->offer_services ? 'checked' : ''}} required> Mobile </span>
                  <span> <input type="radio" name="offer_services" value="my_address" {{ isset($user_data) && 'my_address' == @$user_data->user_store->offer_services ? 'checked' : ''}}> My Address </span>
                  <span> <input type="radio" name="offer_services" value="both" {{ isset($user_data) && 'both' == @$user_data->user_store->offer_services ? 'checked' : ''}}> Both  </span>
               </div>
            </div> -->
            <div class="form-field3">
               <p> Service Radius <a href="{{route('practitioner.geofences')}}" style="margin-left: 10px;" class="bg-blue normal-btn pad-1 col-white rounded"> Show Service Radius </a>  </p>
            </div>
            {{--  <div class="form-field3">
               <p> Minimum Booking Amount </p>
               <input type="text" name="minimum_booking_amount" value="{{empty($user_data->user_store) ? '' : $user_data->user_store->minimum_booking_amount}}" style="padding-left: 25px;" required>
               <b class="info-tag1 col-blue" style="display: inline-block; width: 20px; margin-top: -28px; vertical-align: top; margin-left: 8px;"> $ </b>
            </div>  --}}
            <div class="form-field3">
               <p> Buffer Between Appointments (Minutes) </p>
               <input type="text" name="buffer_between_appointments" value="{{empty($user_data->user_store) ? '' : $user_data->user_store->buffer_between_appointments}}" required>
            </div>
            <div class="block-element m-t-15 m-b-10">
               <h4 class="col-blue"> Payout Details </h4>
            </div>
            <div class="form-field3">
               <p>  Bank Account Name  </p>
               <input type="text" name="bank_name" value="{{empty($user_data->users_payout_details) ? '' : $user_data->users_payout_details->bank_account_name}}" required>
            </div>
            <div class="form-field3">
               <p> Bank Account Number </p>
               <input type="text" name="account_number" value="{{empty($user_data->users_payout_details) ? '' : $user_data->users_payout_details->bank_account_number}}" required>
            </div>
            <div class="bg-silver block-element m-t-20 m-b-20" style="padding:20px">
               @if(Auth::user()->status == '1')
                  <div class="form-field3">
                     <p> Store Page </p>
                     <div class="drop-options">
                        <span> <input type="radio" name="store_status" value="1" {{$user_data->store_status == '1' ? 'checked' : ''}}> Enabled </span>
                        <span> <input type="radio" name="store_status" value="0" {{$user_data->store_status == '0' ? 'checked' : ''}}> Disabled </span>
                     </div>
                  </div>
                  @if(Session::has('user_type'))
                     <div class="form-field3">
                        <p> Marketplace Comission </p>
                        <input type="text" name="" readonly value="{{$gst->gst}}">
                     </div>
                     <div class="form-field3">
                        <p> Account Type  </p>
                        <div class="drop-options">
                           <span> <input type="radio" name="" checked disabled> Standard </span>
                           <span> <input type="radio" name="" disabled> Featured </span>
                           <span> <input type="radio" name="" disabled> Partner </span>
                        </div>
                     </div>
                  @endif
               @else
                  <div class="form-field3">
                     <p> Store Page </p>
                     <div class="drop-options">
                        <span> <input type="radio" name="store_status" value="1" disabled> Enabled </span>
                        <span> <input type="radio" name="store_status" value="0" disabled> Disabled </span>
                     </div>
                  </div>
                  @if(Session::has('user_type'))
                     <div class="form-field3">
                        <p> Marketplace Comission </p>
                        <input type="text" name="" readonly value="{{$gst->gst}}" disabled>
                     </div>
                     <div class="form-field3">
                        <p> Account Type  </p>
                        <div class="drop-options">
                           <span> <input type="radio" name="" checked disabled> Standard </span>
                           <span> <input type="radio" name="" disabled> Featured </span>
                           <span> <input type="radio" name="" disabled> Partner </span>
                        </div>
                     </div>
                  @endif
               @endif
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
   <div class="page-title m-b-25">
      <h3 class="col-white"> Security </h3>
   </div>
   <div class="block-element pad-1 m-b-15">
    <form action="{{ route('practitioner.profile.change_password') }}" method="post">
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
                    <p> Confirm Password </p>
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
<script type="text/javascript">
 $(document).ready(function () {
  $(":input").change(function(){
    $(window).on('beforeunload', function(){
        return "You have unsaved changes!";
    });
  });
    $(document).on("submit", "form", function(event){
        $(window).off('beforeunload');
    });
}); 
</script>
<script type="text/javascript">
$(document).ready(function(){    
    $(document).on('click', '#profileImage', function() {
        $("#imageUpload").click();
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var fileInput = document.getElementById('imageUpload'); 
            var filePath = fileInput.value; 
            var allowedExtensions =  
                            /(jpeg|jpg)$/i; 
                       
                    if (!allowedExtensions.exec(filePath)) { 
                        $('#file_error').append('File format is not supported, Please upload a file in JPEG or JPG format');
                        $('#submit').attr('disabled', true);
                        fileInput.value = ''; 
                        return false; 
                    }else{ 
                        $('#file_error').empty();
                        $('#submit').attr('disabled', false);
                    }


            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#profileImage').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }


    $("#imageUpload").change(function() {
      readURL(this);
    });

});
</script>
@endsection
