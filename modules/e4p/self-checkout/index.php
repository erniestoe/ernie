<section class="self-checkout">
	<inner-column>
		<h2 class="attention-voice">By the book version:</h2>
		<noscript>
			<p class="error">JavaScript is disabled 😱 -- no worries! This form will reload the page when submitted (shout out to the homie PHP)</p>
		</noscript>
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

				?>
				<p>Subtotal: $<?=number_format($subtotal, 2)?></p>
				<p>Tax: $<?=number_format($tax, 2)?></p>
				<p>Total: $<?=number_format($total, 2)?></p>
				<?php }
		?>

		<form method="POST" action="#selfCheckout">
			<h2 class="attention-voice" >Self-Checkout</h2>

			<div class="field">
				<label>Enter the price of item 1:</label>
				<input type="number" name="item1Price" required value="<?=getValue("item1Price")?>">
			</div>

			<div class="field">
				<label>Enter the quantity of item 1:</label>
				<input type="number" name="item1Quantity" required value="<?=getValue("item1Quantity")?>">
			</div>

			<div class="field">
				<label>Enter the price of item 2:</label>
				<input type="number" name="item2Price" required value="<?=getValue("item2Price")?>">
			</div>

			<div class="field">
				<label>Enter the quantity of item 2:</label>
				<input type="number" name="item2Quantity" required value="<?=getValue("item2Quantity")?>">
			</div>

			<div class="field">
				<label>Enter the price of item 3:</label>
				<input type="number" name="item3Price" required value="<?=getValue("item3Price")?>">
			</div>

			<div class="field">
				<label>Enter the quantity of item 3:</label>
				<input type="number" name="item3Quantity" required value="<?=getValue("item3Quantity")?>">
			</div>

			<button type="submit" name="checkOut">Check out</button>
		</form>

		<div class="form-output">
			<?php
			if (isset($_POST["checkOut"])) {
				renderOutput(); 
			}
			?>
		</div>

		<self-checkout>
			<div class="text">
				<h2 class="attention-voice">A bit of an upgrade:</h2>
				<p>Okay following instructions is cool and all but lets get real for a second... is that how "checking out" really works"? It probably could be done a whole lot better me thinks.</p>
			</div>
			
			<div class="self-checkout-js">
				<ul class="items"></ul>

				<ul class="cart"></ul>

				<div class="cart-total"></div>
				
				<button class="clear-cart">Clear Cart</button>
			</div>
		</self-checkout>
	</inner-column>
</section>