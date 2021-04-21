<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
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

      @yield('content')

  </section>
  <!-- All Dashboard Content Ends Here -->

      @include('includes.script')
      @yield('additionalJS')
      
   </body>
</html>