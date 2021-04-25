@extends('includes.master')
@section('title', 'Cancelled Bookings')

@section('sidebar')@include('practitioner.includes.sidebar')@endsection
@section('topbar')@include('practitioner.includes.topbar')@endsection

@section('content')

    <div class="dashboard-wrapper">
            <div class="box-type4">
              
              <div class="change-plan-head">
              <h3 class="col-black"> Change Plan </h3>
              </div> 

              <div class="plan-triggers">
              <ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">SEMI ANUALLY</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">ANUALLY</a>
  </li>
 
</ul><!-- Tab panes -->
<h5 class="col-blue2 text-center m-b-20 m-t-15"> Know more about pricing </h5>

              </div>


              <div class="block-element pad-1">

              <div class="tab-content">
  <div class="tab-pane active" id="tabs-1" role="tabpanel">
    <div class="row">
      @foreach($plan_data as $val)
        @if($val->billing_type_id == 1)
              <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 pad-2">  
                <div class="plan-box">
                  <img src="{{URL::to('/')}}/public/assets/{{$val->image}}">
                  <h5> {{$val->title}} </h5> 
                  <h3> <span>$</span> {{$val->price}} <span>/mo</span> </h3>
                  <h4> (Billed Annually) </h4>
                  <ul>
                    @foreach($val->plan_detail as $details)
                    <li> <i class="fa fa-check"> </i> {{$details->feature_item}} </li>
                    @endforeach
                  </ul>
                  <a href="{{route('practitioner.plan.buy',base64_encode($val->id))}}"> CHOOSE PLAN </a>
                </div>
              </div>
        @endif      
      @endforeach        
    </div>
  </div>
  <div class="tab-pane" id="tabs-2" role="tabpanel">
    <div class="row">
      @foreach($plan_data as $val2)
        @if($val2->billing_type_id == 2)
              <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 pad-2">  
                <div class="plan-box">
                  <img src="{{URL::to('/')}}/public/assets/{{$val->image}}">
                  <h5> {{$val2->title}} </h5> 
                  <h3> <span>$</span> {{$val2->price}} <span>/mo</span> </h3>
                  <h4> (Billed Annually) </h4>
                  <ul>
                    @foreach($val2->plan_detail as $details)
                    <li> <i class="fa fa-check"> </i> {{$details->feature_item}} </li>
                    @endforeach
                  </ul>
                  <a href="{{route('practitioner.plan.buy',base64_encode($val2->id))}}"> CHOOSE PLAN </a>
                </div>
              </div>
        @endif      
      @endforeach  

    </div>
  </div>
 
</div>



             

              </div>

              <div class="block-element text-center m-t-20 m-b-20">
              <h6> <a href=""> Terms & Conditions </a> Apply </h6>  
              </div>
              
            </div>
         </div>

@endsection
