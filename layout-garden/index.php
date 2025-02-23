<?php include '../includes/header.php' ?>

<header class="page-header" id="top">
	<inner-column>
		<h1 class="loud-voice">Layout Garden</h1>
	</inner-column>
</header>

<?php 
	function renderSection() {
		$modules = [
			"innerColumn" => [
				"modules/footer-madness/footer-madness.php",
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

	renderSection();
?>

<footer class="page-footer">
	<inner-column>	
			<a href="#top" class="calm-voice">Back to top</a>
	</inner-column>
</footer>
			
<?php include '../includes/footer.php' ?>