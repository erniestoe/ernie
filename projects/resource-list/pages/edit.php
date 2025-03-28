<?php
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: index.php?page=login");
    exit;
}

$jsonFile = "data/resources.json";

// Load JSON data
$resources = json_decode(file_get_contents($jsonFile), true);

// Fetch resource data
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Find the resource by ID
    $resource = null;
    foreach ($resources as &$res) {
        if ($res["id"] == $id) {
            $resource = &$res; // Reference the resource for updating
            break;
        }
    }

    if (!$resource) {
        die("Resource not found.");
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($resource)) {
    $resource["title"] = $_POST["title"];
    $resource["description"] = $_POST["description"];
    $resource["phone"] = $_POST["phone"];
    $resource["address"] = $_POST["address"];
    $resource["website"] = $_POST["website"];

    // Save the updated resources back to the JSON file
    file_put_contents($jsonFile, json_encode($resources, JSON_PRETTY_PRINT));

    header("Location: index.php?page=home");
    exit;
}
?>

<section class="update-resource">
	<inner-column>
        <header>
            <h2 class="loud-voice">Update Resource</h2>
            <a href="index.php">Cancel</a> 
        </header>
		
		<form action="index.php?page=edit&id=<?= htmlspecialchars($id) ?>"method="POST" class="update-form">

        <div class="field">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($resource["title"]) ?>" required>
        </div>
		
        <div class="field">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($resource["description"]) ?></textarea>
        </div>

        <div class="field">
           <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($resource["phone"]) ?>"> 
        </div>

        <div class="field">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?= htmlspecialchars($resource["address"]) ?>">
        </div>
        
        <div class="field">
           <label for="website">Website:</label>
            <input type="url" id="website" name="website" value="<?= htmlspecialchars($resource["website"]) ?>"> 
        </div>

        <button type="submit">Update Resource</button>
		</form>

		
	</inner-column>
</section>