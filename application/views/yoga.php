<script>var page_name = 'yoga'</script>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url.'assets/dist/frontend/yoga/css/style1.css'?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url.'assets/dist/frontend/yoga/css/normalize.css'?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $base_url.'assets/dist/frontend/yoga/css/style1.css'?>" />
<script src="<?php echo $base_url.'assets/dist/frontend/yoga/js/modernizr.custom.js'?>"></script>
<div class="container-fluid" style="background:#fff; margin-top:65px">
<h3 class="text-center">To be happy is to grow a beard!<br/> - Beard Yogi</h3>
			<div id="theGrid" class="main" style="background:#fff">
				<section class="grid" style="padding-top:0;">
					<?php foreach ($content['yoga'] as $key) {?>
						<a class="grid__item" href="#">
						<h2 class="title title--preview"><?php echo $key['asana']?></h2>
						<div class="loader"></div>
						<span class="category"><?php echo $key['tagline']?></span>
						<div class="meta meta--preview">
							<img class="meta__avatar" src="<?php echo $base_url.'assets/uploads/being_beard/yoga/'.$key['image_url']?>" alt="author01" /> 
							<span class="meta__date"><i class="fa fa-calendar-o"></i> <?php echo date('d-M-Y',strtotime($key['added_on']))?></span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> <?php echo(mt_rand(1,4));?> min read</span>
						</div>
					</a>
					<?php } ?>
				</section>
				<section class="content">
					<div class="scroll-wrap">
					<?php foreach ($content['yoga'] as $key) {?>
						<article class="content__item">
							<span class="category category--full"><?php echo $key['asana']?></span>
							<h2 class="title title--full"><?php echo $key['tagline']?></h2>
							<div class="meta meta--full">
								<img class="meta__avatar" src="<?php echo $base_url.'assets/uploads/being_beard/yoga/'.$key['image_url']?>" />
								<span class="meta__author">Beard Yogi</span>
								<span class="meta__date"><i class="fa fa-calendar-o"></i> <?php echo date('d-M-Y',strtotime($key['added_on']))?></span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> <?php echo(mt_rand(1,4));?> min read</span>
							</div>
							<p><?php echo $key['content']?></p>
						</article>
					<?php }?>
					</div>
					<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
				</section>
			</div>
		</div><!-- /container -->
		<script src="<?php echo $base_url.'assets/dist/frontend/yoga/js/classie.js'?>"></script>
		<script src="<?php echo $base_url.'assets/dist/frontend/yoga/js/main.js'?>"></script>
