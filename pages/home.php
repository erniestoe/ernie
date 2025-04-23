<section class="home-content">
	<inner-column>
		<div class="about">
			<p><?=$pageData['about']?></p>

			<div class="links">
			<?php foreach($pageData['links'] as $link){?>
				<a target="_blank" href="<?=$link['href'];?>"><?=$link['text'];?></a>
			<?php } ?>
			</div>
		</div>

		<picture>
			<img src="<?=$pageData['image'];?>">
		</picture>

		<?php include 'modules/' . $pageData['modules'][0]; ?>
	</inner-column>
</section>

