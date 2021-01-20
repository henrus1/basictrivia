<?php
    $servername='localhost';
    $username='triviauser';
    $password='triviapassword';
    $dbname = "triv";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>