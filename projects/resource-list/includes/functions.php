<?php 
	function startSession() {
		if (session_status() === PHP_SESSION_NONE) {
    		session_start();
		}
	}

	function getCurrentPage() {
		$page = isset($_GET['page']) ? $_GET['page'] : 'home';
		$pageInclude = 'pages/' . $page . '.php';

		if (!file_exists($pageInclude)) {
			http_response_code(404);
			$page = "404";
    		$pageInclude = 'pages/404.php';
		}

		return [$page, $pageInclude];
	}

	function getResources() {
		$resourcesData = json_decode(file_get_contents('data/resources.json'), true);
		$resources = [];

		foreach ($resourcesData as $resource) {
			$category = $resource['category'];
			if (!isset($resources[$category])) {
				$resources[$category] = [];
			}
			$resources[$category][] = $resource;
		}

		return $resources;
	}

	function getCurrentFilters() {
		$currentFilters = isset($_GET['filter']) ? (array) $_GET['filter'] : ['all'];

		if (count($currentFilters) > 1 && in_array('all', $currentFilters)) {
	    	$currentFilters = array_filter($currentFilters, function($filter) {
	        	return $filter !== 'all'; 
		    });
		}

		if (empty($currentFilters)) {
	    	$currentFilters = ['all'];
		}

		return $currentFilters;
	}

	function renderFilters() {
		$resources = getResources();
		$currentFilters = getCurrentFilters();
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
		$resources = getResources();
		$currentFilters = getCurrentFilters();

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

	function loadEnv($file = '.env') {
		if (!file_exists($file)) {
			return;
		}

		$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    	foreach ($lines as $line) {
        	if (strpos($line, '=') !== false) {
           		list($key, $value) = explode('=', $line, 2);
           		$_ENV[trim($key)] = trim($value);
        	}
    	}
	}

	function processForm() {

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	if (isset($_POST["formType"])) {
        if ($_POST["formType"] == "login") {
            // Process login form
            $username = $_POST["username"] ?? '';
            $password = $_POST["password"] ?? '';

            if ($username === $_ENV["USERNAME"] && $password === $_ENV["PASSWORD"]) {
                $_SESSION["logged_in"] = true;
                header("Location: index.php?page=admin");
                exit;
            } else {
                echo "Invalid credentials.";
            }

        } elseif ($_POST["formType"] == "theme") {
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

	function checkServer() {
		if ($_SERVER['HTTP_HOST'] === 'ernie.test') {
    		define('BASE_URL', '');
		} else {
    	define('BASE_URL', '/beta-two/ernie'); //url for deployment server
		}
	}

	function createDB($db) {
		echo "Database created successfully!";
	}

	function createDBTable($db) {
		$query = "CREATE TABLE IF NOT EXISTS resources (
        		id INTEGER PRIMARY KEY AUTOINCREMENT,
       			category TEXT NOT NULL,
        		title TEXT NOT NULL,
        		phone TEXT,
        		website TEXT,
        		address TEXT,
        		description TEXT
    	)";

    	$db->exec($query);
    	echo "Table created successfully!";
	}

	function populateDB($db) {
		// Read JSON file
    	$json = file_get_contents('resources.json');
    	$resources = json_decode($json, true);

    	// Prepare SQL insert statement
    	$stmt = $db->prepare("INSERT INTO resources (id, category, title, phone, website, address, description) VALUES (:id, :category, :title, :phone, :website, :address, :description)");

    	foreach ($resources as $resource) {
        	$stmt->execute([
            	':id' => $resource['id'],
            	':category' => $resource['category'],
            	':title' => $resource['title'],
            	':phone' => $resource['phone'],
            	':website' => $resource['website'],
            	':address' => $resource['address'],
            	':description' => $resource['description']
        	]);
    	}

    	echo "Data imported successfully!";
	}

	function getResourcesFromDB($db) {
		$query = "SELECT * FROM resources";
    	$stmt = $db->query($query);
    	$resources = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	echo "<h1>Resource List</h1><ul>";
    	foreach ($resources as $resource) {
        	echo "<li><strong>{$resource['title']}</strong> - {$resource['category']}<br>
              <a href='{$resource['website']}' target='_blank'>Visit Website</a></li>";
    	}
    	echo "</ul>";
	}

?>