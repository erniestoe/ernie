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

		<form method="POST">
			<h2 class="attention-voice">Area of a rectangular room</h3>

			<div class="field">
				<label>What is the length of the room in feet?</label>
				<input type="number" name="length">
			</div>

			<div class="field">
				<label>What is the width of the room in feet?</label>
				<input type="number" name="width">
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
		<form method="POST">
			<h2 class="attention-voice">Tax Calculator</h2>

			<div class="field">
				<label>What is the order amount?</label>
				<input type="number" name="amount" step=".01">
			</div>

			<div class="field">
				<label>What is the state?</label>
				<input type="text" name="state">
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

<?php include '../../includes/footer.php' ?>