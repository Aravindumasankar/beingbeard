<script>var page_name = 'campaigns'</script>
<div class="container top-margin" >
  <h3 class="text-center"><strong>TRENDING CAMPAIGNS</strong></h3>
  <div class="row">
  <?php
  //print_r($content);
  foreach ($content['campaigns'] as $key) {
    ?>
          <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3">
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
                      <a href="<?php echo $base_url.'auth'?>?redirect=trending"><button type="button" id="<?php echo strtolower($key['campaign_name']) ?>" class="btn btn-warning pull-right" aria-label="Left Align">
                          Try
                      </button></a>
                    <?php } ?>

                  </div><!-- card content -->
              </div>
          </div>
  <?php } ?>
  </div>

</div>
