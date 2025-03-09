<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forsyth Community Resources</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
</head>
<body>
	<?php include "includes/functions.php";?>
	<header>
		<inner-column id="top">
			<h1 class="logo loud-voice">Forsyth Community Resources</h1>
			<a href="#top" aria-label="Go back to the beginning" class="top-button">Back to top</a>

			<div class="pdf-list">
				<button class="pdf-list-title strong-voice">My PDF <span id="listCount">[[]]</span></button>

				<div class="visually-hidden user-list">
					
				</div>
			</div>
		</inner-column>
	</header>

	<main>
		<section class="filters">
			<inner-column>
					<?php renderFilters(); ?>
			</inner-column>
		</section>

		<?php
		 	renderData(); 
		?>

		<footer>
			<inner-column>
				<div class="filters">
					<?php if ($currentFilter !== 'all') {?>
						<?php renderFilters(); ?>
					<?php }?>
				</div>
			</inner-column>
		</footer>
	</main>
</body>
</html>