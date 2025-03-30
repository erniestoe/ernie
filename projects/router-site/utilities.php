<?php 

function QueryString() {
	return $_SERVER['QUERY_STRING'];
}

function getPageData($currentPage) {
	$filePath = "data/{$currentPage}.json";

	if (file_exists($filePath)) {
		$jsonData = file_get_contents($filePath);
		return json_decode($jsonData, true);
	}

	return null;
}