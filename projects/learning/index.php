<?php include '../../includes/header.php' ?>

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

			echo "<p class='calm-voice'>Today, every student has a computer small enough to fit into their " . $noun . ". You can solve any math problem by simply pushing the computer’s little " . $pluralNounOne . ".</p>"
		?>
		<p class="calm-voice">Computers can add, multiply, divide, and <?php echo $verbOne ?>. They can also <?php echo $verbTwo ?> better than a human.</p>

		<p class="calm-voice">Some computers have their own <?=$bodyPart?> Other’s have a/an <?=$adjectiveOne?>  screen that shows all kinds of <?=$pluralNounTwo?>  and <?=$adjectiveTwo?>  figures.</p>

		<h2 class="attention-voice">Basic math</h2>
		<p><?= 2 + 2;?></p>
						
		<h2 class="attention-voice">Basic math but with some variables</h2>
		<?php
			$numberOne = 2;
			$numberTwo = 4;
		?>

		<p>Parenthesis: <?= ($numberOne + $numberTwo) * ($numberOne - $numberTwo); ?></p>

		<p>Exponents: <?= $numberOne ** $numberTwo;?></p>

		<p>Multiplication: <?= $numberOne * $numberTwo;?></p>

		<p>Division: <?= $numberTwo / $numberOne;?></p>

		<p>Addition: <?= $numberTwo + $numberOne;?></p>

		<p>Subtraction: <?= $numberTwo - $numberOne;?></p>

		<h2 class="attention-voice">First name and last name</h2>
		<?php
			$firstName = "Ernesto";
			$lastName = "Rivera - Saavedra";
			$fullName = $firstName . " " . $lastName;
		?>

		<p><?= $fullName;?></p>

		<h2 class="attention-voice">First name and last name in a sentence with a number and a place</h2>
		<?php 
			$firstName = "Ernesto";
			$lastName = "Rivera - Saavedra";
			$yearsAlive = 2025 - 1997;
		?>

		<p>Hello, my name is <?= $firstName . " " . $lastName;?> and I have been alive for (almost) <?= $yearsAlive;?> years.</p>

		<h2 class="attention-voice">You come up with an idea</h2>
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

<?php include '../../includes/footer.php' ?>