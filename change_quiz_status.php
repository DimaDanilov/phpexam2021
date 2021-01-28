<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'quiz_baze';
         
$a=mysqli_connect($host,$user,$password,$db);
mysqli_select_db($a,$db);
if (($_GET['status'])==1)
    $status_change=0;
else $status_change=1;

$sql="update quiz_table set status = '{$status_change}'where ID='{$_GET['id']}'";
$result=mysqli_query($a, $sql);
header('Location: admin_page.php');

?>