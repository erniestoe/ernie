<?php 
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