<?php 
$pageData = getPageData($currentPage['name']);
$pageTitle = renderPageTitle($currentPage['name']);
$data = json_decode(file_get_contents('data/e4p-index.json'), true);
$exercises = $data['exercises'];
$isSlidesMode = isset($_GET['slides']) && $_GET['slides'] === 'true';
$projectFiles = glob('data/project-data/*.json');
$projects = [];
$projectSlug = $_GET['slug'] ?? null;
$projectId = $_GET['id'] ?? null;
$project = null;
$bodyClass = "";
$headerClass = "";
$mainClass = "";

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

if ($projectSlug) {
	$projectFiles = glob('data/project-data/*.json');

	foreach ($projectFiles as $file) {
		$data = json_decode(file_get_contents($file), true);
		if ($data && $data['slug'] == $projectSlug) {
			$project = $data;
			break;
		}
	}
}
?>

<!doctype html>
<html lang='en'>
	<head>
		<title><?=$pageTitle?></title>
		<meta charset="utf-8">
		<meta property="og:title" content="Ernestos Personal Site">
		<meta property="og:description" content="Portfolio of Ernesto Rivera-Saavedra">
		<meta property="og:image" content="https://res.cloudinary.com/dhgciqwbz/image/upload/v1756741273/CleanShot_2025-09-01_at_11.40.11_zt391r.gif">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?= renderCSS($currentPage['name']);?>">
		<link rel="icon" type="image/png" href="https://res.cloudinary.com/dhgciqwbz/image/upload/v1757379971/favicon_xakxfc.png"/>

	</head>

	<body class="<?= $isSlidesMode ? 'slides-mode' : '' ?> main-grid <?=$bodyClass?>">
		
		<header class="main-header">
			<inner-column>
				<?php include('modules/site-header.php') ?>
			</inner-column>
		</header>

		<main class="<?=$mainClass?>">