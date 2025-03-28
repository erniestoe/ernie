<?php 
	if (session_status() === PHP_SESSION_NONE) {
    	session_start();
	}
	
	$resourcesData = json_decode(file_get_contents('data/resources.json'), true);

	$resources = [];
	foreach ($resourcesData as $resource) {
		$category = $resource['category'];
		if (!isset($resources[$category])) {
			$resources[$category] = [];
		}
		$resources[$category][] = $resource;
	}


	$currentFilters = isset($_GET['filter']) ? (array) $_GET['filter'] : ['all'];

	if (count($currentFilters) > 1 && in_array('all', $currentFilters)) {
    $currentFilters = array_filter($currentFilters, function($filter) {
        return $filter !== 'all'; 
	    });
	}

	if (empty($currentFilters)) {
    	$currentFilters = ['all'];
	}

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
			
			<div class="form-buttons">
				<button type="submit">Apply Filter</button>
				<?php if(isset($_GET['filter']) && $currentFilters != ['all']) {?>
				<a href="index.php?page=home">Clear Filters</a> 
				<?php }?>
			</div>
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

					<h2 class="attention-voice category-title" aria-label="Resource Category:<?=$category?>"><?=$category?></h2>
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
								<div class="buttons">
									<button class="pdf-button">Add to PDF</button>

								<?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) { ?>
    							<a href="index.php?page=edit&id=<?=$resource["id"]?>" class="edit-button">Update</a>
								<?php } ?>
								</div>
							</li>
						<?php }; 
						?>
					</ul>
				</inner-column>
			</section>
		<?php
		}
	}

	function processForm() {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["form_type"])) {
        if ($_POST["form_type"] == "login") {
            // Process login form
            $username = $_POST["username"] ?? '';
            $password = $_POST["password"] ?? '';

            if ($username === 'admin' && $password === 'pass') {
                $_SESSION["logged_in"] = true;
                header("Location: index.php?page=admin");
                exit;
            } else {
                echo "Invalid credentials.";
            }

        } elseif ($_POST["form_type"] == "theme") {
            // Process theme change
        	if (isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark') { 
        		$_SESSION['theme'] = 'light';
        	} else {
        		$_SESSION['theme'] = 'dark';
        	}
           header("Location: " . $_SERVER['REQUEST_URI']);
           exit;
        }
    }
	}
}

?>