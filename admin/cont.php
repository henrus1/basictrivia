<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
     $oldr = $_POST['oldr'];
     $oldq = $_POST['oldq'];
     $newr = $_POST['newr'];
     $newq = $_POST['newq'];
 
     $sql = "UPDATE `quiz` SET `round`='".$newr."',`question`='".$newq."' WHERE round = '".$oldr."'";
 
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
                        
                    </div>
                    <p><b>The Question and Round Numbers have been updated</b><br><br>New Round: <?php echo($newr); ?> <br>New Question: <?php echo($newq); ?><br><br><br>

 

                           
                       <a href="cont.php"><input type="submit" class="btn btn-primary" name="submit" value="Update Again "></a>
                    </form><br><br><a href="index.html" class="btn btn-info" role="button">Main Page</a><br><br>
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


$mysqli = new mysqli("localhost","trivia","rk5brsC2dQNm67We","triv");


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
                        
                    </div>
                    <p><b>Use this form to update the Question and Round Numbers</b></p>

                    <form action="cont.php" method="post">
 

                    <div class="form-group">
                            <label>Current Round:</label>
                            <input type="text" name="oldr" class="form-control" value= <?php echo($roundresult); ?> readonly>
                            </div>

                         <div class="form-group">
                            <label>Current Question:</label>
                            <input type="text" name="oldq" class="form-control" value= <?php echo($questionresult); ?> readonly>
                          </div>

         

                        <div class="form-group">
                            <label>Updated Round:</label>
                            <input type="text" name="newr" class="form-control" value= <?php echo($roundresult); ?> required>
                        </div>

                              <div class="form-group">
                            <label>Updated Question:</label>
                            <input type="text" name="newq" class="form-control" value= <?php echo($questionresult); ?> required>
                        </div>

                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                    </form>
                    <br><br>
                    <a href="index.html" class="btn btn-info" role="button">Main Page</a><br><br>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


<?php




}
?>