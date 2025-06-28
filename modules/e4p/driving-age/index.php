<section class="driving-age">
	<inner-column>
		<noscript>
			<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
		</noscript>

		<form method="POST" action="#drivingAge">
			<h2 class="attention-voice" id="#drivingAge">Legal Driving Age</h2>

			<div class="field">
				<label>What is your age?</label>
				<input type="number" name="age" value="<?=isset($_POST["getResult"]) ? $_POST["age"] : " " ?>">
			</div>

			<button type="submit" name="getResult">See if you can legally drive!</button>
		</form>
		<div class="form-output">
			
		<?php 
			if (isset($_POST["getResult"])) {
				$age = intval($_POST["age"]);

				if ($age < 0 || !is_numeric($age) ) {
					echo "<p class='error'>Please enter a valid age</p>";
				} else {
					echo $age >=16 ? "<p>You are old enough to legally drive</p>" : "<p>You are not old enough to legally drive</p>";	
				}

			}
		?>
		</div>
	</inner-column>
</section>