<?php
require('db.php');

echo "<title>Online Trivia</title>";

if (isset($_GET["r"])) {


$question = $_GET["q"];
$round = $_GET["r"];




$sql = "SELECT * FROM answers where question = '".$question."' and round = '".$round."'";

$result = mysqli_query($conn,$sql)or die(mysqli_error());

?>  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

<br>
<a href="index.html" class="btn btn-info" role="button">Main Page</a><br><br>
                    <form action="ans.php" method="get">
                    <div class="form-inline">
                            <label> Round:</label>
                            <input type="text" name="r" class="form-control" required>


                            <label>Question:</label>
                            <input type="text" name="q" class="form-control" required>

                        <input type="submit" class="btn btn-primary" name="submit" value="View Answers">
                    </form><br><br>

<table class="table">
<?php

echo "<tr><th>Team Name</th><th>Team Number</th><th>Question</th><th>Round</th><th>Response</th><th>Score</th><th>Score Update</th></tr>";

while($row = mysqli_fetch_array($result)) {
    $team = $row['teamno'];
    $question = $row['question'];
    $round = $row['round'];
    $response = $row['response'];
    $score = $row['score'];

if ($score==0) {
	$scorechange = 1;
}
else {
	$scorechange = 0;
}

$destinationname = " ";

$destquery = "SELECT teamname from team where teamno = '".$team."'";
if ($destresult = mysqli_query($conn, $destquery)) {
    while ($destrow = mysqli_fetch_row($destresult)) {
        $destinationname = $destrow[0];
    }

}


    echo "<tr><td>".$destinationname."</td><td>".$team."</td><td>".$question."</td><td>".$round."</td><td>".$response."</td><td>".$score."</td><td><form action='ans.php' method='get'><input type='hidden' name='team' value=".$team."><input type='hidden' name='updatequestion' value=".$question."><input type='hidden' name='updateround' value=".$round."><input type='hidden' name='score' value=".$scorechange." ><input type='submit' class='btn btn-primary' name='submit' value='Change Score to ".$scorechange."'></form>

<form action='ans.php' method='get'><input type='hidden' name='team' value=".$team."><input type='hidden' name='updatequestion' value=".$question."><input type='hidden' name='updateround' value=".$round."><input type='hidden' name='score' value='2' ><input type='submit' class='btn btn-primary' name='submit' value='2x'></td></form>




    </tr>";
} 

echo "</table>";
mysqli_close($con);

}



elseif (isset($_GET["team"])) {


$updateteamno = $_GET["team"];
$updatequestion = $_GET["updatequestion"];
$updateround = $_GET["updateround"];
$score = $_GET["score"];


 $sql = "UPDATE `answers` SET `score`='".$score."' WHERE question = '".$updatequestion."' and teamno = '".$updateteamno."' and round = '".$updateround."'";
 
     if (mysqli_query($conn, $sql)) {

       }

$question = $_GET["updatequestion"];
$round = $_GET["updateround"];




$sql = "SELECT * FROM answers where question = '".$question."' and round = '".$round."'";

$result = mysqli_query($conn,$sql)or die(mysqli_error());

?>  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

<br>
<a href="index.html" class="btn btn-info" role="button">Main Page</a><br><br>
                    <form action="ans.php" method="get">
                    <div class="form-inline">
                            <label> Round:</label>
                            <input type="text" name="r" class="form-control" required>


                            <label>Question:</label>
                            <input type="text" name="q" class="form-control" required>

                        <input type="submit" class="btn btn-primary" name="submit" value="View Answers">
                    </form><br><br>

<table class="table">
<?php

echo "<tr><th>Team Name</th><th>Team Number</th><th>Question</th><th>Round</th><th>Response</th><th>Score</th><th>Score Update</th></tr>";

while($row = mysqli_fetch_array($result)) {
    $team = $row['teamno'];
    $question = $row['question'];
    $round = $row['round'];
    $response = $row['response'];
    $score = $row['score'];

if ($score==0) {
	$scorechange = 1;
}
else {
	$scorechange = 0;
}

$destinationname = " ";

$destquery = "SELECT teamname from team where teamno ='".$team."'";
if ($destresult = mysqli_query($conn, $destquery)) {
    while ($destrow = mysqli_fetch_row($destresult)) {
        $destinationname = $destrow[0];
    }

}

    echo "<tr><td>".$destinationname."</td><td>".$team."</td><td>".$question."</td><td>".$round."</td><td>".$response."</td><td>".$score."</td><td><form action='ans.php' method='get'><input type='hidden' name='team' value=".$team."><input type='hidden' name='updatequestion' value=".$question."><input type='hidden' name='updateround' value=".$round."><input type='hidden' name='score' value=".$scorechange." ><input type='submit' class='btn btn-primary' name='submit' value='Change Score to ".$scorechange."'></form><form action='ans.php' method='get'><input type='hidden' name='team' value=".$team."><input type='hidden' name='updatequestion' value=".$question."><input type='hidden' name='updateround' value=".$round."><input type='hidden' name='score' value='2' ><input type='submit' class='btn btn-primary' name='submit' value='2x'></td></form></tr>";
} 

echo "</table>";
mysqli_close($con);


}



else {

	?>


	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

<br>
<a href="index.html" class="btn btn-info" role="button">Main Page</a><br><br>
                    <form action="ans.php" method="get">
                    <div class="form-inline">
                            <label> Round:</label>
                            <input type="text" name="r" class="form-control" required>


                            <label>Question:</label>
                            <input type="text" name="q" class="form-control" required>

                        <input type="submit" class="btn btn-primary" name="submit" value="View Answers">
                    </form><br><br>

                    <?php
}


?>