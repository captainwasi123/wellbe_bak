@extends('web.includes.master')
@section('title', 'Professionals')
@section('content')

<section class="all-content bg-pink pad-top-40 pad-bot-40">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="textual-content1">
               <h4> Treatments </h4>
               <p style="max-width: 490px;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. 
               </p>
            </div>
         </div>
         <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="appointment-box" style="margin-top: 25px;">
               <h4 style="margin-bottom: 12px;"> Your Address </h4>
               <form>
                  <input type="text" placeholder="14 to Puni Grove" name="">
                  <button> <i class="fa fa-search"> </i> </button>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>


<section class="all-content pad-top-40 pad-bot-40 bg-blue">
   <div class="container">
      <div class="treatment-triggers">
         <div>
            <a href=""> <img src="{{URL::to('/')}}/public/assets/web/images/treatment-icon1.jpg"> All Services </a>
         </div>
         <div  class="active">
            <a href=""> <img src="{{URL::to('/')}}/public/assets/web/images/treatment-icon2.jpg"> Massage </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/')}}/public/assets/web/images/treatment-icon3.jpg"> Hair </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/')}}/public/assets/web/images/treatment-icon4.jpg"> Brows and Lashes </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/')}}/public/assets/web/images/treatment-icon5.jpg"> Nails </a>
         </div>
         <div>
            <a href=""> <img src="{{URL::to('/')}}/public/assets/web/images/treatment-icon6.jpg"> Make Up </a>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="sec-head2">
               <h4> Massage </h4>
            </div>
         </div>
         <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-right">
            <div class="filters-1">
               <select>
                  <option> Available Today </option>
                  <option> Available Today </option>
                  <option> Available Today </option>
                  <option> Available Today </option>
               </select>
               <button> <i class="fa fa-sort"> </i> Filters </button>
            </div>
         </div>
      </div>
      <div class="all-practitioners">
         <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
               <div class="practitioner-box">
                  <div class="practitioner-box-image">
                     <img src="{{URL::to('/')}}/public/assets/web/images/practitioner1.jpg">
                  </div>
                  <div class="practitioner-box-text">
                     <h4> Josh  </h4>
                     <h5> Wellington New Zealand </h5>
                     <p> 10.61 Km <br/> Mobile Practitioner  </p>
                     <p> <b class="point-1"> . </b> Min NZ$80.00 </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
               <div class="practitioner-box">
                  <div class="practitioner-box-image">
                     <img src="{{URL::to('/')}}/public/assets/web/images/practitioner1.jpg">
                  </div>
                  <div class="practitioner-box-text">
                     <h4> Paige </h4>
                     <h5> Wellington New Zealand </h5>
                     <p> 10.61 Km <br/> Mobile Practitioner  </p>
                     <p> <b class="point-1"> . </b> Min NZ$80.00 </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
               <div class="practitioner-box">
                  <div class="practitioner-box-image">
                     <img src="{{URL::to('/')}}/public/assets/web/images/practitioner1.jpg">
                  </div>
                  <div class="practitioner-box-text">
                     <h4> Josh  </h4>
                     <h5> Wellington New Zealand </h5>
                     <p> 10.61 Km <br/> Mobile Practitioner  </p>
                     <p> <b class="point-1"> . </b> Min NZ$80.00 </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
               <div class="practitioner-box">
                  <div class="practitioner-box-image">
                     <img src="{{URL::to('/')}}/public/assets/web/images/practitioner1.jpg">
                  </div>
                  <div class="practitioner-box-text">
                     <h4> Paige </h4>
                     <h5> Wellington New Zealand </h5>
                     <p> 10.61 Km <br/> Mobile Practitioner  </p>
                     <p> <b class="point-1"> . </b> Min NZ$80.00 </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
               <div class="practitioner-box">
                  <div class="practitioner-box-image">
                     <img src="{{URL::to('/')}}/public/assets/web/images/practitioner1.jpg">
                  </div>
                  <div class="practitioner-box-text">
                     <h4> Josh  </h4>
                     <h5> Wellington New Zealand </h5>
                     <p> 10.61 Km <br/> Mobile Practitioner  </p>
                     <p> <b class="point-1"> . </b> Min NZ$80.00 </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
               <div class="practitioner-box">
                  <div class="practitioner-box-image">
                     <img src="{{URL::to('/')}}/public/assets/web/images/practitioner1.jpg">
                  </div>
                  <div class="practitioner-box-text">
                     <h4> Paige </h4>
                     <h5> Wellington New Zealand </h5>
                     <p> 10.61 Km <br/> Mobile Practitioner  </p>
                     <p> <b class="point-1"> . </b> Min NZ$80.00 </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection