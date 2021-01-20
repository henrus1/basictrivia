<?php
require('db.php');

echo "<title>Online Trivia</title>";



if (isset($_GET["teamname"])) {



$randomNumber = rand(2,99999); 
$teamname = $_GET["teamname"];



 $sql = "INSERT INTO `team` (`teamno`, `teamname`, `score`) VALUES ('".$randomNumber."', '".$teamname."', '0')";
 
     if (mysqli_query($conn, $sql)) {

}





$sql = "SELECT * FROM team";

$result = mysqli_query($conn,$sql)or die(mysqli_error());

?>  

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

<br>
<a href="index.html" class="btn btn-info" role="button">Main Page</a><br><br>
                    <form action="teams.php" method="get">
                    <div class="form-inline">
                            <label>&nbsp; &nbsp; Insert Team (Name):</label>
                            <input type="text" name="teamname" class="form-control" required>


                        <input type="submit" class="btn btn-primary" name="submit" value="Add Team">
                    </form><br><br>

<table class="table">
<?php

echo "<tr><th>Team Number</th><th>Team Name</th><th>Score</th><th>Team Login</th></tr>";

while($row = mysqli_fetch_array($result)) {
    $teamno = $row['teamno'];
    $teamname = $row['teamname'];
    $score = $row['score'];


$destquery = "SELECT sum(score) from answers where teamno= '".$teamno."'";
if ($destresult = mysqli_query($conn, $destquery)) {
    while ($destrow = mysqli_fetch_row($destresult)) {
        $destinationname = $destrow[0];
    }

}


    echo "<tr><td>".$teamno."</td><td>".$teamname."</td><td>".$destinationname."</td><td><a href='https://trivia.henrus1.com/game.php?team=".$teamno."'>https://trivia.henrus1.com/game.php?team=".$teamno."</a></td></tr>";
} 

echo "</table>";
mysqli_close($con);


}

else {


$sql = "SELECT * FROM team";

$result = mysqli_query($conn,$sql)or die(mysqli_error());

?>  

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

<br>
<a href="index.html" class="btn btn-info" role="button">Main Page</a><br><br>
                    <form action="teams.php" method="get">
                    <div class="form-inline">
                            <label>&nbsp; &nbsp; Insert Team (Name):</label>
                            <input type="text" name="teamname" class="form-control" required>


                        <input type="submit" class="btn btn-primary" name="submit" value="Add Team">
                    </form><br><br>

<table class="table">
<?php

echo "<tr><th>Team Number</th><th>Team Name</th><th>Score</th><th>Team Login</th></tr>";

while($row = mysqli_fetch_array($result)) {
    $teamno = $row['teamno'];
    $teamname = $row['teamname'];
    $score = $row['score'];

//$scorecheck = "SELECT sum(score) from answers where teamno= '".$teamno."'";
//$scoreresult = mysqli_query($conn,$scorecheck)or die(mysqli_error());



$destquery = "SELECT sum(score) from answers where teamno= '".$teamno."'";
if ($destresult = mysqli_query($conn, $destquery)) {
    while ($destrow = mysqli_fetch_row($destresult)) {
        $destinationname = $destrow[0];
    }

}



    echo "<tr><td>".$teamno."</td><td>".$teamname."</td><td>".$destinationname."</td><td><a href='YOUR URL HERE/game.php?team=".$teamno."'>YOUR URL HERE/game.php?team=".$teamno."</a></td></tr>";
} 

echo "</table>";
mysqli_close($con);





}




?>