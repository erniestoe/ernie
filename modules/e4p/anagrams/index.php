<section class="anagrams">
	<inner-column>
		<noscript>
			<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
		</noscript>

		<form method="POST" action="#anagrams">
			<h2 class="attention-voice" id="anagrams">Anagram Checker</h2>
			<p>Enter two strings and I'll tell you if they are anagrams</p>

			<div class="field">
				<label>Enter the first string</label>
				<input type="text" name="first" value="<?=isset($_POST["check"]) ? $_POST["first"] : " " ?>">
			</div>

			<div class="field">
				<label>Enter the second string</label>
				<input type="text" name="second" value="<?=isset($_POST["check"]) ? $_POST["second"] : " " ?>">
			</div>

			<button type="submit" name="check">Check strings</button>
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
						echo "<p>$_POST[first] and $_POST[second] are anagrams.</p>";
					} else {
						echo "<p>$_POST[first] and $_POST[second] are not anagrams.</p>";
					}
				}

				checkStrings();
			}
		?>
		</div>
	</inner-column>
</section>