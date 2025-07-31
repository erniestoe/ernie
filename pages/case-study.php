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


				<?php foreach ($project['caseStudy'] as $content): ?>
					<?= $content['content'] ?>
				<?php endforeach; ?>
			</div>

			<?php include('modules/case-study-gallery.php'); ?>

			<?php include('modules/case-study-links.php'); ?>

<?php else: ?>
	<p class="error">No case study found for that ID.</p>
<?php endif; ?>	
	</inner-column>
</section>