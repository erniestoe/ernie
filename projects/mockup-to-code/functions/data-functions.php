<?php
function getFaqsData() {
	$filePath =  "data/modules/faqs.json";

	if (file_exists($filePath)) {
		$data = file_get_contents($filePath);
		return json_decode($data, true);
	}
	
	return [];
}

function getFeaturesData() {
	$filePath =  "data/modules/features-data.json";

	if (file_exists($filePath)) {
		$data = file_get_contents($filePath);
		return json_decode($data, true);
	}
	
	return [];
}

function getCenterContentData() {
	$filePath =  "data/modules/center-content-data.json";

	if (file_exists($filePath)) {
		$data = file_get_contents($filePath);
		return json_decode($data, true);
	}
	
	return [];
}