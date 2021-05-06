<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="host" content="{{URL::to('/')}}">
      <title> @yield('title') | {{env('APP_NAME')}} </title>

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
        @endif

      @yield('content')

    </section>
  <!-- All Dashboard Content Ends Here -->

      @include('includes.script')
      @yield('additionalJS')

   </body>
</html>
