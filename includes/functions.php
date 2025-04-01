<?php 
function getJSONData() {
	$filePath = "data/project-data.json";

	if (file_exists($filePath)) {
		$projectData = file_get_contents($filePath);
		return json_decode($projectData, true);
	}

	return null;
}

function renderProjectList() {
	$projectData = getJSONData();

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
	$projectData = getJSONData();

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
    					<a href="<?=$link["href"];?>"><?=$link["text"];?></a>
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

function renderSection() {
		$modules = [
			"innerColumn" => [
				"modules/footer-madness/footer-madness.php",
				"modules/bold-cards/bold-cards.php"
			],
			"noInnerColumn" => [
				"modules/layout-challenge/layout-challenge.php", "modules/info-card/info-card.php", "modules/intro-grid/intro-grid.php", "modules/news-section/news-section.php", "modules/split-splash/split-splash.php", "modules/bento-grid/bento-grid.php", "modules/ad-card/ad-card.php", "modules/spotlight-cards/spotlight-cards.php", "modules/nice-header/nice-header.php", "modules/bio-and-list/bio-and-list.php", "modules/event-section/event-section.php", "modules/staggered-grid/staggered-grid.php", "modules/specs-section/specs-section.php", "modules/project-description/project-description.php", "modules/block-layout/block-layout.php", "modules/project-list/project-list.php", "modules/split-hero/split-hero.php", "modules/trendy-splash/trendy-splash.php", "modules/testimonial-cards/testimonial-cards.php", "modules/circle-bio/circle-bio.php", "modules/services-section/services-section.php", "modules/project-list-2/project-list-2.php", "modules/text-grid/text-grid.php", "modules/minimal-layout/minimal-layout.php", "modules/stats-grid/stats-grid.php", "modules/research-and-employ/research-and-employ.php", "modules/layout-challenge-grid/layout-challenge-grid.php", "modules/opendot-footer/opendot-footer.php", "modules/grid-layout-1/grid-layout-1.php", "modules/grid-layout-1/grid-layout-1.php", "modules/grid-layout-2/grid-layout-2.php", "modules/grid-layout-3/grid-layout-3.php", "modules/grid-layout-4/grid-layout-4.php", "modules/three-card-stats/three-card-stats.php", "modules/monster-adoption/monster-adoption.php"
			]
		];

		foreach ($modules["noInnerColumn"] as $module) { ?>
			<section class="garden-module">
					<?php include $module?>
			</section>
		<?php } ?>

	<?php 
		foreach ($modules["innerColumn"] as $module) { ?>
			<section class="garden-module">
				<inner-column>
					<?php include $module?>
				</inner-column>
			</section>
		<?php } 
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