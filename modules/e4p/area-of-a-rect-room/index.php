<section class="area-of-rect-room main-grid">
		<header>
			<inner-column>
				<h2 class="attention-voice" id="area">Area of a rectangular room</h2>
				<noscript>
				<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>

				<?php 
				$length = 0;
				$width = 0;

				if (isset($_POST["submit"])) {
					if (isset($_POST["length"]) ) {
						$length = intval($_POST["length"]);
					}

					if (isset($_POST["width"]) ) {
						$width = intval($_POST["width"]);
					}
				}

				$squareFeet = $length * $width;
				$squareMeters = $squareFeet * 0.09290304;?>
			</noscript>
			</inner-column>
		</header>

		<div class="forms main-subgrid">
			<form-container>
				<inner-column>
					<header>
						<h2 class="strong-voice">Attempt 1</h2>
						<p>A basic form made with PHP but upgraded with some JavaScript... Still requires you to click a button to get the result :(</p>
					</header>

					

					<form method="POST" action="#area">
						

						<div class="field">
							<label>What is the length of the room in feet?</label>
							<input type="number" name="length" value="<?=isset($_POST["submit"]) ? $length : " " ?>">
						</div>

						<div class="field">
							<label>What is the width of the room in feet?</label>
							<input type="number" name="width" value="<?=isset($_POST["submit"]) ? $width : " " ?>">
						</div>

						<button class="button" type="submit" name="submit">Get Results</button>
					</form>

					<div class="form-output">

						<?php 
						if (isset($_POST["submit"])) {
							if (is_numeric($_POST["length"]) && is_numeric($_POST["width"]) ) { ?>

								<p>You entered dimensions of <?=$length?> feet by <?=$width?> feet</p>

								<p>The area is:</p>

								<p><?=$squareFeet?> square feet</p>

								<p><?=$squareMeters?> square meters</p>
						
						<?php } elseif(!is_numeric($_POST["length"])) {
								echo "<p>Please enter a number value for the room length</p>";
							} elseif(!is_numeric($_POST["width"])) {
								echo "<p>Please enter a number value for the room width</p>";
							} else {
								echo "<p>Please enter a number</p>";
							}
					
						}?>
					</div>
				</inner-column>
			</form-container>

			<form-container>
				<inner-column>
					<header>
						<h2 class="strong-voice">Attempt 2</h2>
						<p>Still a basic form made with PHP but this time no button! (Asynchronous updates)</p>
					</header>
					

					<form class="area-v2">
						<div class="field">
							<label>What is the length of the room in feet?</label>
							<input type="number" name="length">
						</div>

						<div class="field">
							<label>What is the width of the room in feet?</label>
							<input type="number" name="width">
						</div>
					</form>

					<div class="form-output"></div>
				</inner-column>
			</form-container>
		</div>
		
</section>