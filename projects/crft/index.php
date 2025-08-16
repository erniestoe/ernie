<?php
	$showData = json_decode(file_get_contents('data/show-data.json'), true);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
	<meta property="og:title" content="CRFT">
	<meta property="og:description" content="Wintson Salems Hottest Music Venue">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRFT</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
	<header class="site-header">
		<inner-column>
		<div class="header-container">
			<svg class="header-logo logo" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2" viewBox="0 0 1080 1080"><path d="M0 0h1080v1080H0z" style="fill:none"/><path d="M40.04 40.01h474.258v457.306H40.04zM1040.004 493.834H565.709C609.42 401.37 701.65 342.59 802.894 342.59c101.168 0 193.398 58.78 237.11 151.245ZM40.006 586.18h474.295C470.59 678.646 378.36 737.425 277.116 737.425c-101.168 0-193.398-58.78-237.11-151.245ZM1040.004 342.559H565.709c43.711-92.466 135.942-151.245 237.185-151.245 101.168 0 193.398 58.78 237.11 151.245ZM40.006 737.456h474.295C470.59 829.92 378.36 888.7 277.116 888.7c-101.168 0-193.398-58.78-237.11-151.245ZM1040.004 191.23H565.709C609.42 98.764 701.65 39.985 802.894 39.985c101.168 0 193.398 58.78 237.11 151.245ZM40.006 888.731h474.295c-43.711 92.466-135.942 151.245-237.185 151.245-101.168 0-193.398-58.78-237.11-151.245Z"/><circle cx="2724.16" cy="1699.75" r="42.631" transform="matrix(5.25743 0 0 5.32286 -13532.19 -8234.488)"/></svg>

			<h1 class="logo-word">CRFT</h1>
		</div>
		</inner-column>
	</header>

	<section class="splash">
		<inner-column>
			<h2 class="loud-voice">Minimal interiors. Maximal sound.</h2>
		</inner-column>
	</section>

	<section class="schedule">
		<inner-column>
		<?php if(!empty($showData['shows']) && is_array($showData['shows'])): ?>
			<ul class="show-list">
				<?php foreach($showData['shows'] as $show): ?>
					<li class="show-card">
						<details>
							<summary>
								<?= $show['title'] ?>
								<?= $show['date'] ?>
							</summary>
							<?php foreach($show['blurb'] as $blurb):?>
								<?= $blurb['text'] ?>
							<?php endforeach; ?>
						</details>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

			<figure class="hidden">
				<img src="https://res.cloudinary.com/dhgciqwbz/image/upload/v1753633882/kira-3000_rfgdxs.png">

				<figcaption class="strong-voice">Kira 3000</figcaption>
			</figure>
		</inner-column>
	</section>
<!-- 
	<section class="about">
		<inner-column>
			<p class="attention-voice">From sun up to sun down, we believe thats the best time for good music, local drinks, and your “main character” moment.</p>

			<p class="attention-voice">So join us at CRFT on opening night for all that while supporting local artists and musicians.</p>
		</inner-column>
	</section> -->

	<footer>
		<inner-column>
			<div class="footer-container">
				<p>548 1st St. Winston-Salem, NC</p>

				<svg class="footer-logo logo" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2" viewBox="0 0 1080 1080"><path d="M0 0h1080v1080H0z" style="fill:none"/><path d="M40.04 40.01h474.258v457.306H40.04zM1040.004 493.834H565.709C609.42 401.37 701.65 342.59 802.894 342.59c101.168 0 193.398 58.78 237.11 151.245ZM40.006 586.18h474.295C470.59 678.646 378.36 737.425 277.116 737.425c-101.168 0-193.398-58.78-237.11-151.245ZM1040.004 342.559H565.709c43.711-92.466 135.942-151.245 237.185-151.245 101.168 0 193.398 58.78 237.11 151.245ZM40.006 737.456h474.295C470.59 829.92 378.36 888.7 277.116 888.7c-101.168 0-193.398-58.78-237.11-151.245ZM1040.004 191.23H565.709C609.42 98.764 701.65 39.985 802.894 39.985c101.168 0 193.398 58.78 237.11 151.245ZM40.006 888.731h474.295c-43.711 92.466-135.942 151.245-237.185 151.245-101.168 0-193.398-58.78-237.11-151.245Z"/><circle cx="2724.16" cy="1699.75" r="42.631" transform="matrix(5.25743 0 0 5.32286 -13532.19 -8234.488)"/></svg>
			</div>
		</inner-column>
	</footer>
</body>
</html>