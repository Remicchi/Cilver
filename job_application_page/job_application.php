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
	<link rel="stylesheet" href="job_application.css">
	<link rel="stylesheet" href="../header_login/button.css">
 	<script type="text/javascript" src="../header_login/button.js"></script>
	<script type = "text/javascript"  src = "validator4.js" ></script>
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
				<div class="content">
					<h2>Jobs at Cilver</h2>
					<form name="form" method="post" action="apply_job.php">
						<table>
							<tr>
								<p>Want to work at Cilver? Fill out the form below to start your application. Required fields are marked with an asterisk *</p></tr>
							<tr>
								<th>*Name: </th>
								<td><input type="text" id="name" name="name" value="" placeholder="Please Enter Your Name" required></td>
							</tr>
							<tr>
								<th>*Phone Number: </th>
								<td><input type="text" id="phone" name="phone" value="" placeholder="Please Enter Your Phone No." required></td>
							</tr>
							<tr>
								<th>*Email: </th>
								<td><input type="text" id="email" name="email" value="" placeholder="Please Enter Your Email" required></td>
							</tr>
							<tr>
								<th>Start Date: </th>
								<td><input type="date" id="date" name="date" placeholder="dd-mm-yyyy" value=""></td>
							</tr>
							<tr>
								<th>*Experience:</th>
								<td><textarea name="comments" rows="3" col="90" placeholder="Please enter your past experience here" required/></textarea></td>
							</tr>
							<tr>
								<td colspan="2" align="left" valign="top">
								<input type="reset" name="reset" value="Clear" />
								<input type="submit" name="submit" value="Apply Now" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<footer>
				<small><i>Copyright &copy; 2022 Movie Place</i></small> <br>
				<a href="mailto:Jeremy@Chua.com"><small><i>Bruh@CMilk.com</i></small></a>
			</footer>
		</div>
		<script type = "text/javascript"  src = "validator4r.js" ></script>
	</body>
</html>