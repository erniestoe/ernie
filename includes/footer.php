	</main>

	<footer class="site-footer <?=$currentPage['name'] === 'garden'? 'garden-footer': ''?>">
		<inner-column>
			<nav class="footer-nav">
				<!-- <a href="<?= ENV === 'production' ? '/resume' : '?page=resume'?>" class=" quiet-voice">Resume</a> -->
				
				<a href="<?= ENV === 'production' ? '/style-guide' : '?page=style-guide'?>" class="quiet-voice">Style Guide</a>
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

	<div id="video-hover-label">See Case Study</div>
	</body>
</html>