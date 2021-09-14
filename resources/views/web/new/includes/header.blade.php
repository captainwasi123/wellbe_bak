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
            <a data-toggle="modal" data-target=".treatmentModal"> Treatments </a>
         </div>
         <div class="menu-item">
            <a href="{{URL::to('/work_with_us')}}"> About </a>
         </div>
         <div class="menu-item">
            <a data-toggle="modal" data-target=".coming-soon-modal"> Contact Us </a>
         </div>
         @if(Auth::check())
            <div class="menu-buttons">
               @if(Auth::user()->user_type == '1')
                  <a href="{{route('practitioner.dashboard')}}" class="pro-btn"> My Account </a>
               @elseif(Auth::user()->user_type == '2')
                  <a href="{{route('booker.index')}}" class="pro-btn"> My Account </a>
               @endif
            </div>
         @else
            <div class="menu-buttons">
               <a href="{{URL::to('/login')}}" class="login-btn"> Log In </a>
               <a href="{{URL::to('/register/pro')}}" class="pro-btn"> Work With Us </a>
            </div>
         @endif
      </div>
   </div>
</header>