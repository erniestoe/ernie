<section class="self-checkout main-grid">
	<header>
		<inner-column>
			<h2 class="attention-voice" id="selfCheckout">Self-Checkout</h2>
			<p>A classic PHP form with a JavaScript upgrade below.</p>

			<noscript>
				<p class="error">JavaScript is disabled 😱 — no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
			</noscript>
		</inner-column>
	</header>

	<div class="forms main-subgrid">
		<form-container>
			<inner-column>
				<header>
					<h3 class="strong-voice">By the book version:</h3>
					<p>Standard PHP checkout form, calculates subtotal, tax, and total.</p>
				</header>

				<?php 
				function getValue($value) {
					return isset($_POST["checkOut"]) ? $_POST[$value] : "";
				}

				function getSubtotal($item1, $item2, $item3) {
					return $item1 + $item2 + $item3;
				}

				function getTax($subtotal) {
					return $subtotal * 0.055;
				}

				function getTotal($subtotal, $tax) {
					return $subtotal + $tax;
				}

				function renderOutput() {
					$item1Total = intval($_POST["item1Price"]) * intval($_POST["item1Quantity"]);
					$item2Total = intval($_POST["item2Price"]) * intval($_POST["item2Quantity"]);
					$item3Total = intval($_POST["item3Price"]) * intval($_POST["item3Quantity"]);

					$subtotal = getSubtotal($item1Total, $item2Total, $item3Total);
					$tax = getTax($subtotal);
					$total = getTotal($subtotal, $tax);

					echo "<p>Subtotal: \$" . number_format($subtotal, 2) . "</p>";
					echo "<p>Tax: \$" . number_format($tax, 2) . "</p>";
					echo "<p>Total: \$" . number_format($total, 2) . "</p>";
				}
				?>

				<form method="POST" action="#selfCheckout">
					<?php for ($i = 1; $i <= 3; $i++): ?>
						<div class="field">
							<label>Enter the price of item <?=$i?>:</label>
							<input type="number" name="item<?=$i?>Price" step="any" required value="<?=getValue("item{$i}Price")?>">
						</div>

						<div class="field">
							<label>Enter the quantity of item <?=$i?>:</label>
							<input type="number" name="item<?=$i?>Quantity" required value="<?=getValue("item{$i}Quantity")?>">
						</div>
					<?php endfor; ?>

					<button class="button" type="submit" name="checkOut">Check out</button>

					<div class="form-output">
						<?php
						if (isset($_POST["checkOut"])) {
							renderOutput(); 
						}
						?>
					</div>
				</form>
			</inner-column>
		</form-container>

		<form-container>
			<inner-column>
				<header>
					<h3 class="strong-voice">A bit of an upgrade:</h3>
					<p>Let’s rethink how checking out *actually* works. Add items, update your cart, and calculate totals — no page reload.</p>
				</header>

				<div class="self-checkout-js">
					<ul class="items"></ul>

					<ul class="cart"></ul>

					<div class="cart-total"></div>

					<button class="clear-cart button">Clear Cart</button>
				</div>
			</inner-column>
		</form-container>
	</div>
</section>
