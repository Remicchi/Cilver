<?php
	// nav bar log in php
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
	// gets movie info 
    $post = array_values($_POST)[0];
    $sql = "SELECT * FROM `movielist`";
    $result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$currentmoviename = $row["moviename"];
		if($currentmoviename == $post){
			$moviename = $row["moviename"];
			$duration = $row["duration"];
			$cast = $row["cast"];
			$day = $row["day"];
			$timing = $row["timing"];
			$description = $row["description"];
			break;
		}
	}
	// prints movie seats
	$sql = "SELECT * FROM movie_seats WHERE moviename='{$moviename}';";
	$result = $conn->query($sql);
	    while($row = $result->fetch_assoc()) {
            $taken_seats = $row["seats"];
	    	break;
	    }
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
	<title>BruhMilk Tea</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="movie_page.css">
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
					<a href="../cart_page/cart.php">Cart</a>
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
				
				<div class="movie">
					<img src="../images/<?php echo $moviename?>.png" alt="<?php echo $moviename?> Poster" target="_blank">
				</div>
                <div class="description">
                    <!-- Information below to be retrieved from database -->
                    <h2><?php echo $moviename ?></h2> 
                    <h3>Duration: <?php echo $duration?> minutes</h3>
                    <p><b>Cast: <?php echo $cast?></b></p>
					<p>
						Description: <?php echo $description?>
					</p>
					<form action="add_to_cart.php" method="post">
						<select name="time" id="time">
							<option value="none" selected disabled hidden>Select a time slot</option>>
							  <option value=<?php echo "{$timing}"?>><?php echo "{$timing}"?></option>
							  <option value="time2">time2</option>
							  <option value="time3">time3</option>
							  <option value="time4">time4</option>
						</select>
						<br>
						<br>
						<div id="seats">
							<h3>Select Seats Below <br></h3>
							<label>Available: </label>
							<input type="checkbox" class="free_seat" onclick="return false;">
							<label>Unavailable: </label>
							<input type="checkbox" class="taken_seat" onclick="return false;" checked>
							<div id="screen">Screen</div>
							<!-- some hidden info -->
							<input type="hidden" value="<?php echo "{$taken_seats}"?>" name="taken_seats" id="taken_seats">
							<input type="hidden" value="<?php echo "{$moviename}"?>" name="movie" >
							<input type="hidden" value="<?php echo "{$currentuser}"?>" name="user" >
							<script type = "text/javascript"  src = "seats.js"></script>
							<input type="submit" name="submit" value="Add to Cart">
						</div>
					</form>                    
				</div>
			</div>
			<footer>
				<small><i>Copyright &copy; 2022 Movie Place</i></small> <br>
				<a href="mailto:Jeremy@Chua.com"><small><i>Bruh@CMilk.com</i></small></a>
			</footer>
		</div>
	</body>
</html>