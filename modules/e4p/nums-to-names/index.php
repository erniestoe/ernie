<section class="numbers-to-names main-grid">
	<header>
		<inner-column>
			<h2 class="attention-voice" id="numbersToNames">Numbers to Names</h2>

			<noscript>
				<p class="error">JavaScript is disabled 😱 — no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>
		</inner-column>
	</header>

	<div class="forms main-subgrid">
		<form-container>
			<inner-column>
				<header>
					<h3 class="strong-voice">Convert Number to Month</h3>
					<p>Enter a number (1–12) and get the corresponding month name.</p>
				</header>

				<?php
					$month = null;
					$monthName = "";
					$error = "";

					if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["monthname"])) {
						$month = intval($_POST["monthname"]);
						$months = [
							1 => "January", 2 => "February", 3 => "March", 4 => "April",
							5 => "May", 6 => "June", 7 => "July", 8 => "August",
							9 => "September", 10 => "October", 11 => "November", 12 => "December"
						];

						if ($month >= 1 && $month <= 12) {
							$monthName = $months[$month];
						} else {
							$error = "Please enter a number between 1 and 12.";
						}
					}
				?>

				<form method="POST" action="#numbersToNames">
					<div class="field">
						<label>Please enter the number of the month:</label>
						<input type="number" name="monthname" required value="<?= isset($_POST['monthname']) ? htmlspecialchars($_POST['monthname']) : '' ?>">
					</div>

					<button class="button" type="submit">Get the name of the month</button>

					<div class="form-output">
						<?php if ($monthName): ?>
							<p>The name of the month is <strong><?= $monthName ?></strong>.</p>
						<?php elseif ($error): ?>
							<p class="error"><?= $error ?></p>
						<?php endif; ?>
					</div>
				</form>
			</inner-column>
		</form-container>
	</div>
</section>
