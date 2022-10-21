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

// insert LAPTOP product
$sql = "INSERT INTO `movielist` (moviename, price)
VALUES ('movie1', 15);";

$sql .= "INSERT INTO `movielist` (moviename, price)
VALUES ('movie2', 15);";

$sql .= "INSERT INTO `movielist` (moviename, price)
VALUES ('movie3', 15);";

$sql .= "INSERT INTO `movielist` (moviename, price)
VALUES ('movie4', 15);";

$sql .= "INSERT INTO `movielist` (moviename, price)
VALUES ('movie5', 15);";

$sql .= "INSERT INTO `movielist` (moviename, price)
VALUES ('movie6', 15);";


if (mysqli_multi_query($conn, $sql)) {
    echo "Database and tables are created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
