<case-study-gallery>
	<?php foreach ($project['gallery']  as $image): ?>
		<figure>
			<a data-fslightbox="gallery" href="<?= $image['src']; ?>">
				<picture>
					<img loading="lazy" src="<?= $image['src']; ?>" alt="Case study image">
				</picture>
			</a>

			<?php if (!empty($image['caption'])): ?>
				<figcaption class="calm-voice"><?=$image['caption']?></figcaption>
			<?php endif;?>
		</figure>
	<?php endforeach; ?>

	<!-- <?php if ($project['figma']): ?>
		<?php foreach ($project['figma'] as $figmaEmbed): ?>
			<iframe width="100%" loading="lazy" style="border: 1px solid rgba(0, 0, 0, 0.1);"  src="<?= $figmaEmbed['src']; ?>" allowfullscreen></iframe>
		<?php endforeach ?>
	<?php endif; ?> -->
	
	<?php if ($project['youtube']): ?>
		<iframe width="100%" loading="lazy" src="<?= $project['youtube'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
	<?php endif; ?>
</case-study-gallery>