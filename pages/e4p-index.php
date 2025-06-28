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

		<?php foreach ($exercises as $exercise): ?>
				<a href="?page=exercise&id=<?= $exercise['id'] ?>">
					<?= $exercise['title'] ?>
				</a>
			<?php endforeach; ?>


	</inner-column>
</section>