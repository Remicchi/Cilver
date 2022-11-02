<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// insert
$sql = "INSERT INTO `movielist` (moviename, duration, cast, day, timing, description, price)
VALUES ('BlackAdam', 120, 'Dwayne Johnson, Aldis Hodge, Noah Centineo, Sarah Shahi, Marwan Kenzari, Quintessa Swindell', '23/10/2022', '7:30pm', 'Nearly 5,000 years after he was bestowed with the almighty powers of the Egyptian gods -- and imprisoned just as quickly -- Black Adam is freed from his earthly tomb, ready to unleash his unique form of justice on the modern world.', 15);";

$sql .= "INSERT INTO `movielist` (moviename, duration, cast, day, timing, description, price)
VALUES ('ThankGod', 120, 'Ajay Devgn, Sidharth Malhotra, Rakul Preet Singh', '23/10/2022', '5:00pm', 'An egoistic real estate broker in huge debts, meets with an accident. As he gains consciousness, he realizes that he is in heaven. God appears in front of him and informs him that he will have to play a “GAME OF LIFE”. If he manages to win, he will be sent back to earth and if he loses, he will be sent to hell.', 15);";

$sql .= "INSERT INTO `movielist` (moviename, duration, cast, day, timing, description, price)
VALUES ('Smile', 115, 'Sosie Bacon, Jessie T. Usher, Kyle Gallner', '23/10/2022', '2:30pm', 'After witnessing a bizarre, traumatic incident involving a patient, Dr. Rose Cotter (Sosie Bacon) starts experiencing frightening occurrences that she cannot explain. As an overwhelming terror begins taking over her life, Rose must confront her troubling past in order to survive and escape her horrifying new reality.', 15);";

$sql .= "INSERT INTO `movielist` (moviename, duration, cast, day, timing, description, price)
VALUES ('Halloween Ends', 111, 'Jamie Lee Curtis, Kyle Richards, Judy Greer', '23/10/2022', '12:00pm', 'Laurie Strode prepares for a final showdown with masked killer Michael Myers.', 15);";

$sql .= "INSERT INTO `movielist` (moviename, duration, cast, day, timing, description, price)
VALUES ('Ticket to Paradise', 104, 'George Clooney, Julia Roberts, Kaitlyn Dever, Billie Lourd, Maxime Bouttier', '23/10/2022', '9:30am', 'George Clooney and Julia Roberts reunite on the big screen as exes who find themselves on a shared mission to stop their lovestruck daughter from making the same mistake they once made. From Working Title, Smokehouse Pictures and Red Om Films, Ticket to Paradise is a romantic comedy about the sweet surprise of second chances.', 15);";

$sql .= "INSERT INTO `movielist` (moviename, duration, cast, day, timing, description, price)
VALUES ('Wandering', 150, 'Suzu Hirose, Tori Matsuzaka, Ryusei Yokohama, Mikako Tabe', '23/10/2022', '10:00pm', 'In a park on a rainy evening, a 19-year-old university student, Fumi, offers an umbrella to a soaking wet 10-year-old girl, Sarasa. Realizing her reluctance to go home, Fumi lets her stay in his place, where she spends the next two months in peace. They take each other hands and seem to have finally found their place in the world until Fumi is arrested for kidnapping. Fifteen years later, the lonely two are reunited both still suffering from the stigma as the victim and perpetrator of “a pedophile case”. Will the society give a place to their unshakable bond they have formed.', 15);";

$sql .= "INSERT INTO `userlogininfo` (username, password, email)
VALUES ('SickPhil', 'UnhackablePassword','Sick.Phil@email.com');";

$sql .= "INSERT INTO `userloginstatus` (username, status)
VALUES ('SickPhil', 0);";


if (mysqli_multi_query($conn, $sql)) {
    echo "Data has been inserted";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
