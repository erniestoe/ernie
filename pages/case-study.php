<section class="case-study ">
<?php if ($project): ?>
		
		<header>
			<inner-column>
			<case-intro>
			<?= $project['headerText'];?>

			<case-text-block>
				<h3 class="attention-voice">Overview</h3>

				<?php foreach ($project['caseStudy'] as $content): ?>
            	<?= $content['content'] ?>
            <?php endforeach; ?>
			</case-text-block>
		</inner-column>
		</case-intro>
			
		</header>
		<inner-column>
		

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
								<img loading="lazy" src="<?=$image['src']?>">
							</picture>
						<?php endforeach ?>
						<?php if ($caseBlock['videos']): ?>
							<?php foreach ($caseBlock['videos'] as $video): ?>
								<video
										loading="lazy"
										controls			
								      muted
								      playsinline
								      loop
								      preload="metadata"
								      style="display:block;width:100%;height:auto;"
								      src="<?= $video['src']?>"
								      class="<?= $video['class']?>"
								      poster=""
								    ></video>
							<?php endforeach ?>
						<?php endif ?>
					</case-image-block>
				</case-block>
			<?php endforeach ?>
		<?php endif ?>

		
<?php else: ?>
	<p class="error">No case study found for that ID.</p>
<?php endif; ?>	
	</inner-column>
</section>