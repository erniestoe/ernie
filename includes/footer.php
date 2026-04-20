	</main>
		<footer>
			<inner-column>
				<time-floater>
					<p class="quiet-voice-mono">Winston-Salem <span id="time"></span></p>
				</time-floater>

				<a href="<?= ENV === 'production'? '/research' : '?page=research'?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#1c1c1c" viewBox="0 0 256 256"><path d="M221.69,199.77,160,96.92V40h8a8,8,0,0,0,0-16H88a8,8,0,0,0,0,16h8V96.92L34.31,199.77A16,16,0,0,0,48,224H208a16,16,0,0,0,13.72-24.23ZM110.86,103.25A7.93,7.93,0,0,0,112,99.14V40h32V99.14a7.93,7.93,0,0,0,1.14,4.11L183.36,167c-12,2.37-29.07,1.37-51.75-10.11-15.91-8.05-31.05-12.32-45.22-12.81ZM48,208l28.54-47.58c14.25-1.74,30.31,1.85,47.82,10.72,19,9.61,35,12.88,48,12.88a69.89,69.89,0,0,0,19.55-2.7L208,208Z"></path></svg></a>
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

	</body>
</html>