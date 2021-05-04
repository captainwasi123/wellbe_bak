<header>
   <div class="container">
      <div class="logo">
         <a href="{{route('home')}}"> <img alt="logo" src="{{URL::to('/')}}/public/assets/web/images/logo.png"> </a>
      </div>
      <div class="header-right">
         <a  class="login-btn" data-toggle="modal" data-target=".bs-example-modal-lg"> Log in </a>
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
                                   <form>
                                    {{csrf_field()}}
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
                                   <form >
                                  <div class="form-field6">
                                  <p> First Name </p>
                                  <input type="text" name="">
                                  </div>

                                  <div class="form-field6">
                                  <p> Last Name </p>
                                  <input type="text" name="">
                                  </div>

                                   <div class="form-field6">
                                  <p> Email Address </p>
                                  <input type="email" name="">
                                  </div>

                                   <div class="form-field6">
                                  <p> Phone </p>
                                  <input type="phone" name="">
                                  </div>

                                   <div class="form-field6">
                                  <p> Password </p>
                                  <input type="password" name="">
                                  </div>


                                 	<div class="form-field7 text-center">
                                     <button class="bg-blue col-white normal-btn rounded"> REGISTER </button>
                                 </div>
                                  </form>
                	</div>

                </div>


              </div>
            </div>
         </div>
      </div>
