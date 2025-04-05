<?php
function getEnvironment() {
	$host = $_SERVER['HTTP_HOST'];

	if ($host === 'ernie.test') {
		return 'local';
	} elseif (strpos($host, 'peprojects.dev') !== false) {
		return 'staging';
	} else {
		return 'production';
	}
}

function checkServer() {
	if (ENV === 'local') {
		define('BASE_URL', '');
	} else {
		define('BASE_URL', '/beta-two/ernie');
	}
}