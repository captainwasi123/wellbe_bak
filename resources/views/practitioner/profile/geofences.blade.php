@extends('includes.master')
@section('title', 'General')

@section('sidebar')@include('practitioner.includes.sidebar')@endsection
@section('topbar')@include('practitioner.includes.topbar')@endsection
<style type="text/css">
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 100%;
    }

  </style>
@section('content')

 <div class="dashboard-wrapper">
    <div class="box-type4">
       <div class="page-title">
          <h3 class="col-white"> Geofences </h3>
       </div>
       <div class="block-element pad-1 m-t-20">
          <div class="row">
             <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                 <form action="{{route('practitioner.geofences.save')}}" method="post" enctype='multipart/form-data'>
                  @csrf
                    <input type="hidden" name="lat" id="lat">
                    <input type="hidden" name="long" id="long">
                    <div class="form-field3">
                   <p> REGION NAME <sup>*</sup> </p>
                   <input type="text" placeholder="Auckland" name="name" id="pac-input">
                    <div class="form-field3 pt-4">
                        <p> Service Radious <sup>*</sup> </p>
                        <input type="text" placeholder="service radious" name="radious" >
                    </div>
                    </div>
                     <div class="form-field3">
                   <p> REGION DESCRIPTION <sup>*</sup> </p>
                   <textarea placeholder="Auckland" name="description"></textarea>
                    </div>
                <div class="block-element submit-buttons text-right">
                  <button class="normal-btn rounded bg-silver col-black pad-1"> Cancel  </button>
                <button class="normal-btn rounded bg-blue col-white pad-1"> Save  </button>
                </div>
                </form>
             </div>
             <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <div class="geofence-map" id="map">

                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
@section('additionalJS')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCT7C85ghGBFoX9J9NCTAeSAOGfJR0bGvU&libraries=places"></script>
<script>
  google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
      var input = document.getElementById('pac-input');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      // place variable will have all the information you are looking for.
      $('#lat').val(place.geometry['location'].lat());
      $('#long').val(place.geometry['location'].lng());
    });
  }
</script>
<script type="text/javascript">
  var map = new google.maps.Map(document.getElementById("map"));
// Create marker 
var marker = new google.maps.Marker({
  map: map,
  position: new google.maps.LatLng(53, -2.5),
  title: 'Some location'
});

// Add circle overlay and bind to marker
var circle = new google.maps.Circle({
  map: map,
  radius: 16093,    // 10 miles in metres
  fillColor: '#AA0000'
});
circle.bindTo('center', marker, 'position');
    </script>
@endsection
