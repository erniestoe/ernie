<!DOCTYPE html>
<html lang="en">
<head>
		<title>Layout garden module!</title>
		<link rel="stylesheet" href="modules/monster-adoption/monster-adoption.css">
</head>
<body>
	<?php
		$codey = [
				"id" => 1856,
				"name" => "Codey",
				"favoriteFood" => "Cats",
				"age" => 7,
				"adopted" => true,
				"portrait" => "modules/monster-adoption/images/codey.jpg",
				"color" => "red"
			];

			$fragoo = [
				"id" => 186,
				"name" => "Fragoo",
				"favoriteFood" => "Chicken",
				"age" => 12,
				"adopted" => true,
				"portrait" => "modules/monster-adoption/images/fragoo.jpg",
				"color" => "pink" 
			];

			$lima = [
				"id" => 1256,
				"name" => "Limabean",
				"favoriteFood" => "Lima beans",
				"age" => 4,
				"adopted" => false,
				"portrait" => "modules/monster-adoption/images/limabean.jpg",
				"color" => "green"
			];

			$reads = [
				"id" => 764,
				"name" => "Miss reads-a-lot",
				"favoriteFood" => "Madeline cookies and tea",
				"age" => 9,
				"adopted" => false,
				"portrait" => "modules/monster-adoption/images/missreadsalot.jpg",
				"color" => "blue"
			];

			$banana = [
				"id" => 16,
				"name" => "Mr. Banana",
				"favoriteFood" => "Bananas",
				"age" => 3,
				"adopted" => true,
				"portrait" => "modules/monster-adoption/images/mrbanana.jpg",
				"color" => "yellow" 
			];

			$shadow = [
				"id" => 1336,
				"name" => "Shadow",
				"favoriteFood" => "Burritos",
				"age" => 16,
				"adopted" => true,
				"portrait" => "modules/monster-adoption/images/shadow.jpg",
				"color" => "purple"
			];

			$monsters = [$codey, $fragoo, $lima, $reads, $banana, $shadow];
	?>

	<header class="page-header">
		<inner-column>
			<h1 class="attention-voice">Monster Adoption Agency LLC</h1>
		</inner-column>
	</header>

	<main>
		<section class="monsters">
			<inner-column>
				<?php 
					foreach ($monsters as $monster) {
				$name = $monster["name"];
				$story = "My favorite food is " . $monster["favoriteFood"] . " and I am " . $monster["age"] . " years old";

				if ($monster["adopted"]) {
					$adopted = "I found a home!";
				} else {
					$adopted = "I need a home!";
				}

				echo 
					"<monster-card>"

					. "<div class='text'>"
					. "<h2 class='name attention-voice'>" . $name . "</h2>" .

					"<p class='story'>" . $story . "</p>" .

					"<p class='adopted'>" . $adopted . "</p>" .

					"</div>" .

					"<div class='circle $monster[color]'></div>" .

					"<picture><img src='$monster[portrait]'></picture>" . 

					"</monster-card>";
			}
				?>
			</inner-column>
		</section>
	</main>
</body>
</html>