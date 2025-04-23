<?php
function getEnvironment() {
	$host = $_SERVER['HTTP_HOST'];

	if ($host === 'ernie.test') {
		return 'local';
	} elseif (strpos($host, 'peprojects.dev') !== false) {
		return 'staging';
	} elseif ($host === 'ersaavedra.dev') {
		return 'production';
	} else {
		return 'unkown';
	}
}

function checkServer() {
	if (!defined('ENV')) {
		define('ENV', getEnviroment());
	}

	if (ENV === 'local') {
		define('BASE_URL', '');
	} elseif (ENV === 'staging') {
		define('BASE_URL', '/beta-two/ernie');
	} else {
		define('BASE_URL', '');
	}
}