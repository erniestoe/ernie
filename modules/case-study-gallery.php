<case-study-gallery>
	<h2 class="attention-voice">Process</h2>
	<?php foreach ($project['gallery']  as $image): ?>
		<figure>
			<picture class="<?= $image['class'] ?>">
				<img loading="lazy" src="<?= $image['src']; ?>" alt="Case study image">
			</picture>

			<?php if (!empty($image['caption'])): ?>
				<figcaption class="calm-voice"><?=$image['caption']?></figcaption>
			<?php endif;?>
		</figure>
	<?php endforeach; ?>
	
	<?php if ($project['youtube']): ?>
		<iframe width="100%" loading="lazy" src="<?= $project['youtube'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
	<?php endif; ?>
</case-study-gallery>