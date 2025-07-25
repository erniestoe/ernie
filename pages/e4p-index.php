<?php
$data = json_decode(file_get_contents('data/e4p-index.json'), true);
$exercises = $data['exercises'];

?>

<section class="e4p-index">
	<inner-column>

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