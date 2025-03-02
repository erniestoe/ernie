<?php 
$productsData = include 'data.php';

if (isset($_GET['filter'])) {
	$currentFilter = $_GET['filter'];
} else {
	$currentFilter = 'all';
}

$productCategories = ["casual", "sport", "gaming"];

// Determine if price is on sale or not
function getPrice() {
	global $productsData;
	$productPrice = 0;
	foreach ($productsData as $product) {
		if ($product["onSale"]) {
			$productPrice = $product["price"] / 2;
		} else {
			$productPrice = $product["price"];
		}
	}
	
	echo $productPrice;
}

function renderFilters() {
	global $productsData;
	global $currentFilter;
	global $productCategories;

	// Render an "all" filter
	?> 
	<li>
		<a href="?filter=all" class="quiet-voice <?php 
			if ($currentFilter === 'all') {
				echo 'active';
			} else {
				echo '';
			}
			?>">
				Show All
			</a>
		</li>
	<?php 

	if($currentFilter === 'all') {
		foreach($productCategories as $category) {
			$filterParameter = urlencode($category); ?>
			<li>
				<a href="?filter=<?=$filterParameter?>" class="quiet-voice"><?=$category?></a>
			</li>
		<?php }
	}
}

// Render data for shop page
function renderShopData() {
	global $productsData;
	global $currentFilter;

	foreach ($productsData as $product) {
		if ($currentFilter !== "all" && $currentFilter !== $product["category"]){
			continue;
		}
	 ?>
		<li class="product-card">
			<picture>
				<img src="<?=$product["image"];?>">
			</picture>


			<div class="text">
				<h2 class="attention-voice"><?=$product["productName"];?></h2>
			
				<p><?=$product["tagline"];?></p>

				<button class="add-to-cart-button">
					Add to cart <span class="price">$<?php getPrice(); ?></span>

					<?php if ($product["onSale"]) { ?>
						<div class="sale-sticker"></div>
					<?php	}?>
				</button>

				<a href="product.php?id=<?=$product['id'];?>">View Product</a>
			</div>	
		</li>
	<?php }

}

// Render indiviudal product module data
function renderProductData() {
	global $productsData;

	if (!isset($_GET['id'])) {
		echo "<p>Product not found.</p>";
		return;
	}

	$productID = $_GET['id'];
	$selectedProduct = null;

	foreach ($productsData as $product) {
		if ($product["id"] == $productID) {
			$selectedProduct = $product;
			break;
		}
	}

	if (!$selectedProduct) {
		echo "<p>Product not found.</p>";
		return;
	} ?>
	<product>
		<picture>
       		<img src="<?=$selectedProduct["image"];?>" alt="<?=$selectedProduct["productName"];?>">
    	</picture>

    	<div class="product-text">
    		<div class="product-title">
    		<h1 class="loud-voice"><?=$selectedProduct["productName"];?></h1>
    		<p class="quiet-voice"><?=$selectedProduct["tagline"];?></p>
    	</div>

    	<p class="product-description"><?=$selectedProduct["description"];?></p>

    	<div class="product-features">
    		<h2 class="attention-voice">Features</h2>

    		<ul>
    			<?php foreach($selectedProduct["featureTitle"] as $index => $title) {?>
    				<li>
    					<p>
    						<span class="strong-voice"><?=$title?></span> -
    						<?=$selectedProduct["featureText"][$index];?>
    					</p>
    				</li>
    			<?php } ?>
    		</ul>
    	</div>
    	<?php if ($selectedProduct["onSale"]) { ?>
    	<div class="original-price">
    		<div class="sale-sticker"></div>
			<h3 class="strong-voice">Now on sale! (Was <?=$selectedProduct["price"]?>)</h3>
    	</div>
		<?php	}?>

    	<button class="add-to-cart-button">
			Add to cart <span class="price">$<?php getPrice(); ?></span>

			<?php if ($selectedProduct["onSale"]) { ?>
						<div class="sale-sticker"></div>
			<?php	}?>
		</button>
    	</div>
	</product>
	<?php 
}


