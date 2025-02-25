<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forsyth Community Resources</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 
		include "includes/functions.php";
	?>
	<header>
		<inner-column id="top">
			<h1 class="logo loud-voice">Forsyth Community Resources</h1>
		</inner-column>
	</header>

	<main>
		<?php renderData(); ?>
	</main>
	<footer>
		<inner-column>
			<a href="#top">Back to top</a>
		</inner-column>
	</footer>
</body>
</html>