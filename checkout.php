<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Checkout</h1>
        <div class="row">
            <div class="col-md-6">
                <?php
                    // Check if form data is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Check if payment method is selected
                        if (isset($_POST['paymentMethod'])) {
                            $paymentMethod = $_POST['paymentMethod'];

                            // Display payment method confirmation
                            echo "<p>Payment Method: $paymentMethod</p>";

                            // Here, you can process the payment using the selected method
                            // You can also save the order details to a database or perform any other necessary actions
                        } else {
                            echo "<p>No payment method selected.</p>";
                        }
                    } else {
                        echo "<p>No form submission detected.</p>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php include 'footer.php'; ?>