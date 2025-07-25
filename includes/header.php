<?php 
$pageData = getPageData($currentPage['name']);
$pageTitle = renderPageTitle($currentPage['name']);
$data = json_decode(file_get_contents('data/e4p-index.json'), true);
$exercises = $data['exercises'];
$isSlidesMode = isset($_GET['slides']) && $_GET['slides'] === 'true';
$projectFiles = glob('data/project-data/*.json');
$projects = [];


foreach ($projectFiles as $file) {
	$data = json_decode(file_get_contents($file), true);
	if ($data) {
		$projects[] = $data;
	}
}

if ($currentPage['name'] === 'case-study') {
	$bodyClass = "body-invert";
	$headerClass = "header-invert";
} else if ($currentPage['name'] === 'garden') {
	$bodyClass = "body-garden";
	$headerClass = "header-garden";
	$mainClass= "main-garden";
} else {
	$bodyClass = "";
	$headerClass = "";
}
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
		<link rel="stylesheet" href="https://use.typekit.net/gnm8vwc.css">
	</head>

	<body class="<?= $isSlidesMode ? 'slides-mode' : '' ?> main-grid <?=$bodyClass?>">
		<aside class="<?=$headerClass?>">
			<header>
				<button id="open" class="quiet-voice <?=$currentPage['name'] === 'garden' ? 'show' : 'hidden'?>">Menu</button>

				<div class="mobile-menu visually-hidden">
					<inner-column>
					<nav>
						<ul>
							<li>
								<a class="loud-voice" href="?">Home</a>
							</li>
							<li>
								<a class="loud-voice" href="?page=case-study-index">Work</a>
							</li>
							<li>
								<a class="loud-voice" href="?page=design">Playground</a>
							</li>
							<li>
								<a class="loud-voice" href="">Blog</a>
								<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#f5f5f5" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
							</li>
						</ul>
					</nav>

					<button id="close" class="quiet-voice bold">Close</button>
					</inner-column>
				</div>
			</header>
			<inner-column>
			
			<h1 class="logo <?=$currentPage['name'] === 'garden' ? 'hidden': ''?>">Ernesto <br> Rivera-Saavedra</h1>

			<?php if($currentPage['name'] === 'garden'):?>
				<nav class="garden-nav">
					<h2 class="calm-voice bold">Layout Garden.</h2>
				</nav>
			<?php endif;?>

			<?php if($currentPage['name'] != 'garden'):?>
			<nav class="main-nav visually-hidden">
				<ul>
					<li>
						<a class="loud-voice <?= $currentPage['name'] === 'home' ? 'highlight' : ''?>" href="/">Home</a>
					</li>
					<li>
						<a class="loud-voice <?= $currentPage['name'] === 'case-study-index' ? 'highlight' : ''?>" href="?page=case-study-index">Work</a>
					</li>
					<li>
						<a class="loud-voice <?= $currentPage['name'] === 'design' ? 'highlight' : ''?>" href="?page=design">Playground</a>
					</li>
					<li>
						<a class="loud-voice" target="_blank" href="https://lapanaderia.substack.com/">Blog</a>
						<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="<?=$currentPage['name'] === 'case-study' ? '#f5f5f5' : '#141402'?>" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
					</li>
				</ul>
			</nav>

			<a class="attention-voice contact visually-hidden" href="mailto:ersaavedra.nc@gmail.com">Let's Chat</a>
			</inner-column>
			<?php endif;?>
		</aside>

		<main class="<?=$mainClass?>">