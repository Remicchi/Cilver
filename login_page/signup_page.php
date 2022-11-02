<?php
	// create short variable names
	$existed = -1;
	if(isset($_POST['uname'])) {
		$existed = 0;
		$username = $_POST['uname'];
		$password = $_POST['psw'];
		$email = $_POST['email'];	
		$conn = mysqli_connect("localhost", "root", "", "movies");
				         
		// Check connection
		if($conn === false){
		    die("ERROR: Could not connect. "
		        . mysqli_connect_error());
		}
		$sql = "SELECT * FROM `userlogininfo`";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$currentusername = $row["username"];
			if($currentusername == $username){ 
				// If username exists in table
				$existed = 1;
				break;
			}
		}
		if($existed == 0) {
			$sql = "INSERT INTO `userlogininfo` (username, password, email)
			VALUES ('{$username}', '{$password}', '{$email}');";

			if (!mysqli_multi_query($conn, $sql)) {
			    echo "Error creating database: " . mysqli_error($conn);
			}
		}
	}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
	<title>BruhMilk Tea</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="login_page.css">
	<link rel="stylesheet" href="button.css">
 	<script type="text/javascript" src="button.js"></script>
	<script type="text/javascript" src="psw_check.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<a href="../index.php">
				<img src="../images/logo.png" alt="logo?" target="_blank" width="100%"
				title="JavaJam" alt="JavaJam"/>
				</a>
				<nav>
					<a href="../index.php">Home</a>
					<a href="../cart_page/cart.php">Cart</a>
					<a href="../aboutus_page/aboutus.html">About Us</a>
					<a href="../login_page/login_page.php">Log In</a>
				</nav>
			</header>
			<div class="content">
				<div class="center">
					<h2>Sign Up</h2>
				</div>
				<div class="center">
					<?php
						if($existed == 1) {
							echo "<p style=\"color: red;\">The username already existed!</p>";
						} else if($existed == 0) {
							echo "<p>You are signed up now!</p>";
						}
					?>
					<form id = "sign_up_form"  action = "signup_page.php" method="post">
						<label>Username</label><br>
    					<input type="text" placeholder=" Username" id="uname" name="uname" required><br>
						<label>Email</label><br>
    					<input type="email" placeholder=" Email" id="email" name="email" required><br>
						<label>Password</label><br>
						<input type="password" placeholder=" Password" id="psw1" name="psw" required><br>
						<label>Confirm password</label><br>
						<input type="password" placeholder=" Confirm password" id="psw2" required><br>
						<br>
    					<input type="submit" value="Sign Up"></button>
						<br>
					</form>
					<script type = "text/javascript" >
						document.getElementById("psw2").onchange = chkPasswords;
						document.getElementById("sign_up_form").onsubmit = chkPasswords;
					</script>
					
    				<p>Have an account? <a href="login_page.php">Log in Here!</a></p>
				</div>
			</div>
			<footer>
				<small><i>Copyright &copy; 2022 Movie Place</i></small> <br>
				<a href="mailto:Jeremy@Chua.com"><small><i>Bruh@CMilk.com</i></small></a>
			</footer>
		</div>
	</body>
</html>