<section class="paint-calculator main-grid">
	<header>
		<inner-column>
			<h2 class="attention-voice" id="paint">Paint Calculator</h2>

			<noscript>
				<p class="error">JavaScript is disabled 😱 — no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>
		</inner-column>
	</header>

	<div class="forms main-subgrid">
		<form-container>
			<inner-column>
				<header>
					<h3 class="strong-voice">Estimate Paint Needed</h3>
					<p>Enter the ceiling dimensions to estimate the gallons of paint required (1 gallon covers 350 sq ft).</p>
				</header>

				<?php
				$length = 0;
				$width = 0;
				$gallons = 0;

				if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["length"]) && isset($_POST["width"])) {
					$length = intval($_POST["length"]);
					$width = intval($_POST["width"]);
					$area = $length * $width;
					$gallons = ceil($area / 350);
				}
				?>

				<form method="POST" action="#paint">
					<div class="field">
						<label>Enter the length of the ceiling (ft):</label>
						<input type="number" name="length" required value="<?= $length ?>">
					</div>

					<div class="field">
						<label>Enter the width of the ceiling (ft):</label>
						<input type="number" name="width" required value="<?= $width ?>">
					</div>

					<button class="button" type="submit">Calculate</button>

					<div class="form-output">
						<?php if ($gallons > 0): ?>
							<p>You will need to purchase <strong><?= $gallons ?></strong> gallon<?= $gallons === 1 ? '' : 's' ?> of paint to cover <strong><?= $length * $width ?></strong> square feet.</p>
						<?php endif; ?>
					</div>
				</form>
			</inner-column>
		</form-container>
	</div>
</section>
