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
			$timings = $row["timing"]; // the timing here is a string
			$description = $row["description"];
			$price = $row["price"];
			break;
		}
	}
	// gets time info and prints seats accordingly
	if(isset($_POST['time'])) {
		$selected_time = $_POST['time'];
		$sql = "SELECT * FROM movie_seats WHERE moviename='{$moviename}' and time='$selected_time';";
	} else {
		$selected_time = "1:00pm";
		$sql = "SELECT * FROM movie_seats WHERE moviename='{$moviename}';";
	}
	// prints movie seats
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
                    <p><b>Price: $<?php echo $price?></b></p>
					<p>
						Description: <?php echo $description?>
					</p>
					<!-- form 1 -->
					<form action="movie_page.php" method="post">
						<br>
						<p style="display: inline"><b>Select a time slot: </b></p>
						<input type="hidden" value="<?php echo "{$moviename}"?>" name="moviename">
						<input type="hidden" value="<?php echo "{$timings}"?>" name="timings" id="timings">
						<input type="hidden" value="<?php echo "{$selected_time}"?>" name="timing" id="selected_time">
						<select name="time" id="time" onchange="this.form.submit()">
							<script type = "text/javascript" src = "movie_time.js"></script>
						</select>
					</form>
						<br>
						<br>
						<!-- form 2 -->
						<form action="add_to_cart.php" method="post">
						<div id="seats">
							<h3>Select Seats Below <br></h3>
							<label>Available: </label>
							<input type="checkbox" class="free_seat" onclick="return false;">
							<label>Unavailable: </label>
							<input type="checkbox" class="taken_seat" onclick="return false;" checked>
							<div id="screen">Screen</div>
							<!-- some hidden info -->
							<input type="hidden" value="<?php echo "{$taken_seats}"?>" name="taken_seats" id="taken_seats">
							<input type="hidden" value="<?php echo "{$moviename}"?>" name="movie">
							<input type="hidden" value="<?php echo "{$currentuser}"?>" name="user">
							<input type="hidden" value="<?php echo "{$price}"?>" name="price">
							<input type="hidden" value="<?php echo "{$selected_time}"?>" name="time">
							<script type = "text/javascript" src = "seats.js"></script>
							<input type="submit" name="submit" id="submit" value="Add to Cart">
							<!-- <input type="submit" name="submit" id="submit" value="Add to Cart" onclick='alert("Your movie booking has been added")'> -->
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