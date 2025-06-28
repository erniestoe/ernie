<?php 
$exerciseId = $_GET['id'] ?? null;


$exercise = null;
foreach ($exercises as $item) {
	if ($item['id'] === $exerciseId) {
		$exercise = $item;
		break;
	}
}
?>

<section class="exercise">
	<inner-column>
		<?php if ($exercise): ?>
					
					<?php include($exercise['path']); ?>
				<?php else: ?>
					<p class="error">No exercise found for ID “<?= htmlspecialchars($exerciseId) ?>”.</p>
				<?php endif; ?>
	</inner-column>
</section>