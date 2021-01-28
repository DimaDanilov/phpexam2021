<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'quiz_baze';
 
$a=mysqli_connect($host,$user,$password,$db);
mysqli_select_db($a,$db);

$quiz_id=$_GET['quiz_id'];
$sql = "SELECT ID FROM Quiz_$quiz_id";
echo ($sql);
$result=mysqli_query($a, $sql);
    
if(empty($result)) {
    $sql = "CREATE TABLE Quiz_$quiz_id (
              ID int(11) AUTO_INCREMENT,
              EMAIL varchar(255) NOT NULL,
              PASSWORD varchar(255) NOT NULL,
              PERMISSION_LEVEL int,
              APPLICATION_COMPLETED int,
              APPLICATION_IN_PROGRESS int,
              PRIMARY KEY  (ID)
              )";
    $result=mysqli_query($a, $sql);
}
// header('Location: upgrade_quiz_form.php');

?>