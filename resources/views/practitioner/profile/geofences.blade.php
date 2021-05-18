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
                 <form>
                    <input type="hidden" name="lat" id="lat">
                    <input type="hidden" name="long" id="long">
                    <div class="form-field3">
                   <p> REGION NAME <sup>*</sup> </p>
                   <input type="text" placeholder="Auckland" name="" id="pac-input">
                    <div class="form-field3 pt-4">
                        <p> Service Radious <sup>*</sup> </p>
                        <input type="text" placeholder="service radious" name="radious" >
                    </div>
                    </div>
                     <div class="form-field3">
                   <p> REGION DESCRIPTION <sup>*</sup> </p>
                   <textarea placeholder="Auckland"></textarea>
                    </div>
                 </form>

                <div class="block-element submit-buttons text-right">
                  <button class="normal-btn rounded bg-silver col-black pad-1"> Cancel  </button>
                <button class="normal-btn rounded bg-blue col-white pad-1"> Save  </button>
                </div>
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
<script>
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    function initAutocomplete() {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 13,
    mapTypeId: "roadmap",
  });
  // Create the search box and link it to the UI element.
  const input = document.getElementById("pac-input");
  const searchBox = new google.maps.places.SearchBox(input);
//   map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });
  let markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];
    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();
    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }
      const icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };
      // Create a marker for each place.
      markers.push(
        new google.maps.Marker({
          map,
          icon,
          title: place.name,
          position: place.geometry.location,
        })
      );

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
       // place variable will have all the information you are looking for.
    $('#lat').val(place.geometry['location'].lat());
    $('#long').val(place.geometry['location'].lng());

    });
    map.fitBounds(bounds);

  });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCT7C85ghGBFoX9J9NCTAeSAOGfJR0bGvU&callback=initAutocomplete&libraries=places&v=weekly" async ></script>
@endsection
