<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> @yield('title') | {{env('APP_NAME')}} </title>

      @include('web.includes.style')
      @yield('additionalCSS')

   </head>
   <body>
      <!-- Header Section Starts Here -->
         @include('web.includes.header')
      <!-- Header Section Ends Here -->

            @yield('content')

      <!-- Footer Section Starts Here -->
         @include('web.includes.footer')
      <!-- Footer Section Ends Here -->
      <!-- Bootstrap Javascript -->
      @include('web.includes.scripts')
      @yield('additionalJS')

   </body>
</html>
