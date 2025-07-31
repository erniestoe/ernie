<nav class="main-nav visually-hidden">
	<ul>
		<li data-tilt data-tilt-scale="1.1">
			<a class="loud-voice <?= $currentPage['name'] === 'home' ? 'highlight' : ''?>" href="<?= ENV === 'production'? '/' : '?page=home'?>">Home</a>
		</li>
		<li data-tilt data-tilt-scale="1.1">
		<?php if(ENV === 'local'): ?>
			<a class="loud-voice <?= $currentPage['name'] === 'case-study-index' ? 'highlight' : ''?>" href="?page=case-study-index">Work</a>
		<?php endif; ?>

		<?php if(ENV === 'staging'): ?>
			<a class="loud-voice <?= $currentPage['name'] === 'case-study-index' ? 'highlight' : ''?>" href="?page=case-study-index">Work</a>
		<?php endif; ?>


		<?php if(ENV === 'production'): ?>
			<a class="loud-voice <?= $currentPage['name'] === 'case-study-index' ? 'highlight' : ''?>" href="/case-study-index">Work</a>
		<?php endif; ?>	
		</li>

		<?php if($currentPage['name'] === 'case-study'):?>
			<?php foreach ($projects as $projectLink):?>
			<li data-tilt data-tilt-scale="1">
				<a class="quiet-voice <?= $projectSlug === $projectLink['slug'] ? 'highlight' : ''?>" href="<?= ENV === 'production' ? '/case-study/' . $projectLink['slug'] : '?page=case-study&slug=' . $projectLink['slug'] ?>"><?=$projectLink['projectName'] ?></a>
			</li>
			<?php endforeach;?>
		<?php endif;?>

		<li data-tilt data-tilt-scale="1.1">
			<a class="loud-voice <?= $currentPage['name'] === 'design' ? 'highlight' : ''?>" href="<?= ENV === 'production'? '/design' : '?page=design'?>">Playground</a>
		</li>
		<li data-tilt data-tilt-scale="1.1">
			<a class="loud-voice" target="_blank" href="https://lapanaderia.substack.com/">Blog</a>
			<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="<?=$currentPage['name'] === 'case-study' ? '#f5f5f5' : '#141402'?>" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
		</li>
	</ul>
</nav>