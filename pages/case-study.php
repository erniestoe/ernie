<section class="case-study ">
<?php if ($project): ?>
	
	<inner-column>
		<header>

			<div class="header-text">
				<?php if ($project['headerText']):?>
					<h2 class="loud-voice"><?=$project['headerText']?></h3>
				<?php endif;?>


				<h3 class="calm-voice"><?= $project['projectName'] ?></h2>

			</div>
		</header>
			<div class="text">

				<ul class="tags">
					<?php foreach ($project['tags'] as $tag): ?>
						<li class="tag"><?= $tag ?></li>
					<?php endforeach; ?>
				</ul>

				<?php foreach ($project['caseStudy'] as $content): ?>
					<?= $content['content'] ?>
				<?php endforeach; ?>
			</div>

			<?php if ($project['showcase']):?>
				<div class="main-carousel">
					<?php foreach ($project['showcase'] as $image): ?>
						<div class="carousel-cell">
							<picture>
								<img loading="lazy" src="<?=$image['src']?>">
							</picture>
						</div>
					<?php endforeach;?>
				</div>
			<?php endif;?>

			<?php include('modules/case-study-gallery.php'); ?>


			<?php if ($project['liveLinks'] || $project['githubLinks']): ?>
				<?php include('modules/case-study-links.php'); ?>
			<?php endif ?>
			
			<a class="calm-voice" href="<?= ENV === 'production'? '/case-study/' . $project['nextProject'] : '?page=case-study&slug=' . $project['nextProject'] ?>">See Next Project</a>

<?php else: ?>
	<p class="error">No case study found for that ID.</p>
<?php endif; ?>	
	</inner-column>
</section>