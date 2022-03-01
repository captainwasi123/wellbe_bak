@extends('web.new.includes.master')
@section('title', 'Cookie Policy')
@section('content')
<!-- Banner Section Starts Here -->
   <section class="banner-sec  bg-5">
      <div class="container">
         <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 order-lg-5 order-md-5">
               <div class="banner-text">
                <center><h3> Cookie Policy </h3></center>
                <center><h6>This version was last updated on 20 February 2022.</h6></center>
               </div>
            </div>

         </div>
      </div>
   </section>

   <section class="pad-top-60 pad-bot-60   bg-8">
      <div class="container">
         <div class=" sec-head4">

            <p> Our website uses cookies. A cookie is a small text file that is stored on your computer, tablet, or phone when you visit a website. These cookies allow us to distinguish you from other users of our website. This helps us to provide you with a good experience when you browse our website and also allows us to improve our website. </p>
            <br>
            <p>There are two main types of cookies:</p>
            <br>
            <ul>
               <li> Session cookies - These are deleted when you finish browsing a website and are not stored on your computer longer than this. </li>
               <li> Persistent cookies - These are stored on your computer after you have finished using a website so that the website provider can remember your preferences the next time you use it. </li>
            </ul>
            <br>
            <p> Cookies can be set by the website you have browsed, ie the website displayed in the uniform resource locator (URL) window. These are called first-party cookies. Third-party cookies are set by a website other than the one you are browsing. </p>
            <br>
            <p> To find out more about cookies, including how to see what cookies have been set and how to manage and delete them, visit www.allaboutcookies.org. </p>
         </div>

{{--  background  --}}
         <div class="sec-head4">
            <h4 > HOW DO WE USE COOKIES? </h4>
         </div>


         <div>
            <ul>
               <li> To estimate our audience size and usage pattern; </li>
               <li> To store information about your preferences, and so allow us to customise our site according to your individual interests; </li>
               <li> To speed up your searches; </li>
               <li> To recognize you when you return to our site. </li>
               <li> Consent </li>
            </ul>
         </div>

         <div class="sec-head4">
            <p> If you continue to use our Site we will assume that you are happy to receive all cookies from our website. However, if you would prefer to change your cookie settings, you can do so at any time - see below ‘Controlling our use of cookies’. </p>
         </div>


         


   </section>
   <!-- FAQs Section Ends Here -->


@endsection
@section('addScript')

<script type="text/javascript">
   $(document).ready(function(){
      'use strict'


      setTimeout(function(){
         var newsletterAtt = getCookie("newsletterAtt");
         if(newsletterAtt != 'Yes'){
            $('.newsletterModal').modal('show');
            setCookie("newsletterAtt","Yes",60);
         }
      }, 10000);
   });

</script>

@endsection
