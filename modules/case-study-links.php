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