<section class="design">

		<header>
			<inner-column class="main-grid">
				<h2 class="attention-voice"><?= $pageTitle; ?></h2>

				<p>A collection of my graphic design works.</p>
			</inner-column>
			
		</header>

		<div class="gallery">
			<inner-column>
			<?php foreach ($pageData['portrait'] as $portrait){?>
				<picture class="portrait">
					<img src="<?=$portrait['src']?>">
				</picture>
			<?php }?>

			<?php foreach ($pageData['square'] as $square){?>
				<picture class="square">
					<img src="<?=$square['src']?>">
				</picture>
			<?php }?>

			<?php foreach ($pageData['landscape'] as $landscape){?>
				<picture >
					<img src="<?=$landscape['src']?>">
				</picture>
			<?php }?>
			</inner-column>
		</div>

</section>

