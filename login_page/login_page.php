<?php
	// create short variable names
	$is_user = -1;
	if(isset($_POST['uname'])) {
		$is_user = 0;
        $is_psw = 0;
		$username = $_POST['uname'];
		$password = $_POST['psw'];
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
            $currentpsw = $row["password"];
			if($currentusername == $username){ 
				// If username exists in table
				$is_user = 1;
                if($password == $currentpsw) {
                    $is_psw = 1;
                }
				break;
			}
		}
        if($is_psw == 1) {
            $sql = "DROP TABLE IF EXISTS userloginstatus;";
            $sql .= "CREATE TABLE IF NOT EXISTS `userloginstatus` (
                id int UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                username varchar(30) NOT NULL,
                status int NOT NULL
            );";
			$sql .= "INSERT INTO `userloginstatus` (username, status)
            VALUES ('{$username}', 1);";

			if (!mysqli_multi_query($conn, $sql)) {
			    echo "Error creating database: " . mysqli_error($conn);
			}
		}
	}
?>
<?php
    $is_logged = 0;
    $conn = mysqli_connect("localhost", "root", "", "movies");
    if($conn === false){
	    die("ERROR: Could not connect. "
	        . mysqli_connect_error());
	}
    $sql = "SELECT * FROM `userloginstatus`";
    $result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		if($row["username"]){ 
            $currentuser = $row["username"];
			$is_logged = 1;
			break;
		}
	}
	
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
	<title>BruhMilk Tea</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="login_page.css">
	<link rel="stylesheet" href="../header_login/button.css">
 	<script type="text/javascript" src="../header_login/button.js"></script>
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
					<?php
					if($is_logged == 1){
						echo "<a href='../cart_page/cart.php'>Cart</a>";
					}
					?>
					<a href="../aboutus_page/aboutus.php">About Us</a>
                    <?php
                        if($is_logged == 1) {
                            echo "<div class=\"dropdown\">
                            <button onclick=\"myFunction()\" class=\"dropbtn\">{$currentuser}</button>
                            <div id=\"myDropdown\" class=\"dropdown-content\">
                              <a href=\"../header_login/log_out.php\">Log Out</a>
                            </div></div>";
                        } else {
                            echo "<a href=\"../login_page/login_page.php\">Log In</a>";
                        }
                    ?>
				</nav>
			</header>
			<div class="content">
				<div class="center">
					<h2>Login</h2>
				</div>
				<div class="center">
                    <?php
						if($is_user == 1) {
                            // is user, log in and redirect back to index page
                            if($is_psw == 1){
                                echo "<p style=\"color: green;\">You are logged in now. </p>";
                                header("Location: ../index.php");
                                die();
                            } else {
                                echo "<p style=\"color: red;\">Invalid username or password!</p>";
                            }
							
						} else if($is_user == 0) {
							echo "<p style=\"color: red;\">You are not a user!</p>";
						}
					?>
					<form id = "login_form"  action = "login_page.php" method="post">
						<label>Username</label><br>
    					<input type="text" placeholder=" Username" id="uname" name="uname" required><br>
						<label>Password</label><br>
						<input type="password" placeholder=" Password" id="psw" name="psw" required><br>
						<br>
    					<input type="submit" value="Login"></button>
						<br>
					</form>
    				<p>Not a member? <a href="signup_page.php">Sign Up Here!</a></p>
				</div>
			</div>
			<footer>
				<small><i>Copyright &copy; 2022 Movie Place</i></small> <br>
				<a href="mailto:Jeremy@Chua.com"><small><i>Bruh@CMilk.com</i></small></a>
			</footer>
		</div>
	</body>
</html>