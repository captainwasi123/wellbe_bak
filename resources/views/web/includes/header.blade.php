<header>
   <div class="container">
      <div class="logo">
         <a href="{{route('home')}}"> <img alt="logo" src="{{URL::to('/')}}/public/assets/web/images/logo.png"> </a>
      </div>
      <div class="header-right">
        @if(Auth::check())
          <div class="dropdown loggedIn">
            <a class="dropdown-toggle" type="button" data-toggle="dropdown">
              <img alt="user-pic" src="{{URL::to('/')}}/{{Auth::user()->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';">
              {{Auth::user()->first_name}}&nbsp;&nbsp;&nbsp;&#9660;
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{Auth::user()->user_type == '1' ? route('practitioner.dashboard') : route('booker.index')}}">Dashboard</a></li>
              <li><a href="{{Auth::user()->user_type == '1' ? route('practitioner.profile') : route('booker.profile')}}">Profile</a></li>
              <li><a href="{{URL::to('/logout')}}">Logout</a></li>
            </ul>
          </div>
        @else
          <a  class="login-btn" data-toggle="modal" data-target=".bs-example-modal-lg"> Log in </a>
          <a href="" class="pro-btn"> Become a Pro </a>
        @endif
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

<div class="modal fade modal-size2 bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document" style="max-width: 550px;">
    <div class="modal-content">
      <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      <div class="custom-modal-triggers">
        <ul class="nav nav-tabs" role="tablist">
        	<li class="nav-item">
         		<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Login</a>
         	</li>
         	<li class="nav-item">
         		<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Register</a>
         	</li>
        </ul>
      </div>
      <div class="custom-modal-head">
      </div>
      <div class="custom-modal-data">
       	<div class="tab-content">
         	<div class="tab-pane active" id="tabs-1" role="tabpanel">
     				<h5> Please login to the dashboard with your credentials. </h5>
            <form id="loginForm" action="{{URL::to('/loginAttempt')}}">
              <input type="hidden" name="_token" id="loginToken" value="{{csrf_token()}}">
              <div class="form-field6">
                <p> Email Address </p>
                <input type="email" name="email" id="email" required>
              </div>
              <div class="form-field6">
                <p> Password </p>
                <input type="password" name="password" id="password" required>
              </div>
              <div class="forgot-password">
                <a href=""> Forgot Password? </a>
              </div>
             	<div class="form-field7 text-center">
                <button id="login" class="bg-blue col-white normal-btn rounded"> Submit </button>
              </div>
            </form>
         	</div>
         	<div class="tab-pane" id="tabs-2" role="tabpanel">
     	      <h5> Please Register with us and get ammazing opportunities. </h5>
            <form method="post" action="{{URL::to('/register')}}">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <label> First Name </label>
                  <input type="text" class="form-control" name="first_name" required>
                </div>
                <div class="col-md-6">
                  <label> Last Name </label>
                  <input type="text" class="form-control" name="last_name" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <label> Email Address </label>
                  <input type="email" class="form-control" name="email" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <label> Phone </label>
                  <input type="number" class="form-control" name="phone">
                </div>
                <div class="col-md-6">
                  <label> User Type </label>
                  <div class="form-control">
                    <input type="radio" name="userType" id="labelbooker" value="2" checked>&nbsp;
                    <label for="labelbooker">Booker</label>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="userType" id="labelpractitioner" value="1">&nbsp;
                    <label for="labelpractitioner">Practitioner</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <p> Password </p>
                  <input type="password" class="form-control" name="password" required>
                </div>
                <div class="col-md-6">
                  <p> Confirm Password </p>
                  <input type="password" class="form-control" name="confirmation_password" required>
                </div>
                <div class="col-md-12" id="register_error"></div>
                <div class="col-md-12">
                  <br>
                  <div class="form-field7 text-center">
                     <button class="bg-blue col-white normal-btn rounded"> REGISTER </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
