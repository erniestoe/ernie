<?php
function renderFaqList() {
	$data = getFaqsData();

	foreach($data as $card) {?>
		<li class="faq">
			<details class="grey-600">
			  <summary><?= $card["title"]?> <span class="summary-toggle"></span></summary>
			  <?=$card["text"]?>
			</details>
		</li>
	<?php }
}

function renderFeaturesCards() {
	$data = getFeaturesData();

	foreach($data as $card) {?>
		<li class="feature-card flex-center">
			<div class="icon"><?= $card["svg"]?></div>
				<h3 class="strong-voice"><?= $card["title"]?></h3>
				<p class="grey-600"><?= $card["text"]?></p>
		</li>
	<?php }
}

function renderCenterContentCards() {
	$data = getCenterContentData();

	foreach($data as $card) {?>
		<li>
			<h3 class="strong-voice"><?= $card["title"] ?></h3>
			<p class="grey-600"><?= $card["text"] ?></p>
		</li>
	<?php }
}