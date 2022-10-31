<!DOCTYPE HTML>
<html lang="en">
	<head>
	<title>BruhMilk Tea</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="job_application.css">
	</head>
	<body>
		<div id="wrapper">
			<header>
				<a href="../index.html">
				<img src="../images/logo.png" alt="logo?" target="_blank" width="100%"
				title="JavaJam" alt="JavaJam"/>
				</a>
				<nav>
					<a href="../index.html">Home</a>
					<a href="../cart_page/cart.php">Cart</a>
					<a href="../aboutus_page/aboutus.html">About Us</a>
					<a href="../login_page/login_page.html">Log In</a>
				</nav>
			</header>
			<div class="content">
				<h2>Your Job Application has been Sent</h2>
			        <?php
					
			        $conn = mysqli_connect("localhost", "root", "", "movies");
			         
			        // Check connection
			        if($conn === false){
			            die("ERROR: Could not connect. "
			                . mysqli_connect_error());
			        }
			        
   			        $name = array_values($_POST)[0];
   			        $phone = array_values($_POST)[1];
   			        $email = array_values($_POST)[2];
   			        $startdate = array_values($_POST)[3];
   			        $experience = array_values($_POST)[4];
   			       	echo array_values($_POST)[0];
   			        echo array_values($_POST)[1];
   			        echo array_values($_POST)[2];
   			        echo array_values($_POST)[3];
   			        echo array_values($_POST)[4];


			        // Performing insert query execution
			        $sql = "INSERT INTO `jobapplication` (username, phone, email, startdate, experience) VALUES ('$name', '$phone', '$email', '$startdate', '$experience')";
			         
			        if(mysqli_query($conn, $sql)){
			        } else{
			            echo "ERROR: Hush! Sorry $sql. "
			                . mysqli_error($conn);
			        }
			         
			        // Close connection
			        mysqli_close($conn);
			        ?>
			</div>
			<footer>
				<small><i>Copyright &copy; 2022 Movie Place</i></small> <br>
				<a href="mailto:Jeremy@Chua.com"><small><i>Bruh@CMilk.com</i></small></a>
			</footer>
		</div>
	</body>
</html>