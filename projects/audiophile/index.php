<?php 
include 'includes/header.php';
include 'includes/functions.php';
?>
<section class="splash">
	<inner-column>
		<h1 class="loud-voice">Shop</h1>

		<div class="filters">
			<?php renderFilters(); ?>
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