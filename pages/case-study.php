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

			<div class="text">

				<ul class="tags">
					<?php foreach ($project['tags'] as $tag): ?>
						<li class="tag"><?= $tag ?></li>
					<?php endforeach; ?>
				</ul>

				<h2 class="attention-voice">Overview</h2>
				<div class="overview">
					<?php foreach ($project['caseStudy'] as $content): ?>
						<?= $content['content'] ?>
					<?php endforeach; ?>
				</div>
			</div>

			<?php include('modules/case-study-gallery.php'); ?>


			<?php if ($project['liveLinks'] || $project['githubLinks']): ?>
				<?php include('modules/case-study-links.php'); ?>
			<?php endif ?>

			<?php if ($project['reflection']): ?>
				<div class="reflection">
					<h2 class="attention-voice">Reflection</h2>

					<div class="reflection-text">
						<?=$project['reflection']?>
					</div>
				</div>
			<?php endif ?>

			<a class="calm-voice" href="<?= ENV === 'production'? '/case-study/' . $project['nextProject'] : '?page=case-study&slug=' . $project['nextProject'] ?>">See Next Project</a>

<?php else: ?>
	<p class="error">No case study found for that ID.</p>
<?php endif; ?>	
	</inner-column>
</section>