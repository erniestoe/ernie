<?php
$data = json_decode(file_get_contents('data/e4p-index.json'), true);
$exercises = $data['exercises'];

?>

<section class="e4p-index">
	<inner-column>
		<header>
				<h2 class="attention-voice"><?= $pageTitle; ?></h2>

				<p>A collection of programming exercises done by me using PHP, JavaScript, and Vue. Think of them as mini case studies. </p>
		</header>

		<ul class="index-list">
			<?php foreach ($exercises as $exercise): ?>
				<li>
					<a class="calm-voice" href="?page=exercise&id=<?= $exercise['id'] ?>">
						<?= $exercise['title'] ?>
					</a>

					<div class="selected"></div>
				</li>
			<?php endforeach; ?>
		</ul>
		


	</inner-column>
</section>