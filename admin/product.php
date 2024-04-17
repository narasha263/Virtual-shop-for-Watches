<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Modal</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Modal style */
        .modal-content {
            border-radius: 0;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-footer {
            border-top: none;
        }
        /* Form style */
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        /* Button style */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addProductForm" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" name="name" required>
          </div>
          <div class="form-group">
            <label for="productImage">Product Image</label>
            <input type="file" class="form-control" id="productImage" name="image" required accept="image/*">
          </div>
          <div class="form-group">
            <label for="productPrice">Product Price</label>
            <input type="number" class="form-control" id="productPrice" name="price" step="0.01" required>
          </div>
          <div class="form-group">
            <label for="productCategory">Product Category</label>
            <select class="form-control" id="productCategory" name="category" required>
                <option value="">Select Category</option>
                <option value="women">Women</option>
                <option value="men">Men</option>
                <option value="kids">Kids</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Button to trigger Add Product Modal -->
<a href="#" class="toggle-sub-menu" data-toggle="modal" data-target="#addProductModal">Add Product</a>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
// Include the database configuration file
require_once "includes/conn.php";

// Define variables and initialize with empty values
$name = $image = $price = $category = "";
$name_err = $image_err = $price_err = $category_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate product name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a product name.";
    } else {
        $name = $input_name;
    }

    // Validate product image
    if (empty($_FILES["image"]["name"])) {
        $image_err = "Please select a product image.";
    } else {
        $image = $_FILES["image"]["tmp_name"];
    }

    // Validate product price
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the product price.";
    } else {
        $price = $input_price;
    }

    // Validate product category
    $input_category = trim($_POST["category"]);
    if (empty($input_category)) {
        $category_err = "Please select a product category.";
    } else {
        $category = $input_category;
    }

    // Check input errors before inserting into database
    if (empty($name_err) && empty($image_err) && empty($price_err) && empty($category_err)) {
        // Check if file was uploaded without errors
        if (!empty($_FILES["image"]["tmp_name"]) && $_FILES["image"]["error"] == 0) {
            $image = file_get_contents($_FILES["image"]["tmp_name"]);
            $image_type = $_FILES["image"]["type"];

            // Check if the file is an image
            if (substr($image_type, 0, 5) !== "image") {
                $image_err = "Uploaded file is not an image.";
            }
        } else {
            $image_err = "Please select a product image.";
        }

        // Insert record into database
        if (empty($image_err)) {
            // Prepare an insert statement
            $sql = "INSERT INTO products (name, image, price, category) VALUES (?, ?, ?, ?)";

            if ($stmt = $conn->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ssds", $param_name, $param_image, $param_price, $param_category);

                // Set parameters
                $param_name = $name;
                $param_image = $image;
                $param_price = $price;
                $param_category = $category;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Records created successfully. Redirect to landing page
                    header("location: dashboard.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>

