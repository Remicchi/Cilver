<!DOCTYPE HTML>
<html lang="en">
	<head>
	<title>BruhMilk Tea</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="movie_page.css">
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
				<?php
					
			        $conn = mysqli_connect("localhost", "root", "", "movies");
			         
			        // Check connection
			        if($conn === false){
			            die("ERROR: Could not connect. "
			                . mysqli_connect_error());
			        }
			        
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
   			    ?>
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
					<form>
						<select name="time" id="time">
							<option value="none" selected disabled hidden>Select a time slot</option>>
							  <option value=<?php echo "$day $timing"?>><?php echo "$day $timing"?></option>
							  <option value="time2">time2</option>
							  <option value="time3">time3</option>
							  <option value="time4">time4</option>
						</select>
						<br>
						<br>
						<div id="seats">
							<h3>Select Seats Below <br></h3>
							<div id="screen">Screen</div>
							<script type = "text/javascript"  src = "seats.js"></script>
						</div>
						<input type="submit" value="Add to Cart">
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