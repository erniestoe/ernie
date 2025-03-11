<?php 
	include "data.php";

	$resources = [
		"Childcare Assistance" => $childcareResources,
		"Clothing" => $clothingResources,
		"Education / Training" => $educationResources,
		"Employment" => $employmentResources,
		"Family Services" => $familyResources,
		"Financial" => $financialResources,
		"Food" => $foodResources,
		"Government" => $governmentResources,
		"Housing" => $housingResources,
		"Legal" => $legalResources,
		"Medical / Mental Health" => $medicalResources
	];

	$currentFilters = isset($_GET['filter']) ? (array) $_GET['filter'] : ['all'];

	function renderFilters() {
		global $resources;
		global $currentFilters;
		?> 

		<form method="GET">
			<label class="strong-voice">Filter</label>

			<div class="fields">
				<div class="field">
				<label>Show All</label>
				<input type="checkbox" name="filter[]" value="all" <?php if (in_array('all', $currentFilters)) echo 'checked'; ?>>
			</div>

			<?php foreach(array_keys($resources) as $category) {?>
				<div class="field">
					<label><?=$category?></label>
					<input type="checkbox" name="filter[]" value="<?=$category?>" <?php if (in_array($category, $currentFilters)) echo 'checked'; ?>>
				</div>
			<?php } ?>
			</div>
		
			<button type="submit">Apply Filter</button>
		</form>
	
	<?php 
	}

	function renderData() {
		global $resources;

		global $currentFilters;

		foreach ($resources as $category => $resourceList) { 
			if (!in_array('all', $currentFilters) && !in_array($category, $currentFilters)) {
			continue;
		}

			?>
			<section class="category">
				<inner-column>

					<h2 class="attention-voice red" aria-label="Resource Category:<?=$category?>"><?=$category?></h2>
					<ul>
						<?php foreach($resourceList as $resource) {?>
							<li>
								<h3 class="strong-voice resource-detail"><?=$resource["title"]?></h3>

								<p class="resource-detail">
									<span class="bold">Information:</span>
									<?=$resource["description"];?>	
								</p>

								<?php if ($resource["phone"] != "") { ?>
									<p class="resource-detail">
										<span class="bold">Phone:</span>
										<?=$resource["phone"]?>
									</p>
								<?php } else { ?>
									<p aria-label="This Resource does not have a Phone Number listed"></p>
								<?php	}?>

								<?php if ($resource["address"] != "") { ?>
									<p class="resource-detail">
										<span class="bold">Address:</span>
										<?=$resource["address"]?>
									</p>
								<?php } else {?>
									<p aria-label="This Resource does not have an address listed"></p>
								<?php }?>

								<?php if ($resource["website"] != "") { ?>
									<a class="resource-detail" href="<?=$resource["website"]?>" aria-label="Category: <?=$sectionTitle?> Visit the <?=$resource["title"]?> website">Website</a>
								<?php } else {?>
									<p aria-label="This Resource does not have a website listed"></p>
								<?php } ?>

								<button class="pdf-button" id="addToPDF">Add to PDF</button>
							</li>
						<?php }; 
						?>
					</ul>
				</inner-column>
			</section>
		<?php
		}
	}
?>