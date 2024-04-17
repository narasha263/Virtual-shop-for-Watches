<?php
// Include the database configuration file
require_once "includes/conn.php";

// Check if the user ID is provided in the query string and if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['delete_id'])) {
    // Sanitize the user ID
    $delete_id = $_GET['delete_id'];

    // Delete the user from the database
    $delete_sql = "DELETE FROM users WHERE id = $delete_id";
    if ($conn->query($delete_sql) === TRUE) {
        // Redirect to the current page after deletion
        header("Location: $_SERVER[PHP_SELF]");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

// Fetch users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Delete button style */
        button.delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <script>
        // JavaScript function to confirm deletion
        function confirmDelete(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                // Redirect to the current page with the user ID to be deleted
                window.location.href = "users.php?delete_id=" + userId;
            }
        }
    </script>
</head>
<body>
    <h2>User List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td><button class=\"delete-button\" onclick=\"confirmDelete(" . $row['id'] . ")\">Delete</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
