
<?php
// Include the database configuration file
require_once "includes/conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $productName = $conn->real_escape_string($_POST['name']);
    $productImage = $conn->real_escape_string($_POST['image']);
    $productPrice = $conn->real_escape_string($_POST['price']);
    $productCategory = $conn->real_escape_string($_POST['category']); // Add product category

    // Prepare INSERT statement
    $sql = "INSERT INTO products (name, image, price, category) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $productName, $productImage, $productPrice, $productCategory);

    // Attempt to execute the statement
    if ($stmt->execute()) {
        // Product inserted successfully
        echo "Product added successfully";
    } else {
        // Error inserting product
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
