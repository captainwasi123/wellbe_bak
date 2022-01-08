@extends('web.new.includes.master')
@section('title', 'FAQ')
@section('content')


   <!-- FAQs Section Starts Here -->
   <section class="pad-top-60 pad-bot-60   bg-2">
      <div class="container">
         <div class="sec-head4 text-center">
            <h4 class="col-blue"> Want to know more? </h4>
            <p> View some of our frequently asked questions.. </p>
         </div>
         <div class="faqs-all">
          <div class="set">
              <a >Who are the Wellbe professionals? <i class="fa fa-angle-right"></i>
              </a>
              <div class="content">
                 <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                 </p>
              </div>
           </div>
           <div class="set">
              <a > Do I need to provide anything for the treatment? <i class="fa fa-angle-right"></i>
              </a>
              <div class="content">
                 <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                 </p>
              </div>
           </div>
           <div class="set">
              <a > When can I book for? <i class="fa fa-angle-right"></i>
              </a>
              <div class="content">
                 <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                 </p>
              </div>
           </div>
           <div class="set">
              <a > What if I need to make changes? <i class="fa fa-angle-right"></i>
              </a>
              <div class="content">
                 <p> We carefully screen and approve each professional. They are all professionally trained and incredibly talented. Every professional that works with us is fully qualified and insured for the services they offer. We collect regular feedback to ensure you consistently receive a five star experience.
                 </p>
              </div>
           </div>

             <div class="set">
               <a > What happens when I make a booking? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
               </div>
            </div>

             <div class="set">
               <a > What should I do to prepare for a treatment? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
               </div>
            </div>

             <div class="set">
               <a > What are the cancellation terms?<i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
               </div>
            </div>

             <div class="set">
               <a > Can I contact my practitioner directly? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
               </div>
            </div>

             <div class="set">
               <a > What if I am running late? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
               </div>
            </div>

             <div class="set">
               <a > How do I cancel my booking? <i class="fa fa-angle-right"></i>
               </a>
               <div class="content">
                  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
               </div>
            </div>



         </div>
           

            <div class="sec-head4 text-center">
            
            <p> Can’t find the answer you are looking for? Check out our help centre or <a href="{{route('countact_us')}}">Contact Us</a> and we’ll be happy to help.</p>
         </div>
         
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