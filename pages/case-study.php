<section class="case-study ">
<?php if ($project): ?>
	<header>
		<svg-container>
		  <svg viewBox="0 0 200 200">
		    <path id="shape1" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
		  </svg>
		  
		  <svg viewBox="0 0 200 200">
		    <path id="shape2" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
		  </svg>
		  
		  <svg viewBox="0 0 200 200">
		    <path id="shape3" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
		  </svg>
		</svg-container>

		<div class="header-text">
			<h2 class="loud-voice project-name"><?= $project['projectName'] ?></h2>

			<?php if ($project['headerText']):?>
				<h3 class="strong-voice"><?=$project['headerText']?></h3>
			<?php endif;?>
		</div>
	</header>
	
	<inner-column>
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