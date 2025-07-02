<section class="simple-interest main-grid">
	<header>
		<inner-column>
			<h2 class="attention-voice" id="interest">Computing Simple Interest</h2>

			<noscript>
				<p class="error">JavaScript is disabled 😱 — no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>
		</inner-column>
	</header>

	<div class="forms main-subgrid">
		<form-container>
			<inner-column>
				<header>
					<h3 class="strong-voice">Calculate Your Interest</h3>
					<p>Enter your principal, interest rate, and number of years to calculate your return.</p>
				</header>

				<?php
				$principal = 0;
				$rate = 0;
				$years = 0;
				$total = null;

				if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["principal"], $_POST["roi"], $_POST["years"])) {
					$principal = intval($_POST["principal"]);
					$rate = floatval($_POST["roi"]);
					$years = intval($_POST["years"]);
					$total = $principal * (1 + ($rate / 100 * $years));
				}
				?>

				<form method="POST" action="#interest">
					<div class="field">
						<label>Enter the principal:</label>
						<input type="number" name="principal" required value="<?= $principal ?>">
					</div>

					<div class="field">
						<label>Enter the rate of interest (as %):</label>
						<input type="number" name="roi" step="any" required value="<?= $rate ?>">
					</div>

					<div class="field">
						<label>Enter the number of years:</label>
						<input type="number" name="years" required value="<?= $years ?>">
					</div>

					<button class="button" type="submit">Calculate</button>

					<div class="form-output">
						<?php if ($total): ?>
							<p>After <strong><?= $years ?></strong> year<?= $years === 1 ? '' : 's' ?> at <strong><?= $rate ?>%</strong>, the investment will be worth <strong>$<?= number_format($total, 2) ?></strong>.</p>
						<?php endif; ?>
					</div>
				</form>
			</inner-column>
		</form-container>
	</div>
</section>
