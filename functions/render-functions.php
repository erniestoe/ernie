<?php 
//Renders projectList module on homepage from project data
function renderProjectList() {
	$projectData = getProjectData();

	$count = 0;

	foreach($projectData as $project) {
		$count++;?>
		<li>
			<p class="number"><?=$count < 10 ? 0 . $count : $count ?></p>

			<a class="calm-voice" href="index.php?page=project&id=<?=$project['id'];?>"><?=$project["projectName"]?></a>
		</li>
	<?php }
}

//Renders Project page content based on id from project data
function renderProject() {
	$projectData = getProjectData();

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
	} 
	
	?>
	<project>
		<header>
			<h1 class="loud-voice"><?=$selectedProject["projectName"];?></h1>
			<picture>
    			<img src="<?=$selectedProject["images"][1]["src"];?>">
    		</picture>
		</header>

		<div class="project-text">
			<div class="project-goal project-grid">
    			<h2 class="project-goal-title attention-voice">Goal</h2>
  				<p class="project-goal-text"><?=$selectedProject["projectGoal"];?></p>		
    		</div>

    		<div class="project-overview project-grid">
    			<h2 class="project-overview-title attention-voice">Overview</h2>
    			<p class="project-overview-text"><?=$selectedProject["projectOverview"];?></p>
    		</div>

    		<div class="project-problem project-grid">
    			<h2 class="project-problem-title attention-voice">Problem</h2>
    			<p class="project-problem-text"><?=$selectedProject["projectProblem"];?></p>
    		</div>

    		<div class="project-research project-grid">
    			<h2 class="project-research-title attention-voice">Research</h2>
    			<p class="project-research-text"><?=$selectedProject["projectResearch"];?></p>

    			<picture>
    				<img src="<?=$selectedProject["images"][0]["src"];?>">
    			</picture>
    		</div>

    		<div class="project-solution project-grid">
    			<h2 class="project-solution-title attention-voice">Solution</h2>
    			<p class="project-solution-text"><?=$selectedProject["projectSolution"];?></p>
    			<ul>
    			<?php foreach($selectedProject["projectFeatures"] as $feature) {?>
    				<li>
    					<p><?= $feature["feature"];?></p>
    				</li>
    			<?php } ?>
    			</ul>
    		</div>

    		<div class="project-approach project-grid">
    			<h2 class="project-approach-title attention-voice">Approach</h2>
    			<p class="project-approach-text"><?=$selectedProject["projectApproach"];?></p>
    		</div>

    		<div class="project-challenges project-grid">
    			<h2 class="project-challenges-title attention-voice">Challenges</h2>
    			<ul>
    			<?php foreach($selectedProject["projectChallenges"] as $challenge) {?>
    				<li>
    					<p><?= $challenge["text"];?></p>
    				</li>
    			<?php } ?>
    			</ul>
    		</div>

    		<div class="project-results project-grid">
    			<h2 class="project-results-title attention-voice">Results</h2>
    			<p><?=$selectedProject["projectResults"];?></p>
    		</div>

    		<div class="project-links ">
    			<ul>
    			<?php foreach($selectedProject["links"] as $link) {?>
    				<li>
    					<a target="_blank" href="<?=$link["href"];?>"><?=$link["text"];?></a>
    				</li>
    			<?php } ?>
    			</ul>
    		</div>
		</div>
    	
		<!-- <a href="index.php?page=home" class="home-link">Go back home?</a>   -->
	</project>
	<?php 
}

//Determines which css page to link in head
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

//Renders Layout garden section
function renderGardenSection() {
		$modules = [
			"innerColumn" => [
				"modules/footer-madness/footer-madness.php",
				"modules/bold-cards/bold-cards.php"
			],
			"noInnerColumn" => [
				"modules/layout-challenge/layout-challenge.php", "modules/info-card/info-card.php", "modules/intro-grid/intro-grid.php", "modules/news-section/news-section.php", "modules/split-splash/split-splash.php", "modules/bento-grid/bento-grid.php", "modules/ad-card/ad-card.php", "modules/spotlight-cards/spotlight-cards.php", "modules/nice-header/nice-header.php", "modules/bio-and-list/bio-and-list.php", "modules/event-section/event-section.php", "modules/staggered-grid/staggered-grid.php", "modules/specs-section/specs-section.php", "modules/project-description/project-description.php", "modules/block-layout/block-layout.php", "modules/project-list/project-list.php", "modules/split-hero/split-hero.php", "modules/trendy-splash/trendy-splash.php", "modules/testimonial-cards/testimonial-cards.php", "modules/circle-bio/circle-bio.php", "modules/services-section/services-section.php", "modules/project-list-2/project-list-2.php", "modules/text-grid/text-grid.php", "modules/minimal-layout/minimal-layout.php", "modules/stats-grid/stats-grid.php", "modules/research-and-employ/research-and-employ.php", "modules/layout-challenge-grid/layout-challenge-grid.php", "modules/opendot-footer/opendot-footer.php", "modules/grid-layout-1/grid-layout-1.php", "modules/grid-layout-2/grid-layout-2.php", "modules/grid-layout-3/grid-layout-3.php", "modules/grid-layout-4/grid-layout-4.php", "modules/three-card-stats/three-card-stats.php", "modules/medley-week-layout-1/medley-week-layout-1.php"
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

function renderPageTitle($page) {
    $pageData = getPageData($page);

    if ($page != "project") {
    	return $pageData && isset($pageData['title']) ? $pageData['title'] : "Ernies Site!";
    } else {
    	$projectData = getProjectData();
    	$projectID = $_GET['id'];
		$selectedProject = null;

		foreach ($projectData as $project) {
			if ($project["id"] == $projectID) {
				$selectedProject = $project;
				break;
			}
		}
		
    	return $selectedProject["projectName"];
    }
    
}