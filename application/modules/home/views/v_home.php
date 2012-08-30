<div id="myCarousel" class="carousel slide">
	<!-- Carousel items -->
	<div class="carousel-inner">
		<?php
			foreach($aMenuData as $key=>$val){?>

			<div class="<?php echo($key == 0)?"active":"";?> item">

				<div class="hero-unit" >
				
					<div class="page-header"><h1><?php echo ucwords($val['tm_name']);?></h1></div><!--page-header-->

					<div id="<?php echo $val['tm_name'];?>_page">

						<div class="row-fluid">
						
							<div class="span6">
								<?php echo $val['tm_desc'];?>
								
							</div>
							
							<div class="span6">
								<?php echo $val['tm_content'];?>
							</div>
							
						</div><!--row-fluid-->
						
					</div><!--_page-->
					
				</div><!--hero-unit-->

			</div><!--item-->
		<?php }?>
	</div><!--end carousel-inner-->
</div><!--end myCarousel-->
		

		
	
	

