<nav class="main-nav">
	<a  class="attention-voice logo <?= $currentPage['name'] === 'home' ? 'highlight' : ''?>" href="<?= ENV === 'production'? '/' : '?page=home'?>">Ernesto Rivera-Saavedra</a>

	<ul class="visually-hidden">
		<li data-tilt data-tilt-scale="1.1">
			<a class="attention-voice <?= $currentPage['name'] === 'about' ? 'highlight' : ''?>" href="<?= ENV === 'production'? '/about' : '?page=about'?>">About <div class="menu-circle"></div></a>
		</li>

		<li data-tilt data-tilt-scale="1.1">
			<a class="attention-voice <?= $currentPage['name'] === 'design' ? 'highlight' : ''?>" href="<?= ENV === 'production'? '/design' : '?page=design'?>">Playground <div class="menu-circle"></div></a>
		</li>
		
		<li data-tilt data-tilt-scale="1.1" class="external-link">
			<a class="attention-voice" target="_blank" href="https://lapanaderia.substack.com/">Thoughts</a>
			<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#181818" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
		</li>

		<li data-tilt data-tilt-scale="1.1" class="external-link">
			<a class="attention-voice" href="mailto:ersaavedra.nc@gmail.com">Let's Chat</a>
			<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#181818" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
		</li>
	</ul>

	<button id="open" class="attention-voice button opaque <?=$currentPage['name'] === 'garden' ? 'show' : 'hidden'?>">Menu</button>
</nav>
<div class="mobile-menu visually-hidden">
		<ul>
			<li>
				<a class="attention-voice <?= $currentPage['name'] === 'about' ? 'highlight' : ''?>" href="<?= ENV === 'production'? '/about' : '?page=about'?>">About <div class="menu-circle"></div></a>
			</li>

			<li>
				<a class="attention-voice <?= $currentPage['name'] === 'design' ? 'highlight' : ''?>" href="<?= ENV === 'production'? '/design' : '?page=design'?>">Playground <div class="menu-circle"></div></a>
			</li>
			
			<li>
				<a class="attention-voice" target="_blank" href="https://lapanaderia.substack.com/">Thoughts</a>
				<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#181818" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
			</li>

			<li>
				<a class="attention-voice" href="mailto:ersaavedra.nc@gmail.com">Let's Chat</a>
				<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#181818" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
			</li>
		</ul>
	</div>