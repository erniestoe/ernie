<section class="tax-calculator main-grid">
	<inner-column>
		<header>
			<noscript>
				<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>

			<h2 class="attention-voice" id="tax">Tax Calculator</h2>
		</header>

		<div class="forms main-subgrid">
			<form-container>
				<header>
					<h3 class="strong-voice">Attempt 1</h3>
				</header>

				<form method="POST" action="#tax">
					

					<div class="field">
						<label>What is the order amount?</label>
						<input type="number" name="amount" step=".01"  value="<?=isset($_POST["getTotal"]) ? $_POST["amount"] : " " ?>">
					</div>

					<div class="field">
						<label>What is the state?</label>
						<input type="text" name="state" value="<?=isset($_POST["getTotal"]) ? $_POST["state"] : " " ?>">
					</div>

					<button class="button" type="submit" name="getTotal">Get total</button>
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
			</form-container>
		</div>
		

		
	</inner-column>
</section>