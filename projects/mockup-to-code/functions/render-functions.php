<?php
function renderFaqList() {
	$data = getFaqsData();

	foreach($data as $card) {?>
		<li class="faq">
			<div class="title-and-button flex-center-row">
				<h3 class="strong-voice"><?= $card["title"]?></h3>
				<button class="show-text-button">+</button>
			</div>
			

			<p class="hidden-text visually-hidden"><?=$card["text"]?></p>
		</li>
	<?php }
}

function renderFeaturesCards() {
	$data = getFeaturesData();

	foreach($data as $card) {?>
		<li class="feature-card flex-center">
			<div class="icon"><?= $card["svg"]?></div>
				<h3 class="strong-voice"><?= $card["title"]?></h3>
				<p><?= $card["text"]?></p>
		</li>
	<?php }
}

function renderCenterContentCards() {
	$data = getCenterContentData();

	foreach($data as $card) {?>
		<li>
			<h3 class="strong-voice"><?= $card["title"] ?></h3>
			<p><?= $card["text"] ?></p>
		</li>
	<?php }
}