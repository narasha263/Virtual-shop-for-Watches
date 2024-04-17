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
    background-color: blue;
    background-image: url('images/men9.jpg');
    background-position: center; /* Center the background image */
    background-position:no-repeat;
    color: white;
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
                    <a class="nav-link" href="Cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">User Log in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Admin/login.php">Admin</a>
                </li>
            </ul>
    <!-- Category selection dropdown -->
    <form class="form-inline my-2 my-lg-0" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <select class="form-control mr-sm-2" name="category">
            <option value="">All</option>
            <option value="kids">Kids</option>
            <option value="women">Women</option>
            <option value="men">Men</option>
        </select>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
            </form>
        
            </div>
        </div>
    </nav>
