<?php 
$data = json_decode(file_get_contents('data/style-guide.json'), true);
$styleGuide = $data;

$isSlidesMode = isset($_GET['slides']) && $_GET['slides'] === 'true';
?>

<section class="style-guide">
	
	<?php foreach ($styleGuide['guide'] as $section): ?>
		<section class="<?= $isSlidesMode ? 'slide' : '' ?>">
			<inner-column>
				<?php if (isset($section['toneOfVoice'])): ?>
					<h2><?= $section['toneOfVoice']['title'] ?></h2>
					<ol>
						<?php foreach ($section['toneOfVoice']['list'] as $item): ?>
							<li><strong><?= $item ?></strong></li>
						<?php endforeach; ?>
					</ol>
				<?php endif; ?>

				<?php if (isset($section['mainPalette'])): ?>
					<h2><?= $section['mainPalette']['title'] ?></h2>
					<p><?= $section['mainPalette']['text'] ?></p>
				<?php endif; ?>

				<?php if (isset($section['accentPalette'])): ?>
					<h2><?= $section['accentPalette']['title'] ?></h2>
					<p><?= $section['accentPalette']['text'] ?></p>
				<?php endif; ?>

				<?php if (isset($section['typeface'])): ?>
					<h2><?= $section['typeface']['title'] ?></h2>
					<h3><?= $section['typeface']['showcase'] ?></h3>
					<p><?= $section['typeface']['text'] ?></p>
				<?php endif; ?>

				<?php if (isset($section['typeSystem'])): ?>
					<h2><?= $section['typeSystem']['title'] ?></h2>
					<ul>
						<?php foreach ($section['typeSystem']['list'] as $item): ?>
							<li class="<?= $item ?>"><?= $item ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</inner-column>
		</section>
	<?php endforeach; ?>

</section>