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
	<header>
		<picture>
			<img src="https://res.cloudinary.com/dhgciqwbz/image/upload/v1751379392/CleanShot_2025-07-01_at_10.16.02_2x_wn8upc.png">
		</picture>
	</header>
	<inner-column class="main-grid">
		<?php if ($project): ?>
			<div class="text">
				<h2 class="attention-voice"><?= $project['projectName'] ?></h2>

				<ul class="tag-list">
					<?php foreach ($project['tags'] as $tag): ?>
						<li class="tag"><?= $tag['tag'] ?></li>
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
						</li>

						<li>
							<a target="_blank" href="#">OpenResource.io</a>
						</li>
					</ul>
				</div>

				<div class="github">
					<h2 class="strong-voice">Github</h2>

					<ul>
						<li>
							<a target="_blank" href="#">Forsyth Community Resources</a>
						</li>

						<li>
							<a target="_blank" href="#">OpenResource.io</a>
						</li>
					</ul>

				</div>
			</links>
			

			
		<?php else: ?>
			<p class="error">No case study found for that ID.</p>
		<?php endif; ?>

		<case-study-gallery class="main-subgrid">
			
		</case-study-gallery>
	</inner-column>
</section>