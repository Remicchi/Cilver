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
echo "Connected Successfully<br>";

//Create movielist
$sql = "CREATE TABLE IF NOT EXISTS `movielist` (
	id int UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	moviename varchar(64) NOT NULL,
	duration varchar(10) NOT NULL,
	cast text NOT NULL,
	day varchar(10) NOT NULL,
	timing text NOT NULL,
	description text NOT NULL,
	price float(16,2) NOT NULL
);";
if (mysqli_query($conn, $sql)) {
    echo "The table movielist has been prepared<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

//Create bookings
$sql = "CREATE TABLE IF NOT EXISTS `bookings` (
	id int UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username varchar(30) NOT NULL,
	movie varchar(64) NOT NULL,
	day varchar(10) NOT NULL,
	timing varchar(7) NOT NULL,
	seat varchar(3) NOT NULL,
	price float(16,2) NOT NULL,
	paid int NOt NULL
);";

if (mysqli_query($conn, $sql)) {
    echo "The table bookings has been prepared<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

//Create userlogininfo
$sql = "CREATE TABLE IF NOT EXISTS `userlogininfo` (
	id int UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username varchar(30) NOT NULL,
	password varchar(30) NOT NULL,
	email varchar(30) NOT NULL
	);";

if (mysqli_query($conn, $sql)) {
    echo "The table userlogininfo has been prepared<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

//Create userloginstatus
$sql = "CREATE TABLE IF NOT EXISTS `userloginstatus` (
	id int UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username varchar(30) NOT NULL,
	status int NOT NULL
);";

if (mysqli_query($conn, $sql)) {
    echo "The table userloginstatus has been prepared<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

//Create jobapplication
$sql = "CREATE TABLE IF NOT EXISTS `jobapplication` (
	id int UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username varchar(30) NOT NULL,
	phone int NOT NULL,
	email varchar(64) NOT NULL,
	startdate varchar(10) NOT NULL,
	experience varchar(640) NOT NULL
);";

if (mysqli_query($conn, $sql)) {
    echo "The table jobapplication has been prepared<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
