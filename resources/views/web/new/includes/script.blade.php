
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{URL::to('/public/assets/web/new/')}}/js/bootstrap.min.js"> </script>
<script src="{{URL::to('/public/assets/web/new/')}}/js/slick-slider.js"> </script>
<script src="{{URL::to('/public/assets/web/new/')}}/js/dev.js"> </script>
<script src="{{URL::to('/public/assets/web/new/')}}/js/functions.js"> </script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places"></script>
  <script>
      google.maps.event.addDomListener(window, 'load', initialize);
      function initialize() {
            var options = {
              componentRestrictions: {country: "nz"}
            };
            var input = document.getElementById('pac-inputt');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            // place variable will have all the information you are looking for.
            $('#lat').val(place.geometry['location'].lat());
            $('#long').val(place.geometry['location'].lng());
         });
      }

      google.maps.event.addDomListener(window, 'load', initializee);
      function initializee() {
            var options = {
              componentRestrictions: {country: "nz"}
            };
            var input = document.getElementById('mpac-inputt');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            // place variable will have all the information you are looking for.
            $('#mlat').val(place.geometry['location'].lat());
            $('#mlong').val(place.geometry['location'].lng());
         });
      }
  </script>