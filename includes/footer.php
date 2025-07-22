	</main>

	<footer class="site-footer">
		<inner-column>
			<nav class="footer-nav">
				<a href="?page=resume" class=" quiet-voice">Resume</a>
				<a href="?page=style-guide" class="quiet-voice">Style Guide</a>
			</nav>
			
		</inner-column>
	</footer>

	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
	<script type="module" src="js/script.js"></script>
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