<section class="home-content">
	<inner-column>
		<intro class="intro">
			<!-- <div data-tilt data-tilt-full-page-listening>
				<svg class="morph" viewBox="0 0 200 200">
				  <path id="shape" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
				</svg>
			</div> -->
			<div class="main-intro">
				<!-- <svg-container>
				  <svg viewBox="0 0 200 200">
				    <path id="shape1" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
				  </svg>
				  
				  <svg viewBox="0 0 200 200">
				    <path id="shape2" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
				  </svg>
				  
				  <svg viewBox="0 0 200 200">
				    <path id="shape3" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
				  </svg>
				</svg-container> -->

				
			</div>
			<h1 class="loud-voice"><?= $pageData["subheadline"]?></h1>
				<?= $pageData["tagline"]?>
			

		</intro>

		<?php include ('modules/work-cards-home.php'); ?>

		<?php include ('modules/home-about.php'); ?>
	</inner-column>
</section>