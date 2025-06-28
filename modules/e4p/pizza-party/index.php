<section class="pizza-party">
	<inner-column>
		<noscript>
			<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
		</noscript>

		<form method="POST" action="#pizzaParty">
			<h2 class="attention-voice" id="pizzaParty">Pizza Party</h2>

			<div class="field">
				<label>How many people?</label>
				<input type="number" name="people" value="<?=isset($_POST["splitPizzas"]) ? $_POST["people"] : " " ?>">
			</div>

			<div class="field">
				<label>How many pizzas do you have?</label>
				<input type="number" name="pizzas" value="<?=isset($_POST["splitPizzas"]) ? $_POST["pizzas"] : " " ?>">
			</div>

			<div class="field">
				<label>How many slices per pizza do you have?</label>
				<input type="number" name="slices" value="<?=isset($_POST["splitPizzas"]) ? $_POST["slices"] : " " ?>">
			</div>

			<button type="submit" name="splitPizzas">Divy the pizzas up!</button>
		</form>
		<div class="form-output">
			<?php 
		if (isset($_POST["splitPizzas"])) {
			$people = intval($_POST["people"]);
			$pizzas = intval($_POST["pizzas"]);
			$slicesPerPizza = intval($_POST["slices"]);

			if ($people != 0 && $pizzas != 0 && $slicesPerPizza != 0) { 
				$totalSlices = $pizzas * $slicesPerPizza;
				$slicesPerPerson = $totalSlices / $people;
				$leftoverSlices = $totalSlices % $people;
			?>
				<p><?=$people?> <?=$people === 1 ? "person" : "people"?> with <?=$pizzas?> <?=$pizzas === 1 ? "pizza" : "pizzas"?></p>

				<p><?=$people === 1 ? "They" : "each person"?> gets <?=$slicesPerPerson?> <?=$slicesPerPerson <= 1 ? "piece" : "pieces"?> of pizza</p>

				<p>There <?=$leftoverSlices === 1 ? "is" : "are"?> <?=$leftoverSlices === 0 ? "no" :$leftoverSlices?> leftover <?=$leftoverSlices === 1 ? "piece" : "pieces" ?></p>

		<?php } else { ?>
					<p class="error">Please enter a number greater than 0</p>
		<?php }
		} ?>
		</div>
	</inner-column>
</section>