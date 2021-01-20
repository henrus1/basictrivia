<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
     $teamno = $_POST['teamno'];
     $questionno = $_POST['questiono'];
     $roundno = $_POST['roundno'];
     $response = $_POST['response'];
 
     $sql = "INSERT INTO answers (teamno,question,round,response)
     VALUES ('$teamno','$questionno','$roundno','$response')";
 
     if (mysqli_query($conn, $sql)) {


        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Trivia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2><img src="header.jpg" height="200px"></h2>
                    </div>
                    <p><b>Your Answer has been saved</b><br><br>Please wait until instructed then click the button below for the next question<br><br>

 

                           
                       <a href="<?php echo "game.php?team=".($teamno); ?>"><input type="submit" class="btn btn-primary" name="submit" value="Next question "></a> 
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>



        <?php



     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
else {

if (isset($_GET["team"])) {


$mysqli = new mysqli("localhost","triviauser","triviapassword","triv");


$sqlround = "SELECT round FROM quiz";

if ($result = $mysqli -> query($sqlround)) {
  while ($row = $result -> fetch_row()) {
    $roundresult = $row [0];
  }
  $result -> free_result();
}


$sqlquestion = "SELECT question FROM quiz";

if ($result = $mysqli -> query($sqlquestion)) {
  while ($row = $result -> fetch_row()) {
    $questionresult = $row [0];
  }
  $result -> free_result();
}


    $teamno =$_GET["team"];


//variale to check if already submitted


$destquery = "SELECT response from answers where teamno = '".$teamno."' and question = '".$questionresult."' and round = '".$roundresult."'";
if ($destresult = mysqli_query($conn, $destquery)) {
    while ($destrow = mysqli_fetch_row($destresult)) {
        $qdone = $destrow[0];
    }

}


//allow new ans


if ($qdone == NULL) {


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Trivia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2><img src="header.jpg" height="200px"></h2>
                    </div>
                    <p><b>Please enter your answer below for Round <?php echo($roundresult); ?>, Question Number <?php echo($questionresult); ?></b></p>
                    <br>(If the wrong round or question number is showing above <a href="<?php echo "game.php?team=".($teamno); ?>">click here to refresh</a>)<br><br>
                    <form action="<?php echo "game.php?team=".($teamno); ?>" method="post">
 

                            <input type="hidden" name="teamno" class="form-control" value= <?php echo($teamno); ?> >
 
                            <input type="hidden" name="questiono" class="form-control" value= <?php echo($questionresult); ?> >

                            <input type="hidden" name="roundno" class="form-control" value= <?php echo($roundresult); ?>>
 
                        <div class="form-group">
                            <label>Answer:</label>
                            <input type="text" name="response" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


<?php


}



  //else already submitted


else {

  
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Trivia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2><img src="header.jpg" height="200px"></h2>
                    </div>
                    <p><b>Slow Down! Speed Racer</b><br><br>You have already submitted an answer to this question. Please wait for the next question and then press the button below.<br><br>

 

                           
                       <a href="<?php echo "game.php?team=".($teamno); ?>"><input type="submit" class="btn btn-primary" name="submit" value="Next question "></a> 
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>



        <?php



}

}

else {
    echo "Error";
}




}
?>