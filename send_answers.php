<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'quiz_baze';

$a=mysqli_connect($host,$user,$password,$db);
mysqli_select_db($a,$db);

$quiz_id=$_GET['quiz_id'];


$sql="select column_name from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='quiz_$quiz_id'";
$result=mysqli_query($a, $sql);

$num_rows=mysqli_num_rows($result);
$quiz_column=mysqli_fetch_all($result);

$array = $quiz_column[0];
$comma_separated = implode(", ", $array);

echo "<h3>Здесь должны отправляться данные в базу данных, но я не успел доделать</h3>";
echo $comma_separated;

// $sql2="insert into quiz_$quiz_id (quiz_name, link, status) values('{$_GET['quiz_name']}','{$quiz_link}','{$_GET['status']}')";
// $result2=mysqli_query($a, $sql2);
// header('Location: admin_page.php');

?>