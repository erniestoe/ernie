<section class="temp-converter main-grid">
	<header>
		<inner-column>
			<h2 class="attention-voice" id="converter">Temperature Converter</h2>
			<noscript>
				<p class="error">JavaScript is disabled 😱 — no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>
		</inner-column>
	</header>

	<div class="forms main-subgrid">
		<form-container>
			<inner-column>
				<form method="POST" action="#converter">
					<header>
						<h3 class="strong-voice">Convert Celsius ↔ Fahrenheit</h3>
						<p>A multi-step temperature converter powered by PHP logic.</p>
					</header>

					<?php 
					$error = "";

					if (isset($_POST["nextStep"])) {
						$choice = strtolower($_POST["choice"]);
						if ($choice !== "c" && $choice !== "f") {
							$error = "Please enter either Celsius (C) or Fahrenheit (F).";
						}
					}
					?>

					<div class="form-output">
						<?php if (!isset($_POST["nextStep"]) || $error || isset($_POST["reset"])) { ?>
							<p>Press C to convert from Fahrenheit to Celsius</p>
							<p>Press F to convert from Celsius to Fahrenheit</p>

							<div class="field">
								<label>Your Choice:</label>
								<input type="text" name="choice">
							</div>

							<button class="button" type="submit" name="nextStep">Next Step</button>
						<?php } ?>

						<?php if ($error) { ?>
							<p class="error"><?= $error ?></p>
						<?php } ?>

						<?php if (isset($_POST["nextStep"]) && !$error && !isset($_POST["reset"])) {
							$choice = strtolower($_POST["choice"]); ?>
							<div class="field">
								<label>Please enter the temperature in <?= $choice === "c" ? "Fahrenheit" : "Celsius" ?>:</label>
								<input type="number" name="temp">
								<input type="hidden" name="choice" value="<?= $choice ?>">
							</div>

							<button class="button" type="submit" name="convertTemp">Get conversion</button>
						<?php } ?>

						<?php 
						if (isset($_POST["convertTemp"])) {
							$choice = strtolower($_POST["choice"]);
							$userTemp = intval($_POST["temp"]);
							$convertedTemp = ($choice === "c") ? ($userTemp - 32) * 5 / 9 : ($userTemp * 9 / 5) + 32;
							$convertedUnit = ($choice === "c") ? "Celsius" : "Fahrenheit";
							?>
							<p>The temperature in <?= $convertedUnit ?> is <?= round($convertedTemp, 2) ?>°</p>
							<button class="button" type="submit" name="reset">Convert again?</button>
						<?php } ?>
					</div>
				</form>
			</inner-column>
		</form-container>
	</div>
</section>
