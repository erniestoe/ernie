<section class="adding-numbers main-grid">
	<header>
		<inner-column>
			<h2 class="attention-voice" id="addingnumbers">Adding Numbers</h2>

			<noscript>
				<p class="error">JavaScript is disabled 😱 — no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>
		</inner-column>
	</header>

	<div class="forms main-subgrid">
		<form-container>
			<inner-column>
				<header>
					<h3 class="strong-voice">Running Total</h3>
					<p>Each time you submit a number, it gets added to your session-based total.</p>
				</header>

				<?php
					

					if (!isset($_SESSION['total'])) {
						$_SESSION['total'] = 0;
					}

					if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["number"])) {
						$number = intval($_POST["number"]);
						$_SESSION['total'] += $number;
					}
				?>

				<form method="POST" action="#addingnumbers">
					<div class="field">
						<label>Enter a number:</label>
						<input type="number" name="number" required>
					</div>

					<button class="button" type="submit">Add</button>

					<div class="form-output">
						<p>Running total: <strong><?= $_SESSION['total'] ?></strong></p>
					</div>
				</form>
			</inner-column>
		</form-container>
	</div>
</section>
