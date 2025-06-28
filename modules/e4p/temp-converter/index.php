<section class="temp-converter">
	<inner-column>
		<form method="POST" action="#converter">
			<h2 class="attention-voice" id="converter">Temperature Converter</h2>

			<div class="form-step"></div>

			<div class="form-output"></div>

			<noscript>
				<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>

				<?php 
			$error = "";

			if (isset($_POST["nextStep"])) {
				$choice = strtolower($_POST["choice"]);

				if ($choice !== "c" && $choice !== "f" && $choice !== " ") {
					$error = "Please enter either Celsius (C) or Fahrenheit (F).";
				}
			}
			?>

			<?php if (isset($_POST["nextStep"]) && isset($_POST["convertTemp"]) || !isset($_POST["reset"]) || $error) {?>
				<p>Press C to convert from Farenheit to Celsius</p>
				<p>Press F to convert from Celsius to Farenheit</p>

				<div class="field">
					<label>Your Choice:</label>
					<input type="text" name="choice">
				</div>

				<button type="submit" name="nextStep">Next Step</button>
			<?php }
				if ($error) { ?>
				<p class="error"><?=$error?></p>
			<?php	} ?>

			<?php if (isset($_POST["nextStep"]) && !$error) {
				$choice = strtolower($_POST["choice"]);?>
				<div class="field">
					<label>Please enter the temperature in <?php
						if ($choice === "c") {
							echo "Farenheit";
						}

						if ($choice === "f") {
							echo "Celsius";
						}
					 ?></label>

					 <input type="number" name="temp">

					 <input type="hidden" name="choice" value="<?php echo $choice; ?>">
				</div>

				<button type="submit" name="convertTemp">Get conversion</button>
			<?php } ?>

			<?php 
				if (isset($_POST["convertTemp"])) { 
					$choice = strtolower($_POST["choice"]);
					$userTemp = intval($_POST["temp"]);
					$convertedTemp = ($choice === "c") ? ($userTemp - 32) * 5 / 9 : ($userTemp * 9 / 5) + 32;
					$convertedUnit = ($choice === "c") ? "Celsius" : "Fahrenheit";
					?>
					
					<p>The temperature in <?=$convertedUnit; ?> is <?=round($convertedTemp, 2);?></p>
						
					<button type="submit" name="reset">Convert again?</button>
			<?php	}?>
			
		</form>
	</inner-column>
</section>