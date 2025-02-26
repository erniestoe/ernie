<!doctype html>

<html lang='en'>
	<head>
		<title>Layout garden module!</title>
		<link rel="stylesheet" href="modules/bold-cards/bold-cards.css">
	</head>

	<body>
		<bold-cards>
			<?php 
				function renderCard() {
					$cardData = [
					"card1" => ["Ignite Ip", "https://peprojects.dev/images/square.jpg", "Dust off the once-loved DVDs to give them new life - with the help of a passionate and talented community of creators."],

					"card2" => ["Net new stories", "https://peprojects.dev/images/square.jpg", "Engage your community to develop new content - you may meet the next great villain, hero, underdog, sidekick, or trickster."],

					"card3" => ["Fandom Boost", "https://peprojects.dev/images/square.jpg", "Your fans are your most underutilized marketing asset — help them help you bring more eyes to your project."],
				];

					
					foreach($cardData as $card) { ?>
						<li class="card">
							<h3 class="loud-voice"><?=$card[0]?></h3>

							<picture>
								<img src="<?=$card[1]?>">
							</picture>

							<p><?=$card[2]?></p>
						</li>
				 	<?php }
				}
			?>

			<header>
				<h2 class="attention-voice">Bring more reach, revenue, and creativity to your projects</h2>

				<p>Incetion is reinventing how franchises launch and evolve in the digital age, building technology that aligns premium IP holders with talented creators - to bring great stories (back) to life.</p>
			</header>

			<ul class="cards">
				<?php renderCard() ?>
				
			</ul>
		</bold-cards>


	</body>

</html>