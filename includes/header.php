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
		<header class="site-header" id="top">
			<inner-column>
				<masthead>
					<div class="menu-container main-grid">
						<button class="calm-voice button" rel='toggle' id="open">Menu</button>
						<button class="calm-voice button" rel='toggle' id="<?php
								if ($currentPage['name'] === 'garden') {
									?>openOptionsMenu<?php
								} else if ($currentPage['name'] === 'exercise') {
									?>openE4pIndexMenu<?php
								} else if ($currentPage['name'] === 'case') {
									?>openWorkIndexMenu<?php
								} else {
									?><?php
								}
							 ?>">
							<?php
								if ($currentPage['name'] === 'garden') {
									?>Options<?php
								} else if ($currentPage['name'] === 'exercise') {
									?>Index<?php
								} else if ($currentPage['name'] === 'case') {
									?>Index<?php
								} else {
									?><?php
								}
							 ?>
						</button>

						<?php if ($currentPage['name'] === 'garden') {?>
							<div class="options-menu visually-hidden">
								<form></form>
								<div class="menu-button">
									<button class="calm-voice button" rel='toggle' id="closeOptionsMenu">Close</button>
								</div>
							</div>
						<?php }?>
					
						<nav class="menu visually-hidden">
							<ul>
								<li>
									<a href="?page=home">Home</a>
								</li>
								<li>
									<a href="?page=garden">Layout Garden</a>
								</li>
								<li>
									<a href="?page=design">Visual Design</a>
								</li>
								<li>
									<a target="_blank" href="https://lapanaderia.substack.com/">Blog</a>
								</li>
								<li>
									<a target="_blank" href="https://codepen.io/erivera-s">CodePen</a>
								</li>
								<li>
									<a href="#">Work</a>
								</li>
								<li>
									<a href="?page=lab">The Lab</a>
								</li>
								<li>
									<a href="?page=programming">Exercises for Programmers</a>
								</li>
							</ul>
							
							<div class="menu-button">
								<button class="calm-voice button" rel='toggle' id="close">Close</button>
							</div>
						</nav>
					</div>
					
				</masthead>

				<!-- <a class="back-to-top-button" href="#top" class="calm-voice" aria-label="Go back to the beginning">
					<?php include("includes/svgs/arrow-up.php"); ?>
				</a> -->
			</inner-column>
		</header>

		<main>