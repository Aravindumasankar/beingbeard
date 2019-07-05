
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class=" top-margin">
        	<div class="row">
        <div class="form-body">
            <ul class="nav nav-tabs final-login">
                <li><a  data-toggle="tab" href="#sectionA">Sign In</a></li>
                <li><a data-toggle="tab" href="#sectionB">Join us!</a></li>
            </ul>
            <div class="tab-content">
                <div id="sectionA" class="tab-pane fade in active show">
                <div class="innter-form">
                    <form class="sa-innate-form login_form" method="post" action="<?php echo $base_url.'auth/login'?>">
                    <label>Email Address</label>
                    <input type="text" name="username" required>
                    <label>Password</label>
                    <input type="password" name="password" required>
                    <button type="submit">Sign In</button>
                    <a href="">Forgot Password?</a>
                    </form>
                    </div>
                    <div class="social-login">
                    <p class="text-center">Sign In With</p>
            		<ul>
                    <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
                    <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
                    </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="sectionB" class="tab-pane fade">
        			<div class="innter-form">
                    <form class="sa-innate-form signup_form" method="post" action="<?php echo $base_url.'auth/signup'?>">
                    <label>First Name</label>
                    <input type="text" name="firstname" required >
        						<label>Last Name</label>
                    <input type="text" name="lastname" required >
                    <label>Email</label>
                    <input type="text" name="email" required>
                    <label>Password</label>
                    <input type="password" name="password" required>
                    <button type="submit">Join now</button>
                    <p>By clicking Join now, you agree to hifriends's User Agreement, Privacy Policy, and Cookie Policy.</p>
                    </form>
                    </div>
                    <div class="social-login">
                    <p class="text-center"> Register With </p>
        			<ul>
                    <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
                    <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
                    </ul>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>

      </div>
    </div>

  </div>
</div>
