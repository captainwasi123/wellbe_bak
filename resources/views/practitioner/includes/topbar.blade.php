<div class="dashboard-menu">
    <div class="notification-dropdown">
       <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <img alt="bell-icon" src="{{URL::to('/')}}/public/assets/images/bell-icon.png"/> <span class="counter1"> 3 </span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
             <li><a href="#">Action</a></li>
             <li><a href="#">Another action</a></li>
             <li><a href="#">Something else here</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="#">Separated link</a></li>
          </ul>
       </div>
    </div>
    <div class="user-dropdown">
       <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <img alt="user-pic" src="{{URL::to('/')}}/{{Auth::user()->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">
          {{empty(Auth::user()->first_name) ? 'New User' : ' '.Auth::user()->first_name}} 
          <span> Practitioner&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <i class="fa fa-caret-down"> </i>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
             <div class="profile-info">
                <img alt="user-pic" src="{{URL::to('/'.Auth::user()->profile_img)}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">
                <h5> Hello{{empty(Auth::user()->first_name) ? '' : ' '.Auth::user()->first_name}}, </h5>
                <h6> {{Auth::user()->email}} </h6>
             </div>
             <li><a href="{{route('practitioner.profile')}}"> <i class="fa fa-user"> </i> My Account </a></li>
             <li><a href="{{URL::to('/logout')}}"> <i class="fa fa-sign-out-alt"> </i> Logout </a></li>
          </ul>
       </div>
    </div>
 </div>
