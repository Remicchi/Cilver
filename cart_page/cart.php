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
	<link rel="stylesheet" href="cart.css">
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
						echo "<a href='cart.php'>Cart</a>";
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
				<h2>Cart Summary</h2>
				<form name="form" method="post" action="../confirmation_page/confirmation_page.php">
					<table class="report-table">
						<tr>
	                    	<th>id</th>
	                    	<th>movie</th>
	                    	<th>timing</th>
	                    	<th>seat number</th>
	                    	<th>price</th>
	                    </tr>
						<?php
	                    $sql = "SELECT * FROM `bookings`";
	                    $result = $conn->query($sql);
	                    $checkTable = 0;
						while($row = $result->fetch_assoc()) {
							if($row["paid"] == 0){
								$checkTable =1;
								break;
							}
						}	
						if(! $checkTable) {
								echo "<tr>";
		                        echo "<td colspan='6'>Cart is empty, please go back and add items to cart</td>";
		                        echo "</tr>";
						}
						$result = $conn->query($sql);
						$index=1;
						$total=0;
						while($row = $result->fetch_assoc()) {
							if($row["paid"]==0){
								$price = count(explode(',',trim($row["seat"],",")))*$row["price"];
			                    echo "<tr>";
			                    echo "<td>".$index."</td>";
			                    echo "<td>".$row["movie"]."</td>";
			                    echo "<td>".$row["timing"]."</td>";
			                    echo "<td>".trim($row["seat"],",")."</td>";
			                    echo "<td>$".$price."</td>";
			                    echo "</tr>";
			                    $total += $price;
			                    $index++;
			                }
		                }
	                    echo "<tr>";
	                    echo "<td colspan='4'></td>";
	                    echo "<td> Total = $".sprintf('%.2f', $total)."</td>";
	                    echo "</tr>";
		                ?>
		            </table>
		        <?php
		        if($checkTable) { 
		        	echo "<input type='submit' class='form-submit-button' name='submit' value='Submit' style='float: right; margin-right: 13%' />";
		        }
		        ?>
		        </form>
			</div>
			<footer>
				<small><i>Copyright &copy; 2022 Movie Place</i></small> <br>
				<a href="mailto:Jeremy@Chua.com"><small><i>Bruh@CMilk.com</i></small></a>
			</footer>
		</div>
	</body>
</html>