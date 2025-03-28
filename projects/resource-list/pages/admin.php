<?php 
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$resourcesFile = 'data/resources.json';
$resources = json_decode(file_get_contents($resourcesFile), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["add_resource"])) {
		$newResource = [
            "id" => count($resources) + 1,
            "category" => $_POST["category"],
            "title" => $_POST["title"],
            "phone" => $_POST["phone"],
            "website" => $_POST["website"],
            "address" => $_POST["address"],
            "description" => $_POST["description"]
        ];
      $resources[] = $newResource;
      file_put_contents($resourcesFile, json_encode($resources, JSON_PRETTY_PRINT));
      header("Location: index.php?page=admin");
      exit();
	}

	if (isset($_POST["delete_resource"])) {
		$idToDelete = $_POST["resource_id"];
		$resources = array_filter($resources, fn($res) => $res["id"] != $idToDelete);
		file_put_contents($resourcesFile, json_encode(array_values($resources), JSON_PRETTY_PRINT));
		header("Location: index.php?page=admin");
      exit();
	}
}

?>

<section class="admin-panel">
	<inner-column>
		<header>
			<h2 class="loud-voice">Admin Panel</h2>
		</header>
		
		<h3 class="strong-voice">Add Resource</h3>

		<form method="POST" class="add-form">
		<div class="field">
			<label>Category:</label>
       		<input type="text" name="category" required>
		</div>
		
		<div class="field">
			<label>Title:</label>
        	<input type="text" name="title" required>
		</div>

        <div class="field">
        	<label>Phone:</label>
        	<input type="text" name="phone">
        </div>

        <div class="field">
        	<label>Website:</label>
        	<input type="text" name="website">
        </div>

        <div class="field">
        	<label>Address:</label>
       	 	<input type="text" name="address">
        </div>

        <div class="field">
        	<label>Description:</label>
        	<textarea name="description" required></textarea>
        </div>

        <button type="submit" name="add_resource">Add Resource</button>
		</form>

		<h3 class="strong-voice">Delete Resource</h3>

		<form method="POST" class="delete-form">
			<div class="field">
				<label>Select a Resource to Delete</label>
				<select name="resource_id">
				<?php foreach ($resources as $resource) {?>
					<option value="<?=$resource['id']?>"><?=$resource['title']?></option>
				<?php }?>
				</select>
			</div>
			
			<button type="submit" name="delete_resource">Delete Resource</button>
		</form>

		<?php
		print_r($_SESSION);
		print_r($_POST);
		print_r($_GET); 
		var_dump($_SESSION); ?>
	</inner-column>
</section>