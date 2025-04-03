<?php 
include ('includes/router.php');
include ('functions/index.php');
//Checks which server site is currently on
checkServer();
//Function to get the current page and to include and its data
list($page, $pageInclude) = getCurrentPage();

include ('includes/header.php');

include $pageInclude; 
include ('includes/footer.php');