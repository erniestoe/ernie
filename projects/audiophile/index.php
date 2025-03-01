<?php 
include 'includes/header.php';
include 'includes/functions.php';
?>
<section class="splash">
	<inner-column>
		<h1 class="loud-voice">Shop</h1>

		<div class="filters">
			<p class="strong-voice">Filters</p>
			<ul>
				<?php renderFilters(); ?>
			</ul>
		</div>
	</inner-column>
</section>

<section class="products">
	<inner-column>
		<ul>
			<?php renderShopData(); ?>
		</ul>
	</inner-column>
</section>
	

<?php include 'includes/footer.php';?>