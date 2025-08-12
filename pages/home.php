<section class="home-content">
	<inner-column>
		<!-- <h2 class="intro strong-voice"><?= $pageData["tagline"]?></h2> -->
		<intro class="intro">
			<h2 class="loud-voice intro-headline"><?= $pageData["headline"]?></h2>
			<p class="strong-voice"><?= $pageData["subheadline"]?></p>
			<!-- <a href="<?= ENV === 'production'? '/case-study-index' : '?page=case-study-index'?>"><?= $pageData["cta"]?></a> -->
		</intro>

		<?php include ('modules/work-cards-home.php'); ?>

		<?php include ('modules/home-about.php'); ?>
	</inner-column>
</section>