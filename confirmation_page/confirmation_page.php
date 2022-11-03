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
	$sql = "SELECT * FROM `userlogininfo`";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		if($row["email"]){ 
            $email = $row["email"];
			break;
		}
	}
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
				<h2>Order Summary</h2>
				<table class="report-table">
					<tr>
					<th colspan="5">The Following Orders are Successful</th>
					</tr>
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
						if($row["paid"] == 0 and $row['username'] == $currentuser){
							$checkTable =1;
							break;
						}
					}
					if(! $checkTable) {
						echo "<tr>";
                        echo "<td colspan='5'>Cart is empty, please go back and add items to cart</td>";
                        echo "</tr>";
					}
					$result = $conn->query($sql);
					$index=1;
					$total=0;
					while($row = $result->fetch_assoc()) {
						if($row["paid"]==0 and $row['username'] == $currentuser){
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

                    $recipient=$email;
					$subject="Successful Movie Ticket Booking!";
					$mail_body="You have booked the following movies.\n";
					$headers = 'From: root@localhost' . "\r\n" .
					 	'Reply-To: root@localhost' . "\r\n" .
					 	'X-Mailer: PHP/' . phpversion();
					$result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
						if($row["paid"]==0 and $row['username'] == $currentuser){
							$movie=$row["movie"];
							$timing=$row["timing"];
							$seat=trim($row['seat'],',');
							$price=count(explode(',',trim($row["seat"],",")))*$row["price"];
							$mail_body .= "Movie Name: $movie\nTiming: $timing\nSeat Numbers: $seat\nTotal Price: $price\n\n";
							$id=$row["id"];
		                    $sql = "UPDATE bookings SET paid=1 WHERE id=?";
							$stmt= $conn->prepare($sql);
							$stmt->bind_param("i", $id);
							$stmt->execute();
						}
                    }
					mail($recipient, $subject, $mail_body, $headers, '-root@localhost');
					echo ("<p>A confirmation email has been sent to $recipient</p>");
	                ?>
	            </table>

				<table class="report-table">
					<tr>
						<th colspan="6">The Following Orders are Unsuccessful</th>
					</tr>
					<tr>
                    	<th>id</th>
                    	<th>movie</th>
                    	<th>timing</th>
                    	<th>seat number</th>
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