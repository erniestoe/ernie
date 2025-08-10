<section class="design">

		<div class="gallery">
			<inner-column>
			<?php foreach ($pageData['portrait'] as $portrait){?>
				<picture class="portrait">
					<img loading="lazy" src="<?=$portrait['src']?>" alt="Portrait image">
				</picture>
			<?php }?>

			<?php foreach ($pageData['square'] as $square){?>
				<picture class="square">
					<img loading="lazy" src="<?=$square['src']?>" alt="Square image">
				</picture>
			<?php }?>

			<?php foreach ($pageData['landscape'] as $landscape){?>
				<picture >
					<img loading="lazy" src="<?=$landscape['src']?>" alt="Landscape image">
				</picture>
			<?php }?>

			<div id="eyeballs" class="sketch"></div>
			<div id="circles" class="sketch"></div>
			</inner-column>
		</div>

</section>

