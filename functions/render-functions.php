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

		<div class="project-gallery main-carousel">
			<?php foreach($selectedProject["gallery-images"] as $galleryImage) {?>
				<?php if ($galleryImage["orientation"] == 'portrait'): ?>
				<picture class="portrait carousel-cell">
					<img src="<?=$galleryImage["src"]?>">
				</picture>
				<?php endif ?>

				<?php if ($galleryImage["orientation"] == 'landscape'): ?>
				<picture class="landscape carousel-cell">
					<img src="<?=$galleryImage["src"]?>">
				</picture>
				<?php endif ?>
			<?php }?>
		</div>

		<a href="index.php?page=home" class="home-link">Go back home?</a>  
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
    	"style-guide"=> "style-guide.css",
    	"lab"=> "lab.css",
    	"case-study-index"=> "case-study-index.css",
    	"case-study"=> "case-study.css",
    	"e4p-index" => "e4p-index.css",
    	"exercise" => "exercise.css",
    	"resume" => "resume.css",
    	"goals" => "goals.css",
    	"404" => "404.css"
	];

	if (ENV === 'staging') {
		return isset($cssPages[$page]) ? 'css/' . $cssPages[$page] : 'css/style.css';
	} else {
		return isset($cssPages[$page]) ? '/css/' . $cssPages[$page] : '/css/style.css';
	}
	
}

//Renders Layout garden section
function renderGardenSection() {
		$modules = [
			"innerColumn" => [
				"modules/layout-garden/footer-madness/footer-madness.php",
				"modules/layout-garden/bold-cards/bold-cards.php"
			],
			"noInnerColumn" => [
				"modules/layout-garden/layout-challenge/layout-challenge.php",
				"modules/layout-garden/info-card/info-card.php",
				"modules/layout-garden/intro-grid/intro-grid.php",
				"modules/layout-garden/news-section/news-section.php",
				"modules/layout-garden/split-splash/split-splash.php",
				"modules/layout-garden/bento-grid/bento-grid.php",
				"modules/layout-garden/ad-card/ad-card.php",
				"modules/layout-garden/spotlight-cards/spotlight-cards.php",
				"modules/layout-garden/nice-header/nice-header.php",
				"modules/layout-garden/bio-and-list/bio-and-list.php",
				"modules/layout-garden/event-section/event-section.php",
				"modules/layout-garden/staggered-grid/staggered-grid.php",
				"modules/layout-garden/specs-section/specs-section.php",
				"modules/layout-garden/project-description/project-description.php",
				"modules/layout-garden/block-layout/block-layout.php",
				"modules/layout-garden/project-list/project-list.php",
				"modules/layout-garden/split-hero/split-hero.php",
				"modules/layout-garden/trendy-splash/trendy-splash.php",
				"modules/layout-garden/testimonial-cards/testimonial-cards.php",
				"modules/layout-garden/circle-bio/circle-bio.php",
				"modules/layout-garden/services-section/services-section.php",
				"modules/layout-garden/project-list-2/project-list-2.php",
				"modules/layout-garden/text-grid/text-grid.php",
				"modules/layout-garden/minimal-layout/minimal-layout.php",
				"modules/layout-garden/stats-grid/stats-grid.php",
				"modules/layout-garden/research-and-employ/research-and-employ.php",
				"modules/layout-garden/layout-challenge-grid/layout-challenge-grid.php",
				"modules/layout-garden/opendot-footer/opendot-footer.php",
				"modules/layout-garden/grid-layout-1/grid-layout-1.php",
				"modules/layout-garden/grid-layout-2/grid-layout-2.php",
				"modules/layout-garden/grid-layout-3/grid-layout-3.php",
				"modules/layout-garden/grid-layout-4/grid-layout-4.php",
				"modules/layout-garden/three-card-stats/three-card-stats.php",
				"modules/layout-garden/medley-week-layout-1/medley-week-layout-1.php",
				"modules/layout-garden/medley-week-layout-2/medley-week-layout-2.php",
				"modules/layout-garden/medley-week-layout-3/medley-week-layout-3.php",
				"modules/layout-garden/fun-cta/fun-cta.php"
			]
		];

		foreach ($modules["noInnerColumn"] as $module) { ?>
			<?php include $module?>
		<?php } ?>

	<?php 
		foreach ($modules["innerColumn"] as $module) { ?>
			<?php include $module?>
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