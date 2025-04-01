<header>
	<inner-column>
		<h1 class="loud-voice"><?=$pageData['title']?></h1>
	</inner-column>
</header>

<section class="gallery">
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
</section>