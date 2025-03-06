<?php include '../../includes/header.php' ?>

<header>
	<inner-column>
		<h1 class="loud-voice">PHP Excersises</h1>
	</inner-column>
</header>

<section class="madlib">
	<inner-column>
		<h2 class="attention-voice">Madlib</h2>
		<?php
			$noun = "paper";
			$pluralNounOne = "papers";
			$verbOne = "fly";
			$verbTwo = "crab walk";
			$bodyPart = "hands";
			$adjectiveOne = "cold";
			$pluralNounTwo = "potatoes";
			$adjectiveTwo = "spicy";

			echo "<p>Today, every student has a computer small enough to fit into their " . $noun . ". You can solve any math problem by simply pushing the computer’s little " . $pluralNounOne . ".</p>"
		?>
		<p>Computers can add, multiply, divide, and <?php echo $verbOne ?>. They can also <?php echo $verbTwo ?> better than a human.</p>

		<p>Some computers have their own <?=$bodyPart?> Other’s have a/an <?=$adjectiveOne?>  screen that shows all kinds of <?=$pluralNounTwo?>  and <?=$adjectiveTwo?>  figures.</p>

		<h3 class="strong-voice">Basic math</h2>
		<p>2 + 2 = <?= 2 + 2;?></p>
						
		<h3 class="strong-voice">Basic math but with some variables</h2>
		<?php
			$numberOne = 2;
			$numberTwo = 4;
		?>

		<p>Parenthesis: (<?=$numberOne?> + <?=$numberTwo?>) * (<?=$numberOne?> - <?=$numberTwo?>) = <?= ($numberOne + $numberTwo) * ($numberOne - $numberTwo); ?></p>

		<p>Exponents: <?=$numberOne?> ^ <?=$numberTwo?> = <?= $numberOne ** $numberTwo;?></p>

		<p>Multiplication: <?=$numberOne?> * <?=$numberTwo?> = <?= $numberOne * $numberTwo;?></p>

		<p>Division: <?=$numberTwo?> / <?=$numberOne?> = <?= $numberTwo / $numberOne;?></p>

		<p>Addition: <?=$numberTwo?> + <?=$numberOne?> = <?= $numberTwo + $numberOne;?></p>

		<p>Subtraction: <?=$numberTwo?> - <?=$numberOne?> = <?= $numberTwo - $numberOne;?></p>

		<h3 class="strong-voice">First name and last name</h2>
		<?php
			$firstName = "Ernesto";
			$lastName = "Rivera - Saavedra";
			$fullName = $firstName . " " . $lastName;
		?>

		<p><?= $fullName;?></p>

		<h3 class="strong-voice">First name and last name in a sentence with a number and a place</h2>
		<?php 
			$firstName = "Ernesto";
			$lastName = "Rivera - Saavedra";
			$yearsAlive = 2025 - 1997;
		?>

		<p>Hello, my name is <?= $firstName . " " . $lastName;?> and I have been alive for (almost) <?= $yearsAlive;?> years.</p>

		<h3 class="strong-voice">You come up with an idea</h2>
		<?php 
			$animal = "dog";
			$animalName = "Doc";
			$vehicle = "boat";
			$numberOne = 585;
			$numberTwo = 689;
			$sum = $numberOne + $numberTwo;
			$location = "Carribean";
		?>

		<p>There once was a <?= $animal;?> whose name was <?= $animalName;?>. He travelled great distances on his <?=$vehicle;?>, and made his home in the <?= $location?>. One day <?= $animalName;?> met a giant sea serpent who threatened to eat him and his <?= $vehicle;?> whole. The sea serpent said to <?= $animalName;?>: "If you can tell me what <?= $numberOne;?> plus <?= $numberTwo;?> is, I will leave you and your <?= $vehicle;?> in peace." <?= $animalName;?> thought long and hard and finally he gave his answer to the sea serpent: "The answer is <?= $sum;?>, now leave me be." And so the sea serpent left <?= $animalName?> and his <?= $vehicle?> in peace for the rest of his days.</p>
	</inner-column>
</section>

<section class="control-flow">
	<inner-column>
		<h2 class="attention-voice">Control flow</h2>

		<h3 class="strong-voice">Gift</h2>
		<?php
			$gift = "BB gun";
			$message = "";

			if ($gift == "BB gun") {
				$message = "You'll shoot your eye out!";
			} else {
				$message =  "Sounds like a nice gift";
			}
		?>

		<p>You want a <?=$gift?>? <?=$message?></p>

		<h3 class="strong-voice">Gas in the tank</h2>
		<?php
			$gasLeft = 25; //percent
			$message = "";

			if ($gasLeft > 50) {
				$message = "We can make it!";
			} elseif ($gasLeft < 10) {
				$message = "Maybe we should get some gas...";
			} else {
				$message = "We're low - but it's fine! I think...";
			}
		?>

		<p>I just checked how much gas we have left and, <?=$message?></p>
	</inner-column>
</section>

<section class="arrays">
	<inner-column>
		<h2 class="attention-voice">Arrays</h2>
		<h3 class="strong-voice">Product</h3>
		<?php
			$product = [
				"product-title" => "Wireless Earbuds",
				"color" => "Red",
				"in-stock" => false,
				"price" => 100
			];

			if ($product["in-stock"] == false) {
				$stockMessage = "Out of Stock!";
			} else {
				$stockMessage = "In Stock!";
			}
		?>

		<ul>
			<li><?=$product["product-title"];?></li>
			<li>$<?=$product["price"];?></li>
			<li>Color: <?=$product["color"];?></li>
			<li><?=$stockMessage;?></li>
		</ul>

		<!-- conditional rendering  https://softwareengineering.stackexchange.com/questions/357782/php-better-way-to-print-html-in-if-else-conditions-->
		<?php if ($product["in-stock"]) { ?>
			<ul>
				<li><?=$product["product-title"];?></li>
				<li>$<?=$product["price"];?></li>
				<li>Color: <?=$product["color"];?></li>
				<li><?=$stockMessage;?></li>
			</ul>
		<?php } ?>

	</inner-column>
</section>

<section class="loops">
	<inner-column>
		<h2 class="attention-voice">Loops</h2>
		<?php 

			$numbers = [18, 28, 23, 512, 68, 55, 44, 20];

			foreach ($numbers as $number) {
				echo "<li>$number</li>";
			}
		?>
	</inner-column>
</section>

<section class="functions">
	<inner-column>
		<h2 class="attention-voice">Functions</h2>

		<?php 
			function monsterGenerator($name, $age, $favoriteFood) {
				$monster = [
					"name" => $name,
					"age" => $age,
					"favoriteFood" => $favoriteFood
				];

				return $monster;
			}

			$crunchy = monsterGenerator("Crunchy", 6, "pork rinds");
			$crusty = monsterGenerator("Crusty", 62,"pork ears");

			$monsters = [$crunchy, $crusty];
		?>	

		<?php foreach ($monsters as $m) { ?>
			<li>
				<monster-card>
					<h2><?=$m["name"]?></h2>
				</monster-card>
			</li>
		<?php }?>

		<?php 
			function makeTen() {
				$ten = 5 + 5;
				
				echo "<h1>Hello, this is $ten</h1>";

				$hundred = $ten * 10;

				echo $hundred;	
			}

			makeTen();
		?>

		<?php 

			function renderThings() {
				$things = ["one", "two", "three"];

				foreach ($things as $thing) { ?>
					<p>Thing <?=$thing?></p>
				<?php }
			}

			renderThings();
		?>
	</inner-column>
</section>

<section class="forms">
	<style>
		form {
			max-width: 400px;
			margin-top: 20px;

			p + .field {
				margin-top: 15px;
			}
		}

		.field {
			display: flex;
			flex-direction: column;

			label + input {
				margin-top: 10px;
			}
		}

		.field label {
			font-size: 14px;
		}

		button[type='submit'], .field + .field {
			margin-top: 10px;
		}

		form + p {
			margin-top: 10px;
		}

		.feedback {
			color: green;
		}

		.error {
			color: red;
		}
	</style>


	<inner-column>
		<h2 class="attention-voice">Forms</h2>

		<form method="POST">
			<p>Saying Hello</p>

			<div class="field">
				<label>What is your name?</label>
				<input type="text" name="name">
			</div>

			<button type="submit" name="submitted">Get your greeting</button>
		</form>

		<?php 
			if (isset($_POST["submitted"])) {
				if (isset($_POST["name"]) && !empty($_POST["name"])) {
					echo "<p class='feedback'>Hello, $_POST[name], nice to meet you!</p>";
				} else {
					echo "<p class='error'>Please enter a name</p>";
				}
			}
		?>
	</inner-column>
</section>

<?php include '../../includes/footer.php' ?>