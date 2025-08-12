<header>
	<button id="open" class="quiet-voice <?=$currentPage['name'] === 'garden' ? 'show' : 'hidden'?>">Menu</button>

	<div class="mobile-menu visually-hidden">
		<inner-column>
		<nav>
			<ul>
				<li>
					<a class="loud-voice" href="<?= ENV === 'production'? '/' : '?page=home'?>">Home</a>
				</li>
				<!-- <li>
					<a class="loud-voice" href="<?= ENV === 'production'? '/case-study-index' : '?page=case-study-index'?>">Work</a>
				</li>
				<?php if($currentPage['name'] === 'case-study'):?>
					<?php foreach ($projects as $projectLink):?>
					<li>
						<a class="quiet-voice <?= $projectSlug === $projectLink['slug'] ? 'highlight' : ''?>" href="<?= ENV === 'production' ? '/case-study/' . $projectLink['slug'] : '?page=case-study&slug=' . $projectLink['slug'] ?>"><?=$projectLink['projectName'] ?></a>
					</li>
					<?php endforeach;?>
				<?php endif;?> -->
				<li>
					<a class="loud-voice" href="<?= ENV === 'production'? '/design' : '?page=design'?>">Playground</a>
				</li>
				<li>
					<a class="loud-voice" target="_blank" href="https://lapanaderia.substack.com/">Blog</a>
					<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#f5f5f5" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
				</li>

				<li>
					<a class="loud-voice" href="mailto:ersaavedra.nc@gmail.com">Lets Chat</a>
					<svg class="mail" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#F5F5F5" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM203.43,64,128,133.15,52.57,64ZM216,192H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg>
				</li>
			</ul>
		</nav>

		<button id="close" class="quiet-voice bold">Close</button>
		</inner-column>
	</div>
</header>