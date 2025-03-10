<article-grid>
		<inner-column>
			<header>
				<h2 class="attention-voice">This is an "Article grid" module. This is its heading</h2>

				<p>Again, we totally just made that up. It's a box with boxes in it.</p>
			</header>
			<?php 
				function renderCTACard() {
					$miniCTA = [
						"title" => "This is an article card",
						"text" => "It's basically a mini call to action, right?",
						"button" => "act!"
					];

					?>
					<li class="article-card mini-cta">
						<h2 class="attention-voice"><?=$miniCTA["title"]?></h2>

						<p><?=$miniCTA["text"]?></p>

						<a href="#" class="cta-button"><?=$miniCTA["button"]?></a>
					</li>
					<?php 
				}

				function renderArticleCard() {
					$articleCard = [
						"title" => "This is the title of an article ",
						"text" => "Here's a little info to help you understand if this is an article you want to read.",
						"button" => "Read more"
					];

					?>
					<li class="article-card">
						<h2 class="attention-voice"><?=$articleCard["title"]?></h2>

						<p><?=$articleCard["text"]?></p>

						<a href="#" class="cta-button"><?=$articleCard["button"]?></a>
					</li>
					<?php 
				}
			?>

			<ul class="article-cards">
				<?=renderCTACard()?>
				<?php for($i = 0; $i < 5; $i++) {?>
					<?=renderArticleCard()?>
				<?php } ?>
			</ul>


		</inner-column>
	</article-grid>