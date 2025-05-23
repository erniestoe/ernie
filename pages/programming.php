<?php $form = isset($_GET['form']) ? $_GET['form'] : 'area'; ?>

<header>
	<inner-column>
		<nav class="form-links">
			<a href="?page=programming&form=area">Area of a rectangular room</a>
			<a href="?page=programming&form=tax">Tax Calculator</a>
			<a href="?page=programming&form=driving">Legal Driving Age</a>
			<a href="?page=programming&form=anagrams">Anagram Checker</a>
			<a href="?page=programming&form=pizza">Pizza Party</a>
			<a href="?page=programming&form=temp">Temperature Converter</a>
			<a href="?page=programming&form=characters">Counting the Number of Characters</a>
			<a href="?page=programming&form=checkout">Self-Checkout</a>
			<a href="?page=programming&form=paint">Paint Calculator</a>
			<a href="?page=programming&form=interest">Simple Interest</a>
			<a href="?page=programming&form=numberstonames">Numbers to Names</a>
			<a href="?page=programming&form=addingnumbers">Adding Numbers</a>
		</nav>
	</inner-column>
</header>

<?php if ($form === 'area') : ?>
<?php include('modules/e4p/area-of-a-rect-room/index.php');?>

<?php elseif ($form === 'tax') : ?>
<section class="tax-calculator">
	<inner-column>
		<noscript>
			<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
		</noscript>

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
		<div class="form-output">
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
		</div>
	</inner-column>
</section>

<?php elseif ($form === 'driving') : ?>
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

<?php elseif ($form === 'anagrams') : ?>
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

<?php elseif ($form === 'pizza') : ?>
<section class="pizza-party">
	<inner-column>
		<noscript>
			<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
		</noscript>

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
		<div class="form-output">
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
		</div>
	</inner-column>
</section>

<?php elseif ($form === 'temp') : ?>
<section class="temp-converter">
	<inner-column>
		<form method="POST" action="#converter">
			<h2 class="attention-voice" id="converter">Temperature Converter</h2>

			<div class="form-step"></div>

			<div class="form-output"></div>

			<noscript>
				<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>

				<?php 
			$error = "";

			if (isset($_POST["nextStep"])) {
				$choice = strtolower($_POST["choice"]);

				if ($choice !== "c" && $choice !== "f" && $choice !== " ") {
					$error = "Please enter either Celsius (C) or Fahrenheit (F).";
				}
			}
			?>

			<?php if (isset($_POST["nextStep"]) && isset($_POST["convertTemp"]) || !isset($_POST["reset"]) || $error) {?>
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
			</noscript>
		</form>
	</inner-column>
</section>

<?php elseif ($form === 'characters') : ?>
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

<?php elseif ($form === 'checkout') : ?>
<?php include('modules/e4p/self-checkout/index.php');?>

<?php elseif($form === 'paint') : ?>
	<section class="paint-calculator">
		<inner-column>
			<form method="POST" action="#paint">
				<h2 class="attention-voice" >Paint Calculator</h2>

				<div class="field">
					<label>Enter the length of the ceiling:</label>
					<input type="number" name="length" required>
				</div>

				<div class="field">
					<label>Enter the width of the ceiling:</label>
					<input type="number" name="width" required>
				</div>

				<button type="submit">Calculate</button>
			</form>

			<div class="form-output">
				
			</div>
		</inner-column>
	</section>

<?php elseif($form === 'interest') : ?>
	<section class="simple-interest">
		<inner-column>
			<form method="POST" action="#interest">
				<h2 class="attention-voice">Computing Simple Interest</h2>

				<div class="field">
					<label>Enter the principal:</label>
					<input type="number" name="principal" required>
				</div>

				<div class="field">
					<label>Enter the rate of interest:</label>
					<input type="number" name="roi" step="any" required>
				</div>

				<div class="field">
					<label>Enter the number of years:</label>
					<input type="number" name="years" required>
				</div>

				<button type="submit">Calculate</button>
			</form>

			<div class="form-output">
				
			</div>
		</inner-column>
	</section>

<?php elseif($form === 'numberstonames') : ?>
	<section class="numbers-to-names">
		<inner-column>
			<form method="POST" action="#numbersToNames">
				<h2 class="attention-voice">Numbers to Names</h2>

				<div class="field">
					<label>Please enter the number of the month:</label>
					<input type="number" name="monthname" required>
				</div>

				<button type="submit">Get the name of the month</button>
			</form>

			<div class="form-output">
				
			</div>
		</inner-column>
	</section>

<?php elseif($form === 'addingnumbers') : ?>
	<section class="adding-numbers">
		<inner-column>
			<form method="POST" action="#addingnumbers">
				<h2 class="attention-voice">Adding Numbers</h2>

				<div class="field">
					<label>Enter a number:</label>
					<input type="number" name="number" required>
				</div>

				<button type="submit">Add</button>
			</form>

			<div class="form-output">
				
			</div>
		</inner-column>
	</section>
<?php endif;?>