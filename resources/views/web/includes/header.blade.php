<header>
   <div class="container">
      <div class="logo">
         <a href="{{route('home')}}"> <img alt="logo" src="{{URL::to('/')}}/public/assets/web/images/logo.png"> </a>
      </div>
      <div class="header-right">
         <a href="{{URL::to('/login')}}" class="login-btn"> Log in </a>
         <a href="" class="pro-btn"> Become a Pro </a>
      </div>
      <div class="navbar-handler">
         <img src="{{URL::to('/')}}/public/assets/web/images/hamburger.png">
      </div>
      <div class="navbar-custom">
         <div class="menu-item">
            <a href="{{route('treatments')}}"> Treatments </a>
         </div>
         <div class="menu-item">
            <a href="{{route('professionals')}}"> Professionals </a>
         </div>
         <div class="menu-item">
            <a href=""> Gifts </a>
         </div>
         <div class="menu-item">
            <a href=""> About </a>
         </div>
         <div class="menu-item">
            <a href=""> Contact Us </a>
         </div>
      </div>
   </div>
</header>