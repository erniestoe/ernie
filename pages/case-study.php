<section class="case-study ">
	<?php if ($project): ?>
	<header>
		<picture>
			<img loading="lazy" src="<?= $project['headerImage'] ?>">
		</picture>
	</header>
	<inner-column>
		
			<div class="text">
				<h2 class="attention-voice"><?= $project['projectName'] ?></h2>

				<ul class="tags">
					<?php foreach ($project['tags'] as $tag): ?>
						<li class="tag"><?= $tag ?></li>
					<?php endforeach; ?>
				</ul>


				<p><?= $project['caseStudy'] ?></p>
			</div>

			<case-study-gallery>
				<?php foreach ($project['gallery']  as $image): ?>
					<figure>
						<a data-fslightbox="gallery" href="<?= $image['src']; ?>">
							<picture>
								<img loading="lazy" src="<?= $image['src']; ?>">
							</picture>
						</a>

						<?php if (!empty($image['caption'])): ?>
							<figcaption class="calm-voice"><?=$image['caption']?></figcaption>
						<?php endif;?>
					</figure>
				<?php endforeach; ?>

				<?php if ($project['figma']): ?>
					<?php foreach ($project['figma'] as $figmaEmbed): ?>
						<iframe width="100%" loading="lazy" style="border: 1px solid rgba(0, 0, 0, 0.1);"  src="<?= $figmaEmbed['src']; ?>" allowfullscreen></iframe>
					<?php endforeach ?>
				<?php endif; ?>
				
				<?php if ($project['youtube']): ?>
					<iframe width="100%" loading="lazy" src="<?= $project['youtube'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<?php endif; ?>
			</case-study-gallery>

			<links>
				<div class="live">
					<ul>
						<?php foreach ($project['liveLinks'] as $liveLink):?>
							<li>
								<a class="quiet-voice bold" target="_blank" href="<?=$liveLink['href']?>"><?=$liveLink['text']?></a>

								<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#141414" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
							</li>
						<?php endforeach; ?>
						
					</ul>
				</div>

				<?php if ($project['githubLinks']): ?>
					<div class="github">


						<ul>
							<?php foreach ($project['githubLinks'] as $githubLink):?>
								<li>
									<a class="quiet-voice bold" target="_blank" href="<?=$githubLink['href']?>"><?=$githubLink['text']?></a>

									<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#141414" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
								</li>
							<?php endforeach; ?>
						</ul>

					</div>
				<?php endif; ?>
			</links>
				
		<?php else: ?>
			<p class="error">No case study found for that ID.</p>
		<?php endif; ?>	
	</inner-column>
</section>