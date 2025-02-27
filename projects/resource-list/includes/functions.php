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

	if (isset($_GET['filter'])) {
		$currentFilter = $_GET['filter'];
	} else {
		$currentFilter = 'all';
	}

	function renderFilters() {
		global $resources;

		global $currentFilter;

		//Makes sure the Show All link always renders...
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

		if ($currentFilter === 'all') {
        foreach (array_keys($resources) as $category) {
            $filterParameter = urlencode($category); ?>
            <li>
            	<a href="?filter=<?=$filterParameter?>" class="quiet-voice"><?=$category?></a>
            </li>
        <?php }
    }

		
	}

	function renderData() {

		global $resources;

		global $currentFilter;

		foreach ($resources as $category => $resourceList) { 
			if ($currentFilter !== "all" && $currentFilter !== $category) {
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