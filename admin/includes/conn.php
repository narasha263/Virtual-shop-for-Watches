<?php
// Database credentials
$dbServer = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName = "watch shop"; 

// Create a connection to the database
$conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
