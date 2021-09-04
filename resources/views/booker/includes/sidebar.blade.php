 <section class="sidebar-left">
         <div class="sidebar-custom">
            <div class="sidebar-logo">
               <a href="{{route('booker.index')}}"> Wellbe </a>
               <button class="menu-hamburger"> <img alt="hamburger" src="{{URL::to('/')}}/public/assets/images/hamburger.png"> </button>
            </div>
            <div class="sidebar-menu">
               <div class="menu-item">
                  <a href="{{route('booker.index')}}" class="active"> <i class="fa fa-home"> </i> Dashboard </a>
               </div>
               <div class="menu-item">
                  <a class="menu-onn"> <i class="fa fa-folder"> </i>  My Bookings <i class="fa fa-caret-right  menu-icon"> </i> </a>
                  <ol class="sub-menu" style="display: none;">
                     <li> <a href="{{route('booker.upcomming_booking')}}"> <b> . </b> Upcoming </a></li>
                     <li> <a href="{{route('booker.inprogress_booking')}}"> <b> . </b> In Progress </a></li>
                     <li> <a href="{{route('booker.completed_booking')}}"> <b> . </b> Completed </a></li>
                     <li> <a href="{{route('booker.cancelled_booking')}}"> <b> . </b> Cancelled </a></li>
                  </ol>
               </div>
               <div class="menu-item">
                  <a class="menu-onn"> <i class="fa fa-user-plus"> </i>  My Profile <i class="fa fa-caret-right  menu-icon"> </i> </a>
                  <ol class="sub-menu" style="display: none;">
                     <li> <a href="{{route('booker.profile')}}"> <b> . </b> Edit Profile </a></li>
                  </ol>
               </div>

              <!--   <div class="menu-item">
                  <a href="{{route('booker.share')}}"> <i class="fa fa-users"> </i> Refer a Friend </a>
               </div> -->

            </div>
            <div class="sidebar-btn-fixed">
               <a href="{{URL::to('/')}}" target="_blank"> <i class="fa fa-globe"> </i> View Website Page </a>
            </div>

         </div>
      </section>
