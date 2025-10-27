<section class="case-study ">
<?php if ($project): ?>
		
		<!-- <header>
			<inner-column>
			<case-intro>
			<?= $project['headerText'];?>

			<case-text-block>

				<?php foreach ($project['caseStudy'] as $content): ?>
            	<?= $content['content'] ?>
            <?php endforeach; ?>
			</case-text-block>
		</inner-column>
		</case-intro>
			
		</header> -->
		<inner-column>
		

		<?php if (!empty($project['caseBlocks']) && is_array($project['caseBlocks'])): ?>
		  <?php foreach ($project['caseBlocks'] as $index => $caseBlock): ?>
		    <?php $isFirst = ($index === 0); ?>
		    
		    <case-block>
		      <?php if ($isFirst): ?>
		        <case-intro>
		          <?= $project['headerText'] ?? '' ?>

		          <case-text-block>
		            <?php if (!empty($project['caseStudy']) && is_array($project['caseStudy'])): ?>
		              <?php foreach ($project['caseStudy'] as $content): ?>
		                <?= $content['content'] ?? '' ?>
		              <?php endforeach; ?>
		            <?php endif; ?>
		          </case-text-block>
		        </case-intro>
		      <?php endif; ?>

		      <?= $caseBlock['textBlock'] ?? '' ?>

		      <case-image-block>
		        <?php if (!empty($caseBlock['imageBlock']) && is_array($caseBlock['imageBlock'])): ?>
		          <?php foreach ($caseBlock['imageBlock'] as $image): ?>
		            <?php
		              $imgClasses = !empty($image['class']) && is_array($image['class'])
		                ? implode(' ', $image['class'])
		                : '';
		            ?>
		            <picture class="<?= htmlspecialchars($imgClasses) ?>">
		              <img loading="lazy" src="<?= htmlspecialchars($image['src'] ?? '') ?>">
		            </picture>
		          <?php endforeach; ?>
		        <?php endif; ?>

		        <?php if (!empty($caseBlock['videos']) && is_array($caseBlock['videos'])): ?>
		          <?php foreach ($caseBlock['videos'] as $video): ?>
		            <?php
		              $vidClasses = !empty($video['class']) && is_array($video['class'])
		                ? implode(' ', $video['class'])
		                : '';
		            ?>
		            <video
		              autoplay
		              loading="lazy"
		              controls
		              muted
		              playsinline
		              preload="metadata"
		              style="display:block;width:100%;height:auto;"
		              src="<?= htmlspecialchars($video['src'] ?? '') ?>"
		              class="<?= htmlspecialchars($vidClasses) ?>"
		            ></video>
		          <?php endforeach; ?>
		        <?php endif; ?>
		      </case-image-block>
		    </case-block>

		  <?php endforeach; ?>
		<?php endif; ?>


		
<?php else: ?>
	<p class="error">No case study found for that ID.</p>
<?php endif; ?>	
	</inner-column>
</section>