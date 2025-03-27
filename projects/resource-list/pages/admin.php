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
		<h2>Admin Panel</h2>
		<a href="index.php?page=logout">Logout</a>

		<h3>Add Resource</h3>

		<form method="POST">
			<label>Category:</label>
        <input type="text" name="category" required>

        <label>Title:</label>
        <input type="text" name="title" required>

        <label>Phone:</label>
        <input type="text" name="phone">

        <label>Website:</label>
        <input type="text" name="website">

        <label>Address:</label>
        <input type="text" name="address">

        <label>Description:</label>
        <textarea name="description" required></textarea>

        <button type="submit" name="add_resource">Add Resource</button>
		</form>

		<h3>Delete Resource</h3>

		<form method="POST">
			<label>Select a Resource to Delete</label>
			<select name="resource_id">
				<?php foreach ($resources as $resource) {?>
					<option value="<?=$resource['id']?>"><?=$resource['title']?></option>
				<?php }?>
			</select>

			<button type="submit" name="delete_resource">Delete Resource</button>
		</form>

		<?php
		print_r($_SESSION);
		print_r($_POST);
		print_r($_GET); 
		var_dump($_SESSION); ?>
	</inner-column>
</section>