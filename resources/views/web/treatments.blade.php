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
         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="sec-head2">
               <h4>
                  {{$selected == 'all' ? 'Massage' : $cat_name}}
               </h4>
            </div>
         </div>
      </div>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script type="text/javascript">
(function( $ ){
   $( document ).ready( function() {
      $( '.input-range1').each(function(){
         var value = $(this).attr('data-slider-value');
         var separator = value.indexOf(',');
         var range = [$( this ).attr('data-slider-min'), $( this ).attr('data-slider-max')];
         if( separator !== -1 ){
            value = value.split(',');
            value.forEach(function(item, i, arr) {
               arr[ i ] = parseFloat( item );
            });
         } else {
            value = parseFloat( value );
         }
         $( this ).slider({
            formatter: function(value) {
               if(value[0] > (range[0]-1) && value[0] < (range[1] + 1)){
                  $('#min-range1').val(value[0]);
                  $('#max-range1').val(value[1]);
               }
               return value;
            },
            min: parseFloat( $( this ).attr('data-slider-min') ),
            max: parseFloat( $( this ).attr('data-slider-max') ), 
            range: $( this ).attr('data-slider-range'),
            value: value,
            tooltip_split: $( this ).attr('data-slider-tooltip_split'),
            tooltip: $( this ).attr('data-slider-tooltip')
         });
      });

      $( '.input-range2').each(function(){
         var value = $(this).attr('data-slider-value');
         var separator = value.indexOf(',');
         var range = [$( this ).attr('data-slider-min'), $( this ).attr('data-slider-max')];
         if( separator !== -1 ){
            value = value.split(',');
            value.forEach(function(item, i, arr) {
               arr[ i ] = parseFloat( item );
            });
         } else {
            value = parseFloat( value );
         }
         $( this ).slider({
            formatter: function(value) {
               if(value[0] > (range[0]-1)){
                  $('#min-range2').val(value[0]);
                  $('#max-range2').val(value[1]);
               }
               return value;
            },
            min: parseFloat( $( this ).attr('data-slider-min') ),
            max: parseFloat( $( this ).attr('data-slider-max') ), 
            range: $( this ).attr('data-slider-range'),
            value: value,
            tooltip_split: $( this ).attr('data-slider-tooltip_split'),
            tooltip: $( this ).attr('data-slider-tooltip')
         });
      });
   });
})( jQuery );

</script>
<hr>
<style type="text/css">

#boxes {
  display: flex;                  /* establish flex container */
  flex-direction: row;            /* default value; can be omitted */
  flex-wrap: nowrap;              /* default value; can be omitted */
  justify-content: space-between; /* switched from default (flex-start, see below) */

}
#boxes > div {
    width: 35px;
}
#boxess {
  display: flex;                  /* establish flex container */
  flex-direction: row;            /* default value; can be omitted */
  flex-wrap: nowrap;              /* default value; can be omitted */
  justify-content: space-between; /* switched from default (flex-start, see below) */

}
#boxess > div {
    width: 50px;
}
</style>
      <div class="row">
         <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 text-right">
            <div class="slider-wrapper">
               <p style="text-align: left;"><b>Rating:</b></p>
                  <input class="input-range1" data-slider-id='ex12cSlider' type="text" data-slider-step="1" data-slider-value="{{isset($rating) ? $rating : '0, 5'}}" data-slider-min="0" data-slider-max="5" data-slider-range="true" data-slider-tooltip_split="true" name="rating" />
                  <div id="boxes">
                     <div>
                        <input type="text" id="min-range1" name="" style="width: 100%;">
                     </div> 
                     <div>
                        <input type="text" id="max-range1" name="" style="width: 100%;">
                     </div>
                   
                  </div>
            </div>
         </div>
            <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 text-right">
               <div class="slider-wrapper">
                  <p style="text-align: left;"><b>Pricing:</b></p>
                  <input class="input-range2" data-slider-id='ex12cSlider' type="text" data-slider-step="1" data-slider-value="{{isset($price) ? $price : '30, 80'}}" data-slider-min="0" data-slider-max="100" data-slider-range="true" data-slider-tooltip_split="true" name="price" />
                   <div id="boxess">
                     <div>
                        <input type="text" id="min-range2" name="" style="width: 100%;">
                     </div>
                     <div>
                        <input type="text" id="max-range2" name="" style="width: 100%;">
                     </div>
                  </div>                  
               </div>
            </div>
   
   
         <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 text-right">
          
            <div class="filters-1">
               <p></p>
             <?php $today = date('Y-m-d');
               if(date('D')!='Mon')
               {    
                //take the last monday
                 $currentWeekStart = date('Y-m-d',strtotime('last Monday')); 
               
               }else{
                  $currentWeekStart = date('Y-m-d');   

               }
               
               //always next saturday
               
               if(date('D')!='Sat')
               {
                  $currentWeekfinish = date('Y-m-d',strtotime('next Saturday'));

               }else{
               
                  $currentWeekfinish = date('Y-m-d');
               }
             ?>
               <select name="filter">
                  <option value="">select...</option>
                  <option value="all"> All </option>
                  <option value="{{$today}}" {{isset($filter) && $filter == $today ? 'selected' : '' }}> Available Today</option>
                  <option value='{{date("Y-m-d", strtotime($today. "+1 days"))}}' {{isset($filter) && $filter == date("Y-m-d", strtotime($today. "+1 days")) ? 'selected' : '' }}> Available Tomorrow </option>
                  <option value="<?php echo $currentWeekStart.','.$currentWeekfinish ?>" {{isset($filter) && $filter == $currentWeekStart.','.$currentWeekfinish ? 'selected' : '' }}> Available This Week</option>
                  <option value="<?php echo date('Y-m-d',strtotime('+1 week last Monday'))  .','. date('Y-m-d',strtotime('+1 week last Sunday')) ?>" {{isset($filter) && $filter == date('Y-m-d',strtotime('+1 week last Monday'))  .','. date('Y-m-d',strtotime('+1 week last Sunday')) ? 'selected' : '' }}> Available Next Week</option>
               </select>
               <button> </i> Search </button>
            </form>   
            </div>
         </div>
      </div>



      <div class="all-practitioners">
         <div class="row">
            @if(!empty(@$value))
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
            @else
               <div class="col-md-12 empty_users">
                  <img src="{{URL::to('/public/assets/web/images/nothing-found.png')}}">
                  <h3>Enter your address above to search for practitioners in your area.</h3>
               </div>
            @endif
            @if(count($users) == '0')
               <div class="col-md-12 empty_users">
                  <img src="{{URL::to('/public/assets/web/images/nothing-found.png')}}">
                  @if(!empty(@$value) && empty(@$filter)) 
                  <h3>Sorry, no practitioners are available in your area.</h3>
                  @endif
                  @if(empty(@$value))
                     <h3>Enter your address above to search for practitioners in your area.</h3>
                  @endif
                  @if(!empty(@$filter))
                     <h3>Sorry, no practitioners are available. Try another date/time.</h3>
                  @endif
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