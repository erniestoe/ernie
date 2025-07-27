	</main>

	<footer class="site-footer <?=$currentPage['name'] === 'garden'? 'garden-footer': ''?>">
		<inner-column>
			<nav class="footer-nav">
				<a href="<?= ENV === 'production' ? '/resume' : '?page=resume'?>" class=" quiet-voice">Resume</a>
				<a class="attention-voice footer-contact" href="mailto:ersaavedra.nc@gmail.com">Let's Chat</a>
				<a href="<?= ENV === 'production' ? '/style-guide' : '?page=style-guide'?>" class="quiet-voice">Style Guide</a>
			</nav>
			
		</inner-column>
	</footer>
	
	<script type="module" src="<?= ENV === 'production' ? '/js/script.js' : 'js/script.js'?>"></script>
	<script type="text/javascript" src="<?= ENV === 'production' ? '/js/vanilla-tilt.js' : 'js/vanilla-tilt.js'?>"></script>
	<script src="<?= ENV === 'production' ? '/js/fslightbox.js' : 'js/fslightbox.js'?>"></script>
	<?php if ($currentPage['name'] === 'case-study-index') : ?>
		<script src="https://cdn.jsdelivr.net/npm/p5@1.11.7/lib/p5.min.js"></script>
		
		<script src="assets/p5/circle.js"></script>
		<script src="assets/p5/sketch.js"></script>
	<?php endif; ?>

	<?php if ($currentPage['name'] === 'home') : ?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

		<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/MorphSVGPlugin.min.js"></script>
	<?php endif; ?>

	</body>

</html>