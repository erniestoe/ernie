<?php
	include "functions.php";
	startSession();
	loadEnv();
	processForm();
	checkServer();

	if (!file_exists('resources.sqlite')) {
		createDB();
		createDBTable();
	}
	
	list($page, $pageInclude) = getCurrentPage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forsyth Community Resources</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body class="<?php echo isset($_SESSION['theme']) ? $_SESSION['theme'] : 'light';?> <?=$page?>">
	
	<header>
		<inner-column id="top">
			<h1 class="logo loud-voice"><a href="index.php">Forsyth Community Resources</a></h1>
			<a href="#top" aria-label="Go back to the beginning" class="top-button">Back to top</a>

			<div class="pdf-list">
				<a href="?page=cart" class="pdf-list-title strong-voice">
        			My PDF <span id="listCount">[[]]</span>
    			</a>
			</div>

			<nav class="admin-nav">
				<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && defined('BASE_URL') && BASE_URL === '') { ?>
					<?php if ($page != 'admin') { ?>
						<a href="index.php?page=admin">Admin</a>
					<?php }?>
					
					<a href="index.php?page=logout">Logout</a>
				<?php } elseif (defined('BASE_URL') && BASE_URL === '') {?>
					<a href="index.php?page=login">Login</a>
				<?php } ?>
			</nav>
		</inner-column>
	</header>

	<main>