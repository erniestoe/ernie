<!doctype html>

<html lang='en'>
	<head>
		<title>Layout garden module!</title>
		
		<link rel="stylesheet" href="modules/layout-challenge/layout-challenge.css">
	</head>

	<body>

	<main>

			<responsive-layout-challenge>
				<div class="circle-2"></div>
				
				<header class="layout-header">
					<inner-column>
						<div class="logo">[[logo]]</div>
					</inner-column>
				</header>

				<section class="layout-main">

					<section class="layout-splash">
						
						<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  							<circle class="circle-1" cx="10" cy="10" r="10" />
						</svg>

						

						<inner-column>
							<picture>
								<img src="https://peprojects.dev/images/landscape.jpg">
							</picture>

							<div class="layout-splash-text">
								<!-- H1 -->
								<h2 class="layout-splash-heading loud-voice">Heading level 1</h2>

								<a class="layout-splash-link strong-voice">Click here</a>
							</div>

							<div class="pokemon">
								<img src="https://media.tenor.com/Se7v-5GA5iUAAAAj/charizard-pokemon-charizard.gif">
							</div>
						</inner-column>
					</section>

					<section class="layout-info">

						<inner-column>
							<info-box>
								<picture>
									<img src="https://peprojects.dev/images/landscape.jpg">
								</picture>
								
								<div class="info-box-text">
									<h3>Heading here</h3>
								</div>
							</info-box>

							<info-box>
								<picture>
									<img src="https://peprojects.dev/images/landscape.jpg">
								</picture>
								
								<div class="info-box-text">
									<h3>Heading here</h3>
								</div>
							</info-box>
						</inner-column>
					</section>

				</section>

				<footer class="layout-footer">
					<inner-column>
						<div class="logo">[[logo]]</div>
					</inner-column>
				</footer>
			</responsive-layout-challenge>
	</main>

	</body>

</html>