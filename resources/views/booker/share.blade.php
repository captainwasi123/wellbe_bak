@extends('includes.master')
@section('title', 'Share')

@section('sidebar')@include('booker.includes.sidebar')@endsection
@section('topbar')@include('booker.includes.topbar')@endsection

@section('content')
         <div class="dashboard-wrapper">


             <div class="treat-wrapper">

              <div class="treat-head">
            <h3> Send your friend a treat! <b> . </b> </h3>
              </div>

              <div class="treat-box">
               <img src="{{URL::to('/')}}/public/assets/images/treat-image.png">
               <p> Feeling generous? Provide this code to a friend to give them 10% off their next treatment! Code can only be used once per account. </p>
               <input type="text" value="eguwdud1xahk" name="">

               <h5> Share on </h5>
               <h6> <a href=""> <img src="{{URL::to('/')}}/public/assets/images/fb-icon.png"> </a> <a href=""> <img src="{{URL::to('/')}}/public/assets/images/twitter-icon.png"> </a>  <a href=""> <img src="{{URL::to('/')}}/public/assets/images/whatsapp-icon.png"> </a></h6>
              </div>

             </div>
            </div>




      </section>
      <!-- All Dashboard Content Ends Here -->
      @endsection

