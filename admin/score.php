<?php
require('db.php');

echo "<title>Online Trivia</title>";

echo "<script src='sorttable.js'></script>";



$sql = "SELECT * FROM team";

$result = mysqli_query($conn,$sql)or die(mysqli_error());

?>  

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">



                    <h1>&nbsp; &nbsp;Quizantine Scores</h1><br>
<table class="sortable" style="width: 100%; max-width: 100%; margin-bottom: 20px; font-size: 20px; padding: 8px; margin: 8px;">
<?php

echo "<tr><th>Team Name</th><th>Score</th></tr>";

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

if ($destinationname === NULL) {
    $destinationname = 0;
}


    echo "<tr><td>".$teamname."<br><br></td><td>".$destinationname."<br><br></td></tr>";
} 

echo "</table>";
mysqli_close($con);





?>