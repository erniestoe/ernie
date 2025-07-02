<section class="pizza-party main-grid">
	<header>
		<inner-column>
			<h2 class="attention-voice" id="pizzaParty">Pizza Party</h2>
			<noscript>
				<p class="error">JavaScript is disabled 😱 — no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>
		</inner-column>
	</header>

	<div class="forms main-subgrid">
		<form-container>
			<inner-column>
				<header>
					<h3 class="strong-voice">Who gets what?</h3>
					<p>Enter the number of people, pizzas, and slices to see how the pizza should be split up.</p>
				</header>

				<form method="POST" action="#pizzaParty">
					<div class="field">
						<label>How many people?</label>
						<input type="number" name="people" value="<?= isset($_POST["splitPizzas"]) ? $_POST["people"] : "" ?>">
					</div>

					<div class="field">
						<label>How many pizzas do you have?</label>
						<input type="number" name="pizzas" value="<?= isset($_POST["splitPizzas"]) ? $_POST["pizzas"] : "" ?>">
					</div>

					<div class="field">
						<label>How many slices per pizza do you have?</label>
						<input type="number" name="slices" value="<?= isset($_POST["splitPizzas"]) ? $_POST["slices"] : "" ?>">
					</div>

					<button class="button" type="submit" name="splitPizzas">Divvy the pizzas up!</button>
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
							<p><?= $people ?> <?= $people === 1 ? "person" : "people" ?> with <?= $pizzas ?> <?= $pizzas === 1 ? "pizza" : "pizzas" ?></p>
							<p><?= $people === 1 ? "They" : "Each person" ?> get<?= $slicesPerPerson === 1 ? "s" : "" ?> <?= $slicesPerPerson ?> <?= $slicesPerPerson <= 1 ? "piece" : "pieces" ?> of pizza</p>
							<p>There <?= $leftoverSlices === 1 ? "is" : "are" ?> <?= $leftoverSlices === 0 ? "no" : $leftoverSlices ?> leftover <?= $leftoverSlices === 1 ? "piece" : "pieces" ?></p>
						<?php 
						} else {
							echo "<p class='error'>Please enter a number greater than 0 for all fields.</p>";
						}
					}
					?>
				</div>
			</inner-column>
		</form-container>
	</div>
</section>
