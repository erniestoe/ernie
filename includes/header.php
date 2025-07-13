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

	<body class="<?= $isSlidesMode ? 'slides-mode' : '' ?>">
		<div id="circle-cursor"></div>
		<header class="site-header" id="top">
			<inner-column>
				<masthead>
					<div class="menu-container main-grid">
						<button class="calm-voice button" rel='toggle' id="open">Menu</button>


						<button class="
						calm-voice button 
						<?php
						if ($currentPage['name'] === 'style-guide') {
							?>hidden<?php }?>
						" rel='toggle' id="<?php
								if ($currentPage['name'] === 'garden') {
									?>openOptionsMenu<?php
								} else if ($currentPage['name'] === 'exercise') {
									?>openExerciseIndexMenu<?php
								} else if ($currentPage['name'] === 'case-study') {
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
								} else if ($currentPage['name'] === 'case-study') {
									?>Index<?php
								} else if ($currentPage['name'] === 'style-guide') {
									?><?php
								} else {
									?><?php
								}
							 ?>
						</button>

						<?php if ($currentPage['name'] === 'style-guide') { ?>
							<a class="calm-voice button <?= $isSlidesMode ? 'slides-mode-active' : '' ?>" href="?page=style-guide<?= $isSlidesMode ? '' : '&slides=true' ?>">
						<?= $isSlidesMode ? 'Normal Mode' : 'Slides Mode' ?></a>
						<?php } ?>



						<?php if ($currentPage['name'] === 'garden') {?>
							<!-- <div class="options-menu visually-hidden">
								<form id="gardenControls" class="garden-controls">
									<div class="field">
										<label>border-radius</label>
										<input type="range" name="borderRadius" min="0" max="100" value="8">
									</div>

									<div class="field">
										<label>font-size</label>
										<input type="range" name="fontSize" min="14" max="128" value="16">
									</div>

									<div class="field">
										<label>font-weight</label>
										<input type="range" name="fontWeight" min="100" max="900" step="100" value="400">
									</div>

									<div class="field color-mode main-subgrid">
										<div class="subfield">
											<label>Color</label>
											<input type="radio" name="colorMode" value="color" checked>
										</div>
										
										<div class="subfield">
											<label>Black & White</label>
											<input type="radio" name="colorMode" value="bw">
										</div>
									</div>

								</form>


								<div class="menu-button">
									<button class="calm-voice button" rel='toggle' id="closeOptionsMenu">Close</button>
								</div>
							</div> -->
							<div class="options-menu visually-hidden">
								<form id="gardenControls" class="garden-controls">
									<div class="field">
										<label>border-radius</label>
										<input type="range" name="borderRadius" min="0" max="100" value="8">
									</div>

									<div class="field">
										<label>font-size</label>
										<input type="range" name="fontSize" min="14" max="128" value="16">
									</div>

									<div class="field">
										<label>font-weight</label>
										<input type="range" name="fontWeight" min="100" max="900" step="100" value="400">
									</div>

									<div class="field">
										<label>unit</label>
										<input type="range" name="unit" min="0.4" max="0.8" step="0.01" value="0.5">
									</div>

									<div class="field">
										<label>space increment</label>
										<input type="range" name="spaceIncrement" min="1" max="2" step="0.01" value="1">
									</div>

									<div class="field">
										<label>accent hue</label>
										<input type="range" name="accentHue" min="0" max="360" step="1" value="180">
									</div>

									<div class="field">
										<label>accent saturation</label>
										<input type="range" name="accentSaturation" min="0" max="100" step="1" value="50">
									</div>

									<div class="field">
										<label>accent lightness</label>
										<input type="range" name="accentLightness" min="0" max="100" step="1" value="50">
									</div>

									<div class="field color-mode main-subgrid">
										<div class="subfield">
											<label>Color</label>
											<input type="radio" name="colorMode" value="color" checked>
										</div>
										
										<div class="subfield">
											<label>Black & White</label>
											<input type="radio" name="colorMode" value="bw">
										</div>
									</div>
								</form>

								<div class="menu-button">
									<button class="calm-voice button" rel='toggle' id="closeOptionsMenu">Close</button>
								</div>
							</div>
						<?php }?>

						<?php if ($currentPage['name'] === 'exercise') {?>
							<div class="exercise-menu visually-hidden">
								<nav class="exercise-links">
										<?php foreach ($exercises as $exercise): ?>
											<a href="?page=exercise&id=<?= $exercise['id'] ?>">
												<?= $exercise['title'] ?>
											</a>
										<?php endforeach; ?>
									</nav>

								<div class="menu-button">
									<button class="calm-voice button" rel='toggle' id="closeExerciseIndexMenu">Close</button>
								</div>
							</div>
						<?php } ?>

						<?php if ($currentPage['name'] === 'case-study') {?>
							<div class="case-menu visually-hidden">
									<nav class="case-links">
										<?php foreach ($projects as $project): ?>
											<a href="?page=case-study&id=<?= $project['id'] ?>">
												<?= $project['projectName'] ?>
											</a>
										<?php endforeach; ?>
									</nav>
									<div class="menu-button">
										<button class="calm-voice button" rel='toggle' id="closeWorkIndexMenu">Close</button>
									</div>
								</div>
						<?php } ?>
					
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

									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
								</li>
								<li>
									<a target="_blank" href="https://codepen.io/erivera-s">CodePen</a>

									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
								</li>
								<li>
									<a href="?page=case-study-index">Work</a>
								</li>
								<li>
									<a href="?page=lab">The Lab</a>
								</li>
								<li>
									<a href="?page=e4p-index">Exercises for Programmers</a>
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