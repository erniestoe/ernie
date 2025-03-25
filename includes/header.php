<?php 
	// Checks to see if running on herd server
	if ($_SERVER['HTTP_HOST'] === 'ernie.test') {
    	define('BASE_URL', '');
	} else {
    	define('BASE_URL', '/beta-two/ernie'); //url for deployment server
	}

	$page = isset($_GET['page']) ? $_GET['page'] : 'home';


	$cssPages = [
   	"home" => "home.css", 
    	"garden" => "layout-garden.css",
    	"design" => "design.css",
    	"programming" => "exercises-for-programmers.css",
    	"project" => "project.css",
    	"404" => "404.css"
	];

	$pageInclude = 'pages/' . $page . '.php';

	if (!file_exists($pageInclude)) {
		 http_response_code(404);
		$page = "404";
    	$pageInclude = 'pages/404.php';
	}

	$cssFile = isset($cssPages[$page]) ? 'css/' . $cssPages[$page] : 'css/style.css';
?>
<!doctype html>

<html lang='en'>
	<head>
		<title>Ernies Index!</title>
		<meta charset="utf-8">
		<meta property="og:title" content="Ernies Index!">
		<meta property="og:image" content="https://peprojects.dev/beta-two/ernie/assets/images/meta-image.png">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?= $cssFile ?>" >
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