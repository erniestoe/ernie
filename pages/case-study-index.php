<?php
$projects = [];
$projectFiles = glob('data/project-data/*.json');

foreach ($projectFiles as $file) {
	$data = json_decode(file_get_contents($file),true);
	if ($data) {
		$projects[] = $data;
	}
}
?>

<section class="work">
	<inner-column>
		<header>
			<h2 class="attention-voice">
				<?= $pageTitle; ?>
			</h2>

			<p>All my case studies in one place. Enjoy .</p>
		</header>

		<ul class="project-index-list">
		<?php foreach ($projects as $project) {?>
			<li>
				<p><?= $project['projectName']?></p>

				<a href="?page=case-study&id=<?=$project['id']?>">
					View Case
				</a>
			</li>
		<?php }?>
		</ul>
	</inner-column>
</section>