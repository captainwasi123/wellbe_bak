<section class="sidebar-left">
   <div class="sidebar-custom">
      <div class="sidebar-logo">
         <a href=""> Wellbe </a>
         <button class="menu-hamburger"> <img alt="hamburger" src="{{URL::to('/')}}/public/assets/images/hamburger.png"> </button>
      </div>
      <div class="sidebar-menu">
         <div class="menu-item">
            <a href="{{route('practitioner.dashboard')}}" class="active"> <i class="fa fa-home"> </i> Dashboard </a>
         </div>
         <div class="menu-item">
            <a class="menu-onn"> <i class="fa fa-folder"> </i>  My Bookings <i class="fa fa-caret-right  menu-icon"> </i> </a>
            <ol class="sub-menu" style="display: none;">
               <li> <a href="{{route('practitioner.booking.upcomming')}}"> <b> . </b> Upcoming </a></li>
               <li> <a href="{{route('practitioner.booking.inprogress')}}"> <b> . </b> In Progress </a></li>
               <li> <a href="{{route('practitioner.booking.completed')}}"> <b> . </b> Completed </a></li>
               <li> <a href="{{route('practitioner.booking.cancelled')}}"> <b> . </b> Cancelled </a></li>
            </ol>
         </div>
         <div class="menu-item">
            <a href="{{route('practitioner.services')}}"> <i class="fa fa-list"> </i> My Services </a>
         </div>
         <div class="menu-item">
            <a href="{{route('practitioner.schedule')}}"> <i class="fa fa-user-plus"> </i> My Schedule</a>
         </div>
         <div class="menu-item">
            <a href="{{route('practitioner.profile')}}"> <i class="fa fa-user"> </i> My Profile </a>
         </div>
         <div class="menu-item">
            <a href=""> <i class="fa fa-share-alt"> </i> My Plan </a>
         </div>
      </div>
      <div class="sidebar-btn-fixed">
         <a href=""> <i class="fa fa-globe"> </i> View Website Page </a>
      </div>
   </div>
</section>