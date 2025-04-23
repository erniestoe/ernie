<section class="home-content">
	<inner-column>
		<div class="about">
			<p><?=$pageData['about']?></p>
		</div>

		<picture>
			<img src="<?=$pageData['image'];?>">
		</picture>

		<?php include 'modules/' . $pageData['modules'][0]; ?>
	</inner-column>
</section>

