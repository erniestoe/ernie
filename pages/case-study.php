<section class="case-study ">
<?php if ($project): ?>
	
	<inner-column>
		
		<header>
			<picture>
				<img src="<?= $project['headerImage'];?>">
			</picture>
		</header>

		<case-intro>
			<?= $project['headerText'];?>

			<case-text-block>
				<h3 class="attention-voice">Overview</h3>

				<?php foreach ($project['caseStudy'] as $content): ?>
            	<?= $content['content'] ?>
            <?php endforeach; ?>
			</case-text-block>
		</case-intro>

		<?php if ($project['caseBlocks']): ?>
			<?php foreach ($project['caseBlocks'] as $caseBlock): ?>
				<case-block>
					<?= $caseBlock['textBlock'] ?>

					<case-image-block>
						<?php foreach ($caseBlock['imageBlock'] as $image): ?>
							<picture class="
							<?php foreach($image['class'] as $class):?>
								<?=$class?>
							<?php endforeach; ?>">
								<img src="<?=$image['src']?>">
							</picture>
						<?php endforeach ?>
					</case-image-block>
				</case-block>
			<?php endforeach ?>
		<?php endif ?>

		<next-project>
			<h4 class="strong-voice">See next project</h4>

			<a href="<?= ENV === 'production'? '/case-study/' . $project['nextProject']['slug'] : '?page=case-study&slug=' . $project['nextProject']['slug'] ?>">
				<picture>
					<img src="<?=$project["nextProject"]['img']?>">
				</picture>
			</a>
		</next-project>
<?php else: ?>
	<p class="error">No case study found for that ID.</p>
<?php endif; ?>	
	</inner-column>
</section>