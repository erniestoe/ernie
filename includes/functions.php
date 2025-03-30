<?php 
$projectData = include 'data/project-data.php';

function renderProjectList() {
	global $projectData;

	$count = 0;

	foreach($projectData as $project) {
		$count++;?>
		<li>
			<p class="number"><?=$count < 10 ? 0 . $count : $count ?></p>

			<a class="calm-voice" href="index.php?page=project&id=<?=$project['id'];?>"><?=$project["projectName"]?></a>
		</li>
	<?php }
}

function renderProject() {
	global $projectData;

	if (!isset($_GET['id'])) {
		echo "<p>Project not found.</p>";
		return;
	}

	$projectID = $_GET['id'];
	$selectedProject = null;

	foreach ($projectData as $project) {
		if ($project["id"] == $projectID) {
			$selectedProject = $project;
			break;
		}
	}

	if (!$selectedProject) {
		echo "<p>Project not found.</p>";
		return;
	} ?>
	<project>
		<picture>
       		
    	</picture>

    	<div class="project-text">
    		<h1 class="loud-voice"><?=$selectedProject["projectName"];?></h1>
  			<p class="project-description"><?=$selectedProject["projectText"];?></p>
    	</div>

    

    	<div class="project-links">
    		<ul>
    			<?php foreach($selectedProject["links"] as $link) {?>
    				<li>
    					<p><?=$link;?></p>
    				</li>
    			<?php } ?>
    		</ul>
    	</div>
    	

    	
	</project>
	<?php 
}

function renderCSS($page) {
	$cssPages = [
   	"home" => "home.css", 
    	"garden" => "layout-garden.css",
    	"design" => "design.css",
    	"programming" => "exercises-for-programmers.css",
    	"project" => "project.css",
    	"404" => "404.css"
	];

	return isset($cssPages[$page]) ? 'css/' . $cssPages[$page] : 'css/style.css';
}

// Checks to see if running on dev or deployment server
function checkServer() {
	if ($_SERVER['HTTP_HOST'] === 'ernie.test') {
    	define('BASE_URL', '');
	} else {
    	define('BASE_URL', '/beta-two/ernie'); //url for deployment server
	}
}

function getPageData($page) {
	$filePath = "data/{$page}.json";

	if (file_exists($filePath)) {
		$jsonData = file_get_contents($filePath);
		return json_decode($jsonData, true);
	}

	return null;
}