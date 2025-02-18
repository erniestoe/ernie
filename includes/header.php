<?php 
if ($_SERVER['HTTP_HOST'] === 'ernie.test') {
    define('BASE_URL', '');
} else {
    define('BASE_URL', '/beta-two/ernie');
}
?>
<!doctype html>

<html lang='en'>
	<head>
		<title>Ernies Index!</title>
		<meta charset="utf-8">
		<meta property="og:title" content="Ernies Index!">
		<meta property="og:image" content="https://peprojects.dev/beta-two/ernie/assets/images/meta-image.png">
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css" >
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">
	</head>

	<body>
		<header class="site-header">
			<inner-column>
				<masthead>
					<div class="logo"></div>

					<h2 class="site-title">Ernesto Rivera-Saavedra</h2>
				</masthead>
			</inner-column>
		</header>

		<main>