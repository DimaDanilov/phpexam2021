<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'quiz_baze';
 
$a=mysqli_connect($host,$user,$password,$db);
mysqli_select_db($a,$db);

$quiz_id=$_GET['quiz_id'];
$question_name=$_GET['databasefield'];
$question_type=$_GET['question_type'];

$sql = "SELECT ID FROM Quiz_$quiz_id";
$result=mysqli_query($a, $sql);


if ($question_type=='int')
    $sql_string = "int(11)";
if ($question_type=='positive_int')
    $sql_string = "int(11) unsigned";
if ($question_type=='string')
    $sql_string = "VARCHAR(30)";
if ($question_type=='text')
    $sql_string = "VARCHAR(255)";


if(empty($result)) {
    $sql = "CREATE TABLE Quiz_$quiz_id (
              ID int(11) AUTO_INCREMENT,
              $question_name $sql_string,
              PRIMARY KEY  (ID)
              )";
    $result=mysqli_query($a, $sql);
}
else {
    $sql = "ALTER TABLE Quiz_$quiz_id
            ADD $question_name $sql_string;";
    $result=mysqli_query($a, $sql);
}
header('Location: upgrade_quiz_form.php');

?>