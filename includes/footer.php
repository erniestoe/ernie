	</main>

	<footer class="site-footer <?=$currentPage['name'] === 'garden'? 'garden-footer': ''?>">
		<inner-column>
			<nav class="footer-nav">
				<a class="<?= $currentPage['name'] === 'style-guide' ? 'highlight quiet-voice bold' : 'quiet-voice bold'?>" href="<?= ENV === 'production' ? '/style-guide' : '?page=style-guide'?>" class="quiet-voice bold">Style Guide <div class="menu-circle"></div></a>

				<?php if ($currentPage['name'] === 'case-study'): ?>
					<next-project>
						<a class="quiet-voice bold" href="<?= ENV === 'production'? '/case-study/' . $project['nextProject']['slug'] : '?page=case-study&slug=' . $project['nextProject']['slug'] ?>">
							See Next Project
						</a>

						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>
					</next-project>
				<?php endif ?>
			</nav>
			</inner-column>
	</footer>

	<script type="module" src="<?= ENV === 'production' ? '/js/script.js' : 'js/script.js'?>"></script>
	<script type="text/javascript" src="<?= ENV === 'production' ? '/js/vanilla-tilt.js' : 'js/vanilla-tilt.js'?>"></script>
	<script src="<?= ENV === 'production' ? '/js/fslightbox.js' : 'js/fslightbox.js'?>"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/MorphSVGPlugin.min.js"></script>

	<?php if ($currentPage['name'] === 'design'): ?>
		<script src="https://cdn.jsdelivr.net/npm/p5@1.11.9/lib/p5.min.js"></script>
		<script src="/js/p5/eyeballs/sketch.js"></script>
		<script src="/js/p5/circles/sketch.js"></script>
	<?php endif; ?>

	<?php if ($currentPage['name'] === 'case-study'): ?>
		<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
		<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
	<?php endif;?>

	<div class="circle"></div>

	<div id="video-hover-label">See Case Study</div>
	</body>
</html>