<?php
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
            $chosen_seat = $row["seats"];
	    	break;
	    }
        if(!empty($_POST['seats'])){
            // Loops to store and display values of individual checked checkbox.
            foreach($_POST['seats'] as $selected){
                echo $selected."</br>";
                $chosen_seat .= $selected.",";
            }
        }
    }
    echo $moviename.$chosen_seat;
    $sql = "UPDATE movie_seats SET seats='{$chosen_seat}' WHERE moviename='{$moviename}';";
	
    // $sql = "INSERT INTO `movie_seats` (moviename, seats)
    // VALUES ('{$moviename}',\"{$chosen_seat}\");";
    $result = $conn->query($sql);
	
?>