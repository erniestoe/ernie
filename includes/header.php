<?php 
$pageData = getPageData($currentPage['name']);
$pageTitle = renderPageTitle($currentPage['name']);
?>
<!doctype html>
<html lang='en'>
	<head>
		<title><?=$pageTitle?></title>
		<meta charset="utf-8">
		<meta property="og:title" content="Ernies site">
		<meta property="og:image" content="https://peprojects.dev/beta-two/ernie/assets/images/meta-image.png">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?= renderCSS($currentPage['name']);?>" >
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">
	</head>

	<body>
		<header class="site-header">
			<inner-column>
				<masthead>
					<h2 class="site-title"><a href="<?=BASE_URL;?>/index.php">Ernesto Saavedra</a></h2>
					

					<nav>
						<a href="index.php?page=garden">Layout Garden</a> <a href="index.php?page=design">Visual Design</a> <a href="index.php?page=programming">E4P</a>
					</nav>
				</masthead>
			</inner-column>
		</header>

		<main>