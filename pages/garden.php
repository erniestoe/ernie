<section class="layout-garden">
	<header class="page-header" id="top">
		<inner-column>
			<h1 class="loud-voice"><?=$pageData['title'];?></h1>
		</inner-column>
	</header>

	<section class="main-garden">
		<inner-column>
			<?php renderGardenSection();?>
		</inner-column>
	</section>


	<footer class="page-footer">
		<inner-column>	
			<a href="#top" class="calm-voice">Back to top</a>
		</inner-column>
	</footer>
</section>

