<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="host" content="{{URL::to('/')}}">
      <title> @yield('title') | {{env('APP_NAME')}} </title>
      <link rel="icon" href="{{URL::to('/public/assets/web/new/images/favicon.png')}}" type="image/png" sizes="16x16">

      @include('includes.style')
      @yield('additionalCSS')

   </head>
   <body>

      <!-- Sidebar Section Starts Here -->
      @yield('sidebar')
      <!-- Sidebar Section Ends Here -->

    <section class="all-dashboard">
        @yield('topbar')

        @if(session()->has('success'))
            <div class="custom-alert">
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            </div>
        @elseif(session()->has('error'))
            <div class="custom-alert">
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            </div>
        @elseif(session()->has('active'))
            @php $cart = session()->get('cart'); @endphp
            <div class="custom-alert">
            <div class="alert alert-success">
                {{ session()->get('active') }} 
                @if(!empty($cart['location']['lat']))
                    <a href="{{route('treatments.booking.step1')}}">Return to the cart to complete your order</a>
                @else
                    <a href="{{route('home')}}">Create a new booking</a>
                @endif
            </div>
            </div>
        @endif
        @if(session()->has('practitioner_service_success'))
        <div class="custom-alert">
          <div class="alert alert-warning" role="alert">
            This service is pending approval by the Wellbe Team. This process can take up to 72 hours.
          </div>
        </div>
        @endif
      @yield('content')


          <!-- Chat Widget Starts Here -->

          <div class="chat-window" style="margin-right:20px;">
            
          </div>

              <!-- Chat Widget Ends Here -->
    </section>
  <!-- All Dashboard Content Ends Here -->

      @include('includes.script')
      @if(Auth::check())
        <script type="text/javascript">
          $(document).ready(function(){
            getMessage('{{base64_encode(Auth::id())}}', '{{env("PUSHER_APP_KEY")}}');
          });
        </script>
      @endif
      @yield('additionalJS')



   </body>
</html>
