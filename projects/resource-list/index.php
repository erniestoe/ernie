<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forsyth Community Resources</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 
		include "includes/data.php";

		$resourceCategoryTitles = ["Childcare Assistance", "Clothing", "Education / Training", "Employment", "Family Services", "Financial", "Food", "Government", "Housing", "Legal", "Medical / Mental Health"];
	?>
	<header>
		<inner-column id="top">
			<h1 class="logo">Forsyth Community Resources</h1>
		</inner-column>
	</header>

	<main>
		<?php foreach ($resourceCategoryTitles as $sectionTitle) { ?>
			<section class="category">
				<inner-column>
					<h2 class="attention-voice"><?=$sectionTitle?></h2>

					<?php if ($sectionTitle == "Childcare Assistance"){ ?>
						<ul>
							<?php foreach ($childcareResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php } elseif ($sectionTitle == "Clothing") {?>
						<ul>
							<?php foreach ($clothingResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php } elseif ($sectionTitle == "Education / Training") {?>
						<ul>
							<?php foreach ($educationResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php } elseif ($sectionTitle == "Employment") {?>
						<ul>
							<?php foreach ($educationResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php } elseif ($sectionTitle == "Family Services"){?>
						<ul>
							<?php foreach ($familyResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php } elseif ($sectionTitle == "Financial") {?>
						<ul>
							<?php foreach ($financialResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php } elseif ($sectionTitle == "Food") {?>
						<ul>
							<?php foreach ($foodResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php } elseif ($sectionTitle == "Government") {?>
						<ul>
							<?php foreach ($governmentResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php } elseif ($sectionTitle == "Housing") { ?>
						<ul>
							<?php foreach ($housingResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php } elseif ($sectionTitle == "Legal") {?>
						<ul>
							<?php foreach ($legalResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php } else { ?>
						<ul>
							<?php foreach ($medicalResources as $resource) {?>
								<li>
									<p><?=$resource["title"]?></p>
									<?php if ($resource["phone"] != "") {?>
										<p><?=$resource["phone"]?></p>
									<?php }?>
									<?php if ($resource["website"] != "") {?>
										<a href="<?=$resource['website']?>">Website</a>
									<?php } ?>
									<?php if ($resource["address"] != "") {?>
										<p><?=$resource["address"]?></p>
									<?php } ?>
									<p><?=$resource["description"]?></p>
								</li>
							<?php }?>
						</ul>
					<?php }?>
				</inner-column>
			</section>
		<?php }?>
	</main>
	<footer>
		<inner-column>
			<a href="#top">Back to top</a>
		</inner-column>
	</footer>
</body>
</html>