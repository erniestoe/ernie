<?php
function getPageData($page) {
	$filePath = "data/{$page}.json";

	if (file_exists($filePath)) {
		$jsonData = file_get_contents($filePath);
		return json_decode($jsonData, true);
	}

	return null;
}