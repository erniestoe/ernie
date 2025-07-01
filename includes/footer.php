	</main>

	<footer class="site-footer">
		<inner-column>
			<nav class="main-grid">
				<a href="?page=goals" class="button calm-voice">Goals</a>
				<a href="?page=style-guide" class="button calm-voice">Style Guide</a>
				<a href="?page=resume" class="button calm-voice">Resume</a>
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

	</body>

</html>