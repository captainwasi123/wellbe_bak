@extends('web.includes.master')
@section('title', 'Treatments')
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
               <form method="get" action="{{route('treatments.search')}}">
                  <input type="text" placeholder="Enter your address" name="value" id="pac-input" value="{{@$value}}"> 
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
         @foreach($categories as $val)
            <div class="
               @php $default = 0; if($selected == 'all'){ $default = 1;} @endphp
               @if($selected == $val->id)
                  active
               @else
                  @if($val->category == 'Massage' && $default == 1)
                     active
                  @endif
               @endif
               {{$selected}}
            ">
               <a href="{{route('treatments')}}{{empty($value) ? '/' : '/search?value='.$value.'&cat='}}{{$val->category}}"> 
                  <img src="{{URL::to('/')}}/{{$val->image}}"> 
                  {{$val->category}}
               </a>
            </div>
         @endforeach
      </div>
      <div class="row">
         <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="sec-head2">
               <h4>
                  {{$selected == 'all' ? 'Massage' : $cat_name}}
               </h4>
            </div>
         </div>
         <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-right">
            <div class="filters-1">
               <select>
                  <option> Available Today </option>
                  <option> Available Tomorrow </option>
                  <option> Available This Week </option>
                  <option> Available Next Week </option>
                  <option> All </option>
               </select>
               <button> <i class="fa fa-sort"> </i> Filters </button>
            </div>
         </div>
      </div>
      <div class="all-practitioners">
         <div class="row">
            @foreach($users as $val)
               <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                  <a href="{{URL::to('/treatments/professional/profile/'.base64_encode($val->id))}}">
                     <div class="practitioner-box">
                        <div class="practitioner-box-image">
                           <img src="{{URL::to('/'.$val->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">
                        </div>
                        <div class="practitioner-box-text">
                           <h4> {{empty($val->first_name) ? '' : $val->first_name}} {{empty($val->last_name) ? '' : ' '.$val->last_name}} </h4>
                           <p>  {{empty($val->user_address) ? '' : $val->user_address->city}} 
                              {{empty($val->user_address->country) ? '' : ', '.$val->user_address->country->country}} <!-- <br/> 10.61 Km --> <br/> {{empty($val->user_store) ? '' : $val->user_store->offer_services.' Practitioner'}}  </p>
                           <p class="pract-price">   {{empty($val->user_store) ? '' : 'Min NZ $'.number_format($val->user_store->minimum_booking_amount, 2)}} </p>
                           <p class="pract-review"> 
                              @php $rat = $val->reviews()->avg('rating'); @endphp
                              @for($i=1; $i<=5; $i++) 
                                <i class="fa fa-star {{$i > $rat ? 'star-off' : 'star-onn'}}"> </i>
                              @endfor
                              <b> ({{count($val->reviews)}}) </b> 
                           </p>
                        </div>
                     </div>
                  </a>
               </div>
            @endforeach
            @if(count($users) == '0')
               <div class="col-md-12 empty_users">
                  <img src="{{URL::to('/public/assets/web/images/nothing-found.png')}}">
                  <h3>No Practitioner Found.</h3>
               </div>
            @endif
         </div>
      </div>
   </div>
</section>

@endsection 
@section('additionalJS')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCT7C85ghGBFoX9J9NCTAeSAOGfJR0bGvU&libraries=places"></script>
<script>
   google.maps.event.addDomListener(window, 'load', initialize);
   function initialize() {
      var input = document.getElementById('pac-input');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      // place variable will have all the information you are looking for.
   //  $('#lat').val(place.geometry['location'].lat());
   // $('#long').val(place.geometry['location'].lng());
   });
}
</script>
@endsection 