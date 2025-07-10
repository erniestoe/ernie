<?php 
$projectId = $_GET['id'] ?? null;
$project = null;

if ($projectId) {
	$projectFiles = glob('data/project-data/*.json');

	foreach ($projectFiles as $file) {
		$data = json_decode(file_get_contents($file), true);
		if ($data && $data['id'] == $projectId) {
			$project = $data;
			break;
		}
	}
}
?>

<section class="case-study ">
	<?php if ($project): ?>
	<header>
		<picture>
			<img loading="lazy" src="<?= $project['headerImage'] ?>">
		</picture>
	</header>
	<inner-column class="main-grid">
		
			<div class="text">
				<h2 class="attention-voice"><?= $project['projectName'] ?></h2>

				<ul class="tag-list">
					<?php foreach ($project['tags'] as $tag): ?>
						<li class="tag"><?= $tag ?></li>
					<?php endforeach; ?>
				</ul>


				<p><?= $project['caseStudy'] ?></p>
			</div>

			<?php if ($project['video']): ?>
				<div class="video">
					<iframe  src="<?= $project['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</div>
			<?php endif; ?>

			<links>
				<div class="live">
					<h2 class="strong-voice">Live sites</h2>

					<ul>
						<?php foreach ($project['liveLinks'] as $liveLink):?>
							<li>
								<a target="_blank" href="<?=$liveLink['href']?>"><?=$liveLink['text']?></a>

								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
							</li>
						<?php endforeach; ?>
						
					</ul>
				</div>

				<?php if ($project['githubLinks']): ?>
					<div class="github">
						<h2 class="strong-voice">Github</h2>

						<ul>
							<?php foreach ($project['githubLinks'] as $githubLink):?>
								<li>
									<a target="_blank" href="<?=$githubLink['href']?>"><?=$githubLink['text']?></a>

									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
								</li>
							<?php endforeach; ?>
						</ul>

					</div>
				<?php endif; ?>
			</links>

			<case-study-gallery class="main-subgrid">
				<?php foreach ($project['gallery']  as $image): ?>
					<picture>
						<img loading="lazy" src="<?= $image['src']; ?>">
					</picture>
				<?php endforeach; ?>
			</case-study-gallery>
				
		<?php else: ?>
			<p class="error">No case study found for that ID.</p>
		<?php endif; ?>	
	</inner-column>
</section>