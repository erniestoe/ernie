<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forsyth Community Resources</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<inner-column id="top">
			<h1 class="logo loud-voice">Forsyth Community Resources</h1>
			<a href="#top" aria-label="Go back to the beginning" class="top-button">Back to top</a>
		</inner-column>
	</header>

	<main>
		<?php
			include "includes/functions.php";
		 	renderData(); 
		?>
	</main>
</body>
</html>