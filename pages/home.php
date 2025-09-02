<section class="home-content">
	<inner-column>
		<!-- <h2 class="intro strong-voice"><?= $pageData["tagline"]?></h2> -->
		<intro class="intro">
			<!-- <div data-tilt data-tilt-full-page-listening>
				<svg class="morph" viewBox="0 0 200 200">
				  <path id="shape" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
				</svg>
			</div> -->
			<div class="main-intro">
				<svg-container>
				  <svg viewBox="0 0 200 200">
				    <path id="shape1" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
				  </svg>
				  
				  <svg viewBox="0 0 200 200">
				    <path id="shape2" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
				  </svg>
				  
				  <svg viewBox="0 0 200 200">
				    <path id="shape3" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
				  </svg>
				</svg-container>

				<h2 class="loud-voice intro-headline"><?= $pageData["headline"]?></h2>
			</div>
			<p class="strong-voice"><?= $pageData["subheadline"]?></p>
			<!-- <a href="<?= ENV === 'production'? '/case-study-index' : '?page=case-study-index'?>"><?= $pageData["cta"]?></a> -->

		</intro>

		<?php include ('modules/work-cards-home.php'); ?>

		<?php include ('modules/home-about.php'); ?>
		<h3 class="attention-voice">Resume</h3>
		<?php include ('modules/resume.php') ?>
	</inner-column>
</section>