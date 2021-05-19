@extends('includes.master')
@section('title', 'GeoFence Practitioner')

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
                    <input type="hidden" name="lat" id="lat" value="{{empty(Auth::user()->ugeofence) ? '' : Auth::user()->ugeofence->lat}}">
                    <input type="hidden" name="long" id="long" value="{{empty(Auth::user()->ugeofence) ? '' : Auth::user()->ugeofence->lng}}">
                    <div class="form-field3">
                   <p> REGION NAME <sup>*</sup> </p>
                   <input type="text" placeholder="Auckland" name="name" id="pac-input" value="{{empty(Auth::user()->ugeofence) ? '' : Auth::user()->ugeofence->name}}" required>
                    <div class="form-field3 pt-4">
                        <p> Service Radius (km) <sup>*</sup> </p>
                        <input type="text" placeholder="service radius" name="radious" value="{{empty(Auth::user()->ugeofence) ? '' : Auth::user()->ugeofence->radious}}" required>
                    </div>
                    </div>
                     <div class="form-field3">
                   <p> REGION DESCRIPTION <sup>*</sup> </p>
                   <textarea placeholder="Auckland" name="description" required>{{empty(Auth::user()->ugeofence) ? '' : Auth::user()->ugeofence->description}}</textarea>
                    </div>
                <div class="block-element submit-buttons text-right">
                  <button type="reset" class="normal-btn rounded bg-silver col-black pad-1"> Cancel  </button>
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
@section('additionalCSS')
  <style type="text/css">
    .create_Circle {
        background: url(buffer.png) no-repeat;
        width: 41px;
        margin: 0px 8px 0 0px;
        float: left;
        cursor: pointer;
        z-index: 2;
        height: 41px;
    }

    .remove_Circle {
        background: url(close.png) no-repeat;
        width: 41px;
        margin: 0px 8px 0 0px;
        float: left;
        cursor: pointer;
        z-index: 2;
        height: 41px;
    }
  </style>
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
@if(!empty(Auth::user()->ugeofence))
    <script type="text/javascript">
      window.onload = function(e){ 
        var lat = '{{Auth::user()->ugeofence->lat}}';
        var lng = '{{Auth::user()->ugeofence->lng}}';
        var rad = '{{Auth::user()->ugeofence->radious}}';

        initialize(lat, lng); 
        createCircle(lat, lng, rad);
      }

      var circleClusterremove = [];
      var buffer_circle = null;
      // To load google map
      function initialize(lat, lng) {
          var mapOptions = {
              center: new google.maps.LatLng(lat, lng),
              zoom: 11,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById('map'), mapOptions);
          map.setMapTypeId(google.maps.MapTypeId.ROADMAP);

          new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            map,
            title: "Practitioner",
          });
      }

      // Draw circle with in radius
      function createCircle(lat, lng, rad) {
          var rad = rad; // can input dynamically
          rad *= 1000; // convert to meters if in miles
          if (buffer_circle != null) {
              buffer_circle.setMap(null);
          }
          buffer_circle = new google.maps.Circle({
              center: new google.maps.LatLng(lat, lng),
              radius: rad,
              strokeColor: "#404780",
              strokeOpacity: 0.8,
              strokeWeight: 1,
              fillColor: "#FFD700",
              fillOpacity: 0.5,
              map: map
          });
          circleClusterremove.push(buffer_circle);
      }
    </script>
  @else
    <script type="text/javascript">
      window.onload = function(e){ 
        var lat = '44.14003';
        var lng = '-21.39765';

        initialize(lat, lng); 
      }

      var circleClusterremove = [];
      var buffer_circle = null;
      // To load google map
      function initialize(lat, lng) {
          var mapOptions = {
              center: new google.maps.LatLng(lat, lng),
              zoom: 1,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById('map'), mapOptions);
          map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
      }
    </script>
  @endif
@endsection
