<?php


////////////////////////////////////////////
///////// CONNECTION SETTINGS //////////////
////////////////////////////////////////////



$host		=	'localhost';
$usrname	=	'trivia';
$passwd		=	'triviapassword';

////////////////////////////////////////////
////////////////////////////////////////////
////////////////////////////////////////////

$dbname		=	'triv';

$conn = new mysqli($host, $usrname, $passwd, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


mysqli_select_db($conn,$dbname) or die ('Cannot find the DB');


?>