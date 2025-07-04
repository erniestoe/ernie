<?php 
$data = json_decode(file_get_contents('data/style-guide.json'), true);
$styleGuide = $data;

$isSlidesMode = isset($_GET['slides']) && $_GET['slides'] === 'true';
?>

<section class="style-guide">
	
	<?php foreach ($styleGuide['guide'] as $section): ?>
		<section class="<?= $isSlidesMode ? 'slide' : '' ?>">
			<inner-column class="main">
				<?php if (isset($section['toneOfVoice'])): ?>
					<div class="tone-of-voice">
						<h2 class="attention-voice"><?= $section['toneOfVoice']['title'] ?></h2>
						<ol>
							<?php foreach ($section['toneOfVoice']['list'] as $item): ?>
								<li><strong><?= $item ?></strong></li>
							<?php endforeach; ?>
						</ol>
					</div>
				<?php endif; ?>

				<?php if (isset($section['mainPalette'])): ?>
					<div class="main-palette">
						<h2 class="attention-voice"><?= $section['mainPalette']['title'] ?></h2>
						<p><?= $section['mainPalette']['text'] ?></p>

						<picture>
							<img loading="lazy" src="<?= $section['mainPalette']['img']?>">
						</picture>
					</div>
				<?php endif; ?>

				<?php if (isset($section['accentPalette'])): ?>
					<div class="accent-palette">
						<h2 class="attention-voice"><?= $section['accentPalette']['title'] ?></h2>
						<p><?= $section['accentPalette']['text'] ?></p>

						<picture>
							<img loading="lazy" src="<?= $section['accentPalette']['img']?>">
						</picture>
					</div>
				<?php endif; ?>

				<?php if (isset($section['typeface'])): ?>
					<div class="typeface">
						<h2 class="attention-voice"><?= $section['typeface']['title'] ?></h2>
						<h3 class="loud-voice"><?= $section['typeface']['showcase'] ?></h3>
						<p><?= $section['typeface']['text'] ?></p>
					</div>
				<?php endif; ?>

				<?php if (isset($section['typeSystem'])): ?>
					<div class="type-system">
						<h2 class="attention-voice"><?= $section['typeSystem']['title'] ?></h2>
						<ul class="type-system-list">
							<?php foreach ($section['typeSystem']['list'] as $item): ?>
								<li class="<?= $item ?>"><?= $item ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			</inner-column>
		</section>
	<?php endforeach; ?>

</section>