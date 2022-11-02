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
	$recipient="Sick.Phil@email.com";
	$subject="Test Email";
	$mail_body="You have booked the following movies.";
	$headers = 'From: root@localhost' . "\r\n" .
	 	'Reply-To: root@localhost' . "\r\n" .
	 	'X-Mailer: PHP/' . phpversion();
	mail($recipient, $subject, $mail_body, $headers, '-root@localhost');
	echo ("mail sent to: ".$recipient);
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
	<title>BruhMilk Tea</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="confirmation_page.css">
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
				<h2>Cart Summary</h2>
				<p>A confirmation email has been sent to your inbox.</p>
				<table class="report-table">
					<tr>
					<th colspan="6">The Following Orders are Successful</th>
					</tr>
					<tr>
                    	<th>id</th>
                    	<th>movie</th>
                    	<th>day</th>
                    	<th>timing</th>
                    	<th>seat</th>
                    	<th>price</th>
                    </tr>
					<?php
                    $sql = "SELECT * FROM `bookings`";
                    $result = $conn->query($sql);
					$checkTable = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
		                    echo "<tr>";
		                    echo "<td>".$index."</td>";
		                    echo "<td>".$row["movie"]."</td>";
		                    echo "<td>".$row["day"]."</td>";
		                    echo "<td>".$row["timing"]."</td>";
		                    echo "<td>".$row["seat"]."</td>";
		                    echo "<td>".$row["price"]."</td>";
		                    echo "</tr>";
		                    $id=$row["id"];
		                    $sql = "UPDATE bookings SET paid=1 WHERE id=?";
							$stmt= $conn->prepare($sql);
							$stmt->bind_param("i", $id);
							$stmt->execute();
		                
						
		                    $total += $row["price"];
		                    $index++;
		                }
	                }
                    echo "<tr>";
                    echo "<td colspan='5'></td>";
                    echo "<td> Total = $".sprintf('%.2f', $total)."</td>";
                    echo "</tr>";
	                ?>
	            </table>

				<table class="report-table">
					<tr>
						<th colspan="6">The Following Orders are Unsuccessful</th>
					</tr>
					<tr>
                    	<th>id</th>
                    	<th>movie</th>
                    	<th>day</th>
                    	<th>timing</th>
                    	<th>seat</th>
                    	<th>price</th>
                    </tr>
					<tr> 
						<td colspan='6'>There are no items in this column.</td>
					</tr>
					
				</table>
			</div>
			<footer>
				<small><i>Copyright &copy; 2022 Movie Place</i></small> <br>
				<a href="mailto:Jeremy@Chua.com"><small><i>Bruh@CMilk.com</i></small></a>
			</footer>
		</div>
	</body>
</html>