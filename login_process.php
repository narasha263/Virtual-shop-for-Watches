<?php


// Include the database configuration file
require_once "conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query to check if the username and password match
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    // Check if query executed successfully
    if ($result) {
        // Check if username exists
        if ($result->num_rows == 1) {
            // Fetch user data from the result
            $row = $result->fetch_assoc();
            // Verify password
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session variables and redirect to dashboard or home page
                $_SESSION['username'] = $username;
                header("location: dashboard.php"); // Redirect to dashboard.php or any other page
                exit();
            } else {
                // Password is incorrect, redirect back to login page with error message
                $_SESSION['login_error'] = "Invalid password.";
                header("location: login.php");
                exit();
            }
      
    } else {
        // Error executing query, redirect back to login page with error message
        $_SESSION['login_error'] = "Oops! Something went wrong. Please try again later.";
        header("location: login.php");
        exit();
    }
} else {
    // If the form is not submitted, redirect back to login page
    header("location: login.php");
    }    exit();
}


?>
