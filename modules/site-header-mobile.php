<header>
	<button id="open" class="quiet-voice <?=$currentPage['name'] === 'garden' ? 'show' : 'hidden'?>">Menu</button>

	<div class="mobile-menu visually-hidden">
		<inner-column>
		<nav>
			<ul>
				<li>
					<a class="loud-voice" href="<?= ENV === 'production'? '/' : '?page=home'?>">Home</a>
				</li>
				<li>
					<a class="loud-voice" href="<?= ENV === 'production'? '/case-study-index' : '?page=case-study-index'?>">Work</a>
				</li>
				<li>
					<a class="loud-voice" href="<?= ENV === 'production'? '/design' : '?page=design'?>">Playground</a>
				</li>
				<li>
					<a class="loud-voice" href="">Blog</a>
					<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#f5f5f5" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
				</li>
			</ul>
		</nav>

		<button id="close" class="quiet-voice bold">Close</button>
		</inner-column>
	</div>
</header>