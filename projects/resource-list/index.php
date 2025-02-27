<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forsyth Community Resources</title>
	<link rel="stylesheet" href="css/style.css">
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
					<h2 class="attention-voice">Filter</h2>
					<ul class="filters-top">
						<?php renderFilters(); ?>
					</ul>
				
			</inner-column>
		</section>

		<?php
		 	renderData(); 
		?>

		<footer>
			<inner-column>
				<?php if ($currentFilter !== 'all') {?>
					<h2 class="attention-voice">Filter</h2>
					<ul class="filters-bottom">
						<?php renderFilters(); ?>
					</ul>
				<?php }?>
			</inner-column>
		</footer>
	</main>
</body>
</html>