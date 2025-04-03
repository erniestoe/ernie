<?php
function checkServer() {
	if ($_SERVER['HTTP_HOST'] === 'ernie.test') {
    	define('BASE_URL', '');
	} else {
    	define('BASE_URL', '/beta-two/ernie'); //url for deployment server
	}
}