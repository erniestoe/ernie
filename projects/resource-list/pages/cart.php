<?php
// Add to cart if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["form_type"] === "add_to_cart") {
    $id = $_POST["addToPDF"];

    // Find the resource by ID
    foreach ($resources as $category => $resourceList) {
        foreach ($resourceList as $resource) {
            if ($resource["id"] == $id) {
                $_SESSION['cart'][] = $resource; // Add to session
                break 2; // Exit both loops once found
            }
        }
    }
}

header("Location: index.php?page=home");
exit;
?>
