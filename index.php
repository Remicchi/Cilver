<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'movies';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
	<title>BruhMilk Tea</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<div id="wrapper">
			<header>
				<a href="index.php">
				<img src="images/logo.png" alt="logo?" target="_blank" width="100%"
				title="JavaJam" alt="JavaJam"/>
				</a>
				<nav>
					<a href="index.php">Home</a>
					<a href="cart_page/cart.php">Cart</a>
					<a href="aboutus_page/aboutus.html">About Us</a>
					<a href="login_page/login_page.php">Log In</a>
				</nav>
			</header>
			<div class="content">
				<h2>Movie List</h2>
				<?php
                $sql = "SELECT * FROM `movielist`";
                $result = $conn->query($sql);
                $array= array();
				while($row = $result->fetch_assoc()) {
					array_push($array,$row["moviename"]);
				}

				for ($i = 0; $i <= count($array)-1; $i++) {
					echo "<div class='movie'>";
					echo "<form id='formName' name='formName' method='post' action='movie_page/movie_page.php'>";
					echo "<input type='hidden' value='$array[$i]' name='movie'>";
					echo "<input type='image' style='width: 100%;' name='submit' src='images/$array[$i].png' alt='BA' alt='Submit'/>";
					echo "<p>$array[$i]</p>";
					echo "</form>";
					echo "</div>";
				}
				?>
			</div>
			<footer>
				<small><i>Copyright &copy; 2022 Movie Place</i></small> <br>
				<a href="mailto:Jeremy@Chua.com"><small><i>Bruh@CMilk.com</i></small></a>
			</footer>
		</div>
	</body>
</html>