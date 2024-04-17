<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate form data
    if (empty($username) || empty($password) || empty($confirm_password)) {
        // If any field is empty, redirect back to the registration page with an error message
        header("Location: register.php?error=emptyfields");
        exit();
    } elseif ($password !== $confirm_password) {
        // If passwords don't match, redirect back to the registration page with an error message
        header("Location: register.php?error=passwordcheck&username=".$username);
        exit();
    } else {
        // Include the database configuration file
        require_once "conn.php";

        // Check if the username already exists
        $sql_check_username = "SELECT * FROM users WHERE username = ?";
        $stmt_check_username = $conn->prepare($sql_check_username);
        $stmt_check_username->bind_param("s", $username);
        $stmt_check_username->execute();
        $result_check_username = $stmt_check_username->get_result();

        // Check if the query executed successfully
        if ($result_check_username) {
            if ($result_check_username->num_rows > 0) {
                // If username already exists, redirect back to the registration page with an error message
                header("Location: register.php?error=userexists");
                exit();
            }
        } else {
            // If query execution fails, redirect back to the registration page with an error message
            header("Location: register.php?error=sqlerror");
            exit();
        }

        // Hash the password before storing it in the database (for security)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to insert data into the database
        $sql_insert_user = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt_insert_user = $conn->prepare($sql_insert_user);

        // Check if the SQL statement was prepared successfully
        if ($stmt_insert_user === false) {
            // If statement preparation fails, redirect back to the registration page with an error message
            header("Location: register.php?error=sqlerror");
            exit();
        }

        // Bind parameters to the prepared statement
        $stmt_insert_user->bind_param("ss", $username, $hashedPassword);

        // Execute the prepared statement
        if ($stmt_insert_user->execute()) {
            // Registration successful, redirect to a success page
            header("Location: registration_success.php");
            exit();
        } else {
            // If execution failed, redirect back to the registration page with an error message
            header("Location: register.php?error=sqlerror");
            exit();
        }

        // Close statement and connection
        $stmt_insert_user->close();
        $stmt_check_username->close();
        $conn->close();
    }
} else {
    // If the form was not submitted, redirect back to the registration page
    header("Location: register.php");
    exit();
}
?>
