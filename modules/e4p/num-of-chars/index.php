<section class="characters">
	<inner-column>
		<noscript>
			<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
		</noscript>
		<form method="POST" action="#characters">
			<h2 class="attention-voice" id="characters">Counting the Number of Characters</h2>

			<div class="field">
				<label>What is the input string?</label>
				<input type="text" name="string" value="<?=isset($_POST["countChars"]) ? $_POST["string"] : "" ?>">
			</div>

			<button type="submit" name="countChars">Count the number of characters</button>
		</form>

		<div class="form-output">
			<?php if (isset($_POST["countChars"])) {
				$string = $_POST["string"];

				?>
				<p><?=$string?> has <?=strlen($string)?> characters</p>
			<?php } ?>
		</div>
	</inner-column>
</section>