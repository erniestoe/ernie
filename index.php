<?php 
include ('functions/index.php'); // Loads core functions
define('ENV', getEnvironment()); //Creates an "enviroment" to be used wherever
checkServer(); //Checks which server site is currently on

include ('includes/router.php'); // Handles routing logic
$currentPage = getCurrentPage(); // Get info for current page (name and file path) -- router function

include ('includes/header.php');
include $currentPage['file']; 
include ('includes/footer.php');