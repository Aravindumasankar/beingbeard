<div class="container-fluid top-margin" >
<script>var page_name = "campaign_detail";</script>
<?php
foreach ($content as $key) {?>
  <div class="row" style="margin-top: -20px;">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="background-color:<?php echo $key['bg_color']?>">
          <img class="campaign-img" alt="<?php echo $key['campaign_name'] ?>" src="<?php echo $base_url.$key['path'].$key['image_url']?>">
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="background-color:<?php echo $key['bg_color']?>">
          <div class="card-info">
            <h3><strong><?php echo $key['campaign_name'] ?></strong></h3>
            <h5><?php echo $key['campaign_desc'] ?></h5>
          </div>
          <div class="row">
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <button class="btn btn-block btn-primary like"><i class="fa fa-thumbs-up"></i> </button>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
          <button class="btn btn-primary"  title="Share this content" data-toggle="modal" data-target="#myModal">
<i class="fa fa-share-alt"></i> Share</button> </div>
        </div>
        <?php if($this->session->userdata('logged_in')){?>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
          <button class="btn btn-warning" id="participate" campaign_id="<?php echo $key['id'] ?>" user_id="<?php echo $this->session->userdata('user_id')?>" >Participate</button> </div>
        </div>
        <?php }else{?>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
          <a href="<?php echo $base_url.'auth?redirect=campaigns/detail?campaign_id='.$key['id']?>">
            <button class="btn btn-warning">Try</button> 
          </a>
          </div>
          </div>
        <?php } ?>
      </div>
<?php } ?>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-alt"></i> Share</h4>
      </div>
      <div class="modal-body">
        <p><a title="Facebook" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x"></i></span></a> <a title="Twitter" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x"></i></span></a> <a title="Google+" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x"></i></span></a> <a title="Linkedin" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x"></i></span></a> <a title="Reddit" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-reddit fa-stack-1x"></i></span></a> <a title="WordPress" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-wordpress fa-stack-1x"></i></span></a> <a title="Digg" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-digg fa-stack-1x"></i></span></a>  <a title="Stumbleupon" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-stumbleupon fa-stack-1x"></i></span></a><a title="E-mail" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-envelope fa-stack-1x"></i></span></a>  <a title="Print" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-print fa-stack-1x"></i></span></a></p>

        <h2><i class="fa fa-envelope"></i> Newsletter</h2>

                <p>Subscribe to our weekly Newsletter and stay tuned.</p>

                <form action="" method="post">
                    <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
  <input type="email" class="form-control" placeholder="your@email.com">
</div>
                    <br />
                    <button type="submit" value="sub" name="sub" class="btn btn-primary"><i class="fa fa-share"></i> Subscribe Now!</button>
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	</div>
</div>




  </div>




</div>
