<?php
    $conn = mysqli_connect("localhost", "root", "", "movies");
    if($conn === false){
	    die("ERROR: Could not connect. "
	        . mysqli_connect_error());
	}
    $sql = "DELETE FROM `userloginstatus`;";
    $result = $conn->query($sql);
	header("Location: ../index.html");
	die();
?>