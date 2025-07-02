<section class="driving-age main-grid">
	<header>
		<inner-column>
			<h2 class="attention-voice" id="drivingAge">Legal Driving Age</h2>

			<noscript>
				<p class="error">JavaScript is disabled 😱 — no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>
		</inner-column>
	</header>

	<div class="forms main-subgrid">
		<form-container>
			<inner-column>
				<header>
					<h3 class="strong-voice">PHP Form</h3>
					<p>A simple PHP-powered form to check if you’re old enough to drive (U.S. law edition).</p>
				</header>

				<form method="POST" action="#drivingAge">
					<div class="field">
						<label>What is your age?</label>
						<input type="number" name="age" value="<?= isset($_POST["getResult"]) ? $_POST["age"] : "" ?>">
					</div>

					<button class="button" type="submit" name="getResult">See if you can legally drive!</button>
				</form>

				<div class="form-output">
					<?php 
					if (isset($_POST["getResult"])) {
						$age = intval($_POST["age"]);

						if ($age < 0 || !is_numeric($age)) {
							echo "<p class='error'>Please enter a valid age</p>";
						} else {
							echo $age >= 16 
								? "<p>You are old enough to legally drive</p>" 
								: "<p>You are not old enough to legally drive</p>";
						}
					}
					?>
				</div>
			</inner-column>
		</form-container>
	</div>
</section>
