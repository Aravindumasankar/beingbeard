<script> var page_name = "login"; </script>
<section class="features" id="features">
	<div class="container">
		<h1 class="text-center"> Welcome to World's First Beard School. </h1>
		<div class="row">
			<div class="col-lg-4 my-auto"></div>
			<div class="col-lg-4 my-auto">
				<div class="container-fluid">
					<div class="login">
						<div class="divide-10"></div>
						<div class="row">
						<img class="login-logo img-responsive" src = "<?php echo $base_url.'assets/dist/frontend/images/logo.png'?>">
					</div>
					<div class="divide-20"></div>
					<fb:login-button data-button-type="continue_with" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false" onlogin="checkLoginState();" scope="public_profile, email"></fb:login-button>
					<div class="divide-10"></div>
                        <p>App be launched soon!</p>
            <div class="badges">
              <a class="badge-link " href="#"><img class="google-play" src="<?php echo $base_url.'assets/dist/images/google-play-badge.svg'?>" alt=""></a>
              <a class="badge-link " href="#"><img class="app-store" src="<?php echo $base_url.'assets/dist/images/app-store-badge.svg'?>" alt=""></a>
            </div>
                    <div class="divide-10"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 my-auto">
                
            </div>
            
			</div>
		</div>


	</div>


</section>
