<?php 
function getCurrentPage() {
	$page = $_GET['page'] ?? 'home';
	$pageFilePath = 'pages/' . $page . '.php';

	if (!file_exists($pageFilePath)) {
		http_response_code(404);
    	return ['name' => '404', 'file' => 'pages/404.php'];
	}

	return ['name' => $page, 'file' => $pageFilePath];
}
