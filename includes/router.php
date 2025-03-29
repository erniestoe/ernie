<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$pageInclude = 'pages/' . $page . '.php';

if (!file_exists($pageInclude)) {
	http_response_code(404);
	$page = "404";
    $pageInclude = 'pages/404.php';
}