<?php include '../../includes/header.php' ?>

<header>
	<inner-column>
		<h1 class="loud-voice">Excersises For Programmers</h1>
	</inner-column>
</header>

<section class="area-of-rect-room">
	<inner-column>
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
			$squareMeters = $squareFeet * 0.09290304;
		?>

		<form method="POST" action="#area">
			<h2 class="attention-voice" id="area">Area of a rectangular room</h3>

			<div class="field">
				<label>What is the length of the room in feet?</label>
				<input type="number" name="length" value="<?=isset($_POST["submit"]) ? $length : " " ?>">
			</div>

			<div class="field">
				<label>What is the width of the room in feet?</label>
				<input type="number" name="width" value="<?=isset($_POST["submit"]) ? $width : " " ?>">
			</div>

			<button type="submit" name="submit">Get the square footage</button>
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
</section>

<section class="tax-calculator">
	<inner-column>
		<form method="POST" action="#tax">
			<h2 class="attention-voice" id="tax">Tax Calculator</h2>

			<div class="field">
				<label>What is the order amount?</label>
				<input type="number" name="amount" step=".01"  value="<?=isset($_POST["getTotal"]) ? $_POST["amount"] : " " ?>">
			</div>

			<div class="field">
				<label>What is the state?</label>
				<input type="text" name="state" value="<?=isset($_POST["getTotal"]) ? $_POST["state"] : " " ?>">
			</div>

			<button type="submit" name="getTotal">Get total</button>
		</form>

		<?php 
			if (isset($_POST["getTotal"])) {
				$tax = floatval($_POST["amount"]) * 0.055;
				$total = floatval($_POST["amount"]) + $tax;
				$stateAbrev = strtoupper($_POST["state"]); 
				$stateFull = ucfirst(strtolower($_POST["state"]));

				if ($stateAbrev== "WI" || $stateFull == "Wisconsin") {?>
					<p>Subtotal is $<?=$_POST["amount"]?></p>
					<p>Tax is $<?=number_format($tax, 2)?></p>
					<p>Total is $<?=number_format($total, 2)?></p>
				<?php }

				if ($stateAbrev !== "WI" && $stateFull !== "Wisconsin") { ?>
					<p>Total is $<?=$_POST["amount"]?></p>
				<?php }
			}
		?>
	</inner-column>
</section>

<section class="driving-age">
	<inner-column>
		<form method="POST" action="#drivingAge">
			<h2 class="attention-voice" id="#drivingAge">Legal Driving Age</h2>

			<div class="field">
				<label>What is your age?</label>
				<input type="number" name="age" value="<?=isset($_POST["getResult"]) ? $_POST["age"] : " " ?>">
			</div>

			<button type="submit" name="getResult">See if you can legally drive!</button>
		</form>

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
	</inner-column>
</section>

<section class="anagrams">
	<inner-column>
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
	</inner-column>
</section>

<section class="pizza-party">
	<inner-column>
		<form method="POST" action="#pizzaParty">
			<h2 class="attention-voice" id="pizzaParty">Pizza Party</h2>

			<div class="field">
				<label>How many people?</label>
				<input type="number" name="people" value="<?=isset($_POST["splitPizzas"]) ? $_POST["people"] : " " ?>">
			</div>

			<div class="field">
				<label>How many pizzas do you have?</label>
				<input type="number" name="pizzas" value="<?=isset($_POST["splitPizzas"]) ? $_POST["pizzas"] : " " ?>">
			</div>

			<div class="field">
				<label>How many slices per pizza do you have?</label>
				<input type="number" name="slices" value="<?=isset($_POST["splitPizzas"]) ? $_POST["slices"] : " " ?>">
			</div>

			<button type="submit" name="splitPizzas">Divy the pizzas up!</button>
		</form>

		<?php 
		if (isset($_POST["splitPizzas"])) {
			$people = intval($_POST["people"]);
			$pizzas = intval($_POST["pizzas"]);
			$slicesPerPizza = intval($_POST["slices"]);

			if ($people != 0 && $pizzas != 0 && $slicesPerPizza != 0) { 
				$totalSlices = $pizzas * $slicesPerPizza;
				$slicesPerPerson = $totalSlices / $people;
				$leftoverSlices = $totalSlices % $people;
			?>
				<p><?=$people?> <?=$people === 1 ? "person" : "people"?> with <?=$pizzas?> <?=$pizzas === 1 ? "pizza" : "pizzas"?></p>

				<p><?=$people === 1 ? "They" : "each person"?> gets <?=$slicesPerPerson?> <?=$slicesPerPerson <= 1 ? "piece" : "pieces"?> of pizza</p>

				<p>There <?=$leftoverSlices === 1 ? "is" : "are"?> <?=$leftoverSlices === 0 ? "no" :$leftoverSlices?> leftover <?=$leftoverSlices === 1 ? "piece" : "pieces" ?></p>

		<?php } else { ?>
					<p class="error">Please enter a number greater than 0</p>
		<?php }
		} ?>
	</inner-column>
</section>

<section class="temp-converter">
	<inner-column>
		<form method="POST" action="#converter">
			<h2 class="attention-voice" id="converter">Temperature Converter</h2>

			<?php 
			$error = "";

			if (isset($_POST["nextStep"])) {
				$choice = strtolower($_POST["choice"]);

				if ($choice !== "c" && $choice !== "f" && $choice !== " ") {
					$error = "Please enter either Celsius (C) or Fahrenheit (F).";
				}
			}
			?>

			<?php if (!isset($_POST["nextStep"]) && !isset($_POST["convertTemp"]) || isset($_POST["reset"]) || $error) {?>
				<p>Press C to convert from Farenheit to Celsius</p>
				<p>Press F to convert from Celsius to Farenheit</p>

				<div class="field">
					<label>Your Choice:</label>
					<input type="text" name="choice">
				</div>

				<button type="submit" name="nextStep">Next Step</button>
			<?php }
				if ($error) { ?>
				<p class="error"><?=$error?></p>
			<?php	} ?>

			<?php if (isset($_POST["nextStep"]) && !$error) {
				$choice = strtolower($_POST["choice"]);?>
				<div class="field">
					<label>Please enter the temperature in <?php
						if ($choice === "c") {
							echo "Farenheit";
						}

						if ($choice === "f") {
							echo "Celsius";
						}
					 ?></label>

					 <input type="number" name="temp">

					 <input type="hidden" name="choice" value="<?php echo $choice; ?>">
				</div>

				<button type="submit" name="convertTemp">Get conversion</button>
			<?php } ?>

			<?php 
				if (isset($_POST["convertTemp"])) { 
					$choice = strtolower($_POST["choice"]);
					$userTemp = intval($_POST["temp"]);
					$convertedTemp = ($choice === "c") ? ($userTemp - 32) * 5 / 9 : ($userTemp * 9 / 5) + 32;
					$convertedUnit = ($choice === "c") ? "Celsius" : "Fahrenheit";
					?>
					
					<p>The temperature in <?=$convertedUnit; ?> is <?=round($convertedTemp, 2);?></p>
						
					<button type="submit" name="reset">Convert again?</button>
			<?php	}?>
		</form>
	</inner-column>
</section>

<section class="contact-form">
	<inner-column>
		<h2 class="attention-voice" id="contactForm">Contact Form</h2>

		<?php

			if (function_exists('mail')) {
    			echo "mail() is enabled!";
			} else {
    			echo "mail() is disabled!";
			}
		?>

		<?php 
			error_reporting(E_ALL);
			ini_set('display_errors', 1);

			if ($_POST["sendEmail"] ?? false) {
				echo "<p>Form submitted successfully!</p>";

    			// Check if data is actually being received
    			echo "<pre>";
    			print_r($_POST);
    			echo "</pre>";

				$to = "ersaavedra.dev@gmail.com";
				$subject = $_POST["subject"] ?? "";
				$message = $_POST["message"] ?? "";

				mail($to, $subject, $message);

			}
		?>

		<form method="POST">
			<div class="field">
				<label>Subject:</label>
				<input type="text" name="subject" required>
			</div>

			<div class="field">
				<label>Leave a message</label>
				<textarea name="message" rows="5" required></textarea>
			</div>

			<button type="submit" name="sendEmail">Send email</button>
		</form>
	</inner-column>
</section>

<?php include '../../includes/footer.php' ?>