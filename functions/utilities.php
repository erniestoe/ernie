<?php
// function getEnvironment() {
// 	$host = $_SERVER['HTTP_HOST'];

// 	if ($host === 'ernie.test') {
// 		return 'local';
// 	} elseif (strpos($host, 'staging.yoursite.com') !== false) {
// 		return 'staging';
// 	} else {
// 		return 'production';
// 	}
// }

function checkServer() {
	if ($_SERVER['HTTP_HOST'] === 'ernie.test') {
    	define('BASE_URL', '');
	} else {
    	define('BASE_URL', '/beta-two/ernie'); //url for deployment server
	}
}