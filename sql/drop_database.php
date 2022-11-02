<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// insert
$sql = "drop database if exists movies";
if (mysqli_multi_query($conn, $sql)) {
    echo "Database is dropped";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
