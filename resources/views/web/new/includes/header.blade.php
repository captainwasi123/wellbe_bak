<header>
   <div class="container">
      <div class="logo">
         <a href="{{route('home')}}"> <img alt="logo" src="{{URL::to('/public/assets/web/new/')}}/images/wellbe-logo.png"> </a>
      </div>
      <div class="navbar-handler">
         <img src="{{URL::to('/public/assets/web/new/')}}/images/hamburger.png">
      </div>
      <div class="navbar-custom">
         <div class="menu-item">
            <a data-toggle="modal" data-target=".coming-soon-modal"> Treatments </a>
         </div>
         <div class="menu-item">
            <a data-toggle="modal" data-target=".coming-soon-modal"> About </a>
         </div>
         <div class="menu-item">
            <a data-toggle="modal" data-target=".coming-soon-modal"> Contact Us </a>
         </div>
         <div class="menu-buttons">
            <a href="{{URL::to('/login')}}" class="login-btn"> Log In </a>
            <a href="{{URL::to('/work_with_us')}}" class="pro-btn"> Work With Us </a>
         </div>
      </div>
   </div>
</header>