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
	<link rel="stylesheet" href="aboutus.css">
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
					<a href="aboutus.php">About Us</a>
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
				<h2>About Us</h2>

				<div class="row1">
					<img src="../images/aboutuspic.png" alt="aboutuspic" target="_blank">
					<p>Cilver Cinemas Pte Ltd is a classic Singapore cinema. Come to our cozy cinemas, where you can enjoy movie screenings all day. We pride ourselves on our quality screening system and superb customer service. Cilver has a reputation of offering the latest movies, convenience and the most comfortable seats, with one of the newest cinemas newly refurbished in 2022. <br> <br>

					Established in 2001, Cilver is an independent film distributor based in Singapore, releasing a wide range of blockbusters movies from from Hollywood to Asian dramas, etc. Cilver also screens local films. <br> <br>

					We will be looking into expanding our services soon, and will be opening a new outlet soon in another location. More information will be announced soon, stay tuned!
					</p>
				</div>
				<div class="row2">
					<div class="contactjoin">
						<a href="../contactus_page/contactus.html">
							<img src="../images/contactus.png" alt="contactus" target="_blank">
							<p>Contact Us</p>
						</a>
					</div>
					<div class="contactjoin">
						<a href="../job_application_page/job_application.php">
							<img src="../images/joinus.png" alt="joinus" target="_blank">
							<p>Join Us</p>
						</a>
					</div>
				</div>
			</div>
			<footer>
				<small><i>Copyright &copy; 2022 Movie Place</i></small> <br>
				<a href="mailto:Jeremy@Chua.com"><small><i>Bruh@CMilk.com</i></small></a>
			</footer>
		</div>
	</body>
</html>