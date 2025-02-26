<?php 
	function renderData() {
		include "data.php";

		$resources = [$childcareResources, $clothingResources, $educationResources, $employmentResources, $familyResources, $financialResources, $foodResources, $governmentResources, $housingResources, $legalResources, $medicalResources];

		$resourceCategoryTitles = ["Childcare Assistance", "Clothing", "Education / Training", "Employment", "Family Services", "Financial", "Food", "Government", "Housing", "Legal", "Medical / Mental Health"];

		$count = 0;

		foreach ($resourceCategoryTitles as $sectionTitle) { ?>
			<section class="category">
				<inner-column>

					<h2 class="attention-voice red" aria-label="Resource Category:<?=$sectionTitle?>"><?=$sectionTitle?></h2>
					<ul>
						<?php foreach($resources[$count] as $resource) {?>
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

							</li>
						<?php }; 
						$count++;?>
					</ul>
				</inner-column>
			</section>
		<?php
		}
	}
?>