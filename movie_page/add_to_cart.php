<?php
    $username = $_POST["user"];
    $timing = $_POST["time"];
    $price = $_POST["price"];
    // SQL connection
    $conn = mysqli_connect("localhost", "root", "", "movies");
    if($conn === false){
	    die("ERROR: Could not connect. "
	        . mysqli_connect_error());
	}
    

    if(isset($_POST['submit'])){//to run PHP script on submit
        $moviename = $_POST['movie'];
        // Selects movie seats from database
        $sql = "SELECT * FROM movie_seats WHERE moviename='{$moviename}';";
        $result = $conn->query($sql);
	    while($row = $result->fetch_assoc()) {
            $taken_seat = $row["seats"];
	    	break;
	    }
        if(!empty($_POST['seats'])){
            // Loops to store and display values of individual checked checkbox.
            foreach($_POST['seats'] as $selected){
                echo $selected."</br>";
                $chosen_seat .= $selected.",";
            }
        }
        $taken_seat .= $chosen_seat;
    }
    echo $moviename.$chosen_seat.$taken_seat;
    $sql = "UPDATE movie_seats SET seats='{$taken_seat}' WHERE moviename='{$moviename}';";
    $result = $conn->query($sql);
    $sql .= "INSERT INTO `bookings` (username, movie, timing, seat, price, paid)
    VALUES ('{$username}', '{$moviename}', '{$timing}', '{$chosen_seat}', {$price}, 0);";
        $result = $conn->query($sql);
?>