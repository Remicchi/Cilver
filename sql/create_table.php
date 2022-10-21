<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

// // Create connection
// $conn = new mysqli($servername, $username, $password);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // Create database
// $sql = "CREATE DATABASE movies";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }
// mysqli_close($conn);
$conn = mysqli_connect($servername, $username, $password, $dbname);

/* comment necessary code below if you have run this cript before */
// $sql = "CREATE TABLE `movielist` (
//     id int UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//     moviename varchar(64) NOT NULL,
//     price float(16,2) NOT NULL
// );";

// if (mysqli_query($conn, $sql)) {
//     echo "Database and tables are created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($conn);
// }

$sql = "CREATE TABLE `bookings` (
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    movie1 int NOT NULL,
    movie2 int NOT NULL,
    movie3 int NOT NULL,
    movie4 int NOT NULL,
    movie5 int NOT NULL,
    movie6 int NOT NULL
);";

if (mysqli_query($conn, $sql)) {
    echo "Database and tables are created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
