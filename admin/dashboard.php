<?php
// Initialize the session
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "includes/conn.php";

// Fetch data for dashboard cards and other functionalities
// Add necessary SQL queries and logic here

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Watch Shop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom CSS for Admin Panel */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            padding-top: 20px;
            color: #fff;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sub-menu {
            display: none;
            padding-left: 20px;
        }

        .sub-menu.active {
            display: block;
        }

        .container {
            margin-top: 20px;
            margin-left: 270px;
        }

        /* Custom CSS for sidebar toggler */
        .sidebar-toggler {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #fff;
            font-size: 24px;
        }

        .sidebar-toggler:hover {
            color: #ccc;
        }

        /* Custom CSS for dropdown */
        .dropdown-menu {
            background-color: #343a40;
            border: none;
        }

        .dropdown-menu a {
            color: #fff;
        }

        .dropdown-menu a:hover {
            background-color: #495057;
        }

        /* Custom CSS for page content */
        .page-content {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Responsive CSS */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .container {
                margin-left: 220px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="dahsboard.php">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="#" class="toggle-sub-menu">Manage Products</a>
        <div class="pl-3 sub-menu">
            <a href="product.php">Add Product</a>
            <a href="update_product.php">Update Product</a>
        </div>
        <a href="#" class="toggle-sub-menu">Manage Users</a>
        <div class="pl-3 sub-menu">
            <a href="add_user.php">Add User</a>
            <a href="delete_user.php">Delete User</a>
        </div>
        <a href="logout.php">Log Out</a>
    </div>

    <!-- Bootstrap JS and other JS files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS scripts -->
    <script type="text/javascript">
        // Function to toggle sub-menu
        $(document).ready(function() {
            $('.toggle-sub-menu').click(function() {
                $(this).next('.sub-menu').toggleClass('active');
            });
        });

        // Function to toggle dropdown menu
        function toggleDropdown() {
            var dropdown = document.getElementById("navbarSupportedContent");
            dropdown.classList.toggle("show");
        }
    </script>
</body>
</html>
