<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Shop</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   
<style>
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: burlywood;
    background-position: center; /* Center the background image */
    color: #fff;
    text-align: center;
    /* Additional properties to improve rendering */
    background-attachment: fixed; /* Fix the background image position */
    background-size: cover;
    height: 100vh; 
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
        }

        .list-group-item {
            background-color:#ffef; /* Semi-transparent black background */
            color: #000;
            border: none;
        }

        .card {
            color: #000;
        }

        
       

        .footer {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            color: #fff;
        }    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Watch Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewcart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Admin</a>
                </li>
            </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        
            </div>
        </div>
    </nav>
</head>
<body>
    <div class="container mt-5">
        <h1>Cart</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Check if query parameters are set
                            if (isset($_GET['productId']) && isset($_GET['productName']) && isset($_GET['productPrice'])) {
                                // Get the product details from the query parameters
                                $productId = $_GET['productId'];
                                $productName = $_GET['productName'];
                                $productPrice = $_GET['productPrice'];

                                // Display the product details in the cart table
                                echo "<tr>";
                                echo "<td>$productId</td>";
                                echo "<td>$productName</td>";
                                echo "<td>$productPrice</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <h3>Payment Information</h3>
                <form action="process_payment.php" method="post">
                    <div class="form-group">
                        <label for="cardNumber">Card Number:</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Enter card number" required>
                    </div>
                    <div class="form-group">
                        <label for="expiryDate">Expiry Date:</label>
                        <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YYYY" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Complete Purchase</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
