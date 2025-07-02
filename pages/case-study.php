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

			<links>
				<div class="live">
					<h2 class="strong-voice">Live sites</h2>

					<ul>
						<li>
							<a target="_blank" href="#">Forsyth Community Resources</a>

							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
						</li>

						<li>
							<a target="_blank" href="#">OpenResource.io</a>

							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
						</li>
					</ul>
				</div>

				<div class="github">
					<h2 class="strong-voice">Github</h2>

					<ul>
						<li>
							<a target="_blank" href="#">Forsyth Community Resources</a>

							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
						</li>

						<li>
							<a target="_blank" href="#">OpenResource.io</a>

							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
						</li>
					</ul>

				</div>
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