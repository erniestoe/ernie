<section class="anagrams main-grid">
	<header>
		<inner-column>
			<h2 class="attention-voice" id="anagrams">Anagram Checker</h2>

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
					<p>Enter two strings and I’ll tell you if they’re anagrams.</p>
				</header>

				<form method="POST" action="#anagrams">
					<div class="field">
						<label>Enter the first string</label>
						<input type="text" name="first" value="<?= isset($_POST["check"]) ? $_POST["first"] : "" ?>">
					</div>

					<div class="field">
						<label>Enter the second string</label>
						<input type="text" name="second" value="<?= isset($_POST["check"]) ? $_POST["second"] : "" ?>">
					</div>

					<button class="button" type="submit" name="check">Check strings</button>
				</form>

				<div class="form-output">
					<?php 
					if (isset($_POST["check"])) {
						function checkStrings() {
							$wordOne = strtolower(str_replace(" ", "", $_POST["first"]));
							$wordTwo = strtolower(str_replace(" ", "", $_POST["second"]));

							$arrayOne = str_split($wordOne);
							$arrayTwo = str_split($wordTwo);

							sort($arrayOne);
							sort($arrayTwo);

							if ($arrayOne === $arrayTwo) {
								echo "<p>{$_POST['first']} and {$_POST['second']} are anagrams.</p>";
							} else {
								echo "<p>{$_POST['first']} and {$_POST['second']} are not anagrams.</p>";
							}
						}

						checkStrings();
					}
					?>
				</div>
			</inner-column>
		</form-container>
	</div>
</section>
