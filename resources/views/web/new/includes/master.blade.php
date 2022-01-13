<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="host" content="{{URL::to('/')}}">
      <meta name="token" content="{{csrf_token()}}">
      <title> @yield('title') | Wellbe </title>
      <link rel="icon" href="{{URL::to('/public/assets/web/new/images/favicon.png')}}" type="image/png" sizes="16x16">
      @include('web.new.includes.style')
      @yield('addStyle')
   </head>
   <body>
      <!-- Header Section Starts Here -->
         @include('web.new.includes.header')
      <!-- Header Section Ends Here -->
      
         @yield('content')

      <!-- Footer Section Starts Here -->
         @include('web.new.includes.footer')
      <!-- Footer Section Ends Here -->

      @include('web.new.includes.modal')


      <!-- Bootstrap Javascript -->
      @include('web.new.includes.script')
      @yield('addScript')
   </body>
</html>