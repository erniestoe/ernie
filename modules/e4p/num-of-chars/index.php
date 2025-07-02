<section class="characters main-grid">
	<header>
		<inner-column>
			<h2 class="attention-voice" id="characters">Counting the Number of Characters</h2>
			<noscript>
				<p class="error">JavaScript is disabled 😱 — no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>
		</inner-column>
	</header>

	<div class="forms main-subgrid">
		<form-container>
			<inner-column>
				<form method="POST" action="#characters">
					<header>
						<h3 class="strong-voice">How many characters are in your string?</h3>
						<p>Enter a word or phrase and I’ll count it for you.</p>
					</header>

					<div class="field">
						<label>What is the input string?</label>
						<input type="text" name="string" value="<?=isset($_POST["countChars"]) ? $_POST["string"] : "" ?>">
					</div>

					<button class="button" type="submit" name="countChars">Count the number of characters</button>

					<div class="form-output">
						<?php if (isset($_POST["countChars"])): 
							$string = $_POST["string"]; ?>
							<p>"<?= htmlspecialchars($string) ?>" has <?= strlen($string) ?> characters.</p>
						<?php endif; ?>
					</div>
				</form>
			</inner-column>
		</form-container>
	</div>
</section>
