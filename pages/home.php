<section class="home-content">
	<inner-column class="main-grid">
		<h1 class="logo">Ernesto Saavedra</h1>

		<!-- <canvas id="homepageCanvas" class="homepage-canvas"></canvas> -->

			<canvas id="homepageCanvas" class="homepage-canvas"></canvas>
			<p class="canvas-hint quiet-voice">
				<span class="bobbing">↑</span> Try moving your mouse here (tap on mobile)
			</p>

			<!-- <button id="fallButton" class="calm-voice button">DESTROY</button> -->

	
		<p class="about"><?=$pageData['about']?></p>

		<p class="contact"><?=$pageData['contact']?></p>

		<work-list>
			<h2 class="strong-voice">Select work</h2>

			<ul class="home-work-list">
			<?php foreach ($projects as $project) {?>
				<li>
					<p><?= $project['projectName']?></p>

					<a href="?page=case-study&id=<?=$project['id']?>">
						View Case
					</a>
				</li>
			<?php }?>
			</ul>
		</work-list>

	</inner-column>
</section>

