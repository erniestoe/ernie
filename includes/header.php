<?php 
	// Checks to see if running on herd server
	if ($_SERVER['HTTP_HOST'] === 'ernie.test') {
    	define('BASE_URL', '');
	} else {
    	define('BASE_URL', '/beta-two/ernie'); //url for deployment server
	}

	// Defining css files for each page
	$cssPages = [
		"home" => "/css/home.css", 
		"layout-garden" => "/css/layout-garden.css",
		"design" => "/css/design.css",
		"learning" => "/css/exercises-for-programmers.css"
	];

	// Finding the full path for the parent folder -- easier than typing it out?
	$parentFolder = basename(dirname($_SERVER['SCRIPT_NAME']));

	// || to check if its either ernie or blank
	if ($parentFolder === 'ernie' || $parentFolder === '') {
		$parentFolder = 'home'; 
	}

	// Used ?? here to make sure if not found on the left then go to the right (the default)
	$cssLink = BASE_URL . ($cssPages[$parentFolder] ?? "/css/style.css");
?>
<!doctype html>

<html lang='en'>
	<head>
		<title>Ernies Index!</title>
		<meta charset="utf-8">
		<meta property="og:title" content="Ernies Index!">
		<meta property="og:image" content="https://peprojects.dev/beta-two/ernie/assets/images/meta-image.png">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?= $cssLink ?>" >
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">
	</head>

	<body>
		<header class="site-header">
			<inner-column>
				<masthead>
					<div class="logo"></div>

					<h2 class="site-title"><a href="<?=BASE_URL;?>/index.php">Ernesto Rivera-Saavedra</a></h2>
				</masthead>
			</inner-column>
		</header>

		<main>