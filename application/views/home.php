<script> var page_name = "home"; </script>
<link rel="stylesheet" href="https://simplelineicons.com/css/simple-line-icons.css"/>
<link rel="stylesheet" href="<?php echo $base_url.'assets/dist/frontend/device-mockups/device-mockups.min.css'?>"/>
    <?php /* <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 ">
            <div class="header-content mx-auto">
              <h1 class="mb-5 white">To be happy is to have a Beard! Welcome to World's First Beard School. </h1>
              <a href="<?php echo $base_url.'trending' ?>" class="btn btn-outline btn-xl js-scroll-trigger">Try Out!</a>
            </div>
          </div>
          <div class="col-lg-5 ">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="<?php echo $base_url.'assets/dist/images/demo-screen-1.jpg'?>" class="img-fluid" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header> */ ?>

    <section class="features" id="features">
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-9 ">
        <div class="section-heading text-center">
                <h2>Welcome to World's First Beard School.</h2>
                <p class="">Grow Beard for a Cause! #karma</p>
                <hr>
              </div>
          <div class="row">
        <?php
        //print_r($content);
        foreach ($content['campaigns'] as $key) {
          ?>
          <div class="col-lg-4">
              <div class="card">
                  <div class="card-image" style="background-color:<?php echo $key['bg_color']?>">
                      <img class="img-responsive campaign_image" src="<?php echo $base_url.$key['path'].$key['image_url']?>" alt="<?php echo $key['campaign_name']?>">
                  </div><!-- card image -->

                  <div class="card-content">
                      <span class="card-title"><?php echo $key['campaign_name'] ?></span>
                      <?php if($this->session->userdata('logged_in')){?>
                      <a href="<?php echo $base_url.'campaigns/detail?campaign_id='.$key['id']?>"><button type="button" id="<?php echo strtolower($key['campaign_name']) ?>" class="btn btn-warning pull-right" aria-label="Left Align">
                          Try
                      </button></a>
                    <?php }else{ ?>
                      <?php $campaign_id = $key['id']; ?>
                      <a href="<?php echo $base_url.'auth?redirect=campaigns/detail?campaign_id='.$campaign_id?>"><button type="button" id="<?php echo strtolower($key['campaign_name']) ?>" class="btn btn-warning pull-right" aria-label="Left Align">
                          Try
                      </button></a>
                    <?php } ?>

                  </div><!-- card content -->
              </div>
          </div>
  <?php } ?>
                    </div>
        </div>

          <div class="col-lg-3 ">
            <div class="container-fluid">
            <div class="section-heading text-center">
                <h1 class=""><strong>Get a chance to be the <br/>Beard Yogi <br/>Of your locality</strong> <h1>
                <hr>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="feature-item">
                    <i class="icon-screen-smartphone text-primary"></i>
                    <h3>Join a Campaign</h3>
                    <p class="">Every month we host a Beard Campaign.You can also join campaigns in which you are interested</p>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="feature-item">
                    <i class="icon-camera text-primary"></i>
                    <h3>Upload Your Selfies</h3>
                    <p class="">Upload your selfies. Beard Yogi will track your progress</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="feature-item">
                    <i class="icon-present text-primary"></i>
                    <h3>Campaign Results</h3>
                    <p class="">People around this world will rate your Beard's hotness.
                      Campaign Results will be published in campaign Dashboards</p>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="feature-item">
                    <i class="icon-lock-open text-primary"></i>
                    <h3>Win prizes and Unlock Rewards</h3>
                    <p class="">Win Sponsored Prizes. You would be rewarded a Beard Badge, say "#BeardGuru", etc. </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php /* <section class="download bg-primary text-center" id="download">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h2 class="section-heading">Discover Inner Peace!</h2>
            <p>App be launched soon!</p>
            <div class="badges">
              <a class="badge-link" href="#"><img src="<?php echo $base_url.'assets/dist/images/google-play-badge.svg'?>" alt=""></a>
              <a class="badge-link" href="#"><img src="<?php echo $base_url.'assets/dist/images/app-store-badge.svg'?>" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <section class="cta">
      <div class="cta-content">
        <div class="container">
          <h2>Stop waiting.<br>Start Growing.</h2>
          <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">Let's Get Started!</a>
        </div>
      </div>
      <div class="overlay"></div>
    </section> --> */ ?>

    <section class="contact" id="contact">
      <div class="container">
        <h2>We
          <i class="fa fa-heart"></i>
          Beardsters!</h2>
        <ul class="list-inline list-social">
          <li class="list-inline-item social-twitter">
            <a href="#">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item social-facebook">
            <a href="#">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
         <!-- <li class="list-inline-item social-google-plus">
            <a href="#">
              <i class="fa fa-google-plus"></i>
            </a>
          </li>-->
        </ul>
      </div>
    </section>
