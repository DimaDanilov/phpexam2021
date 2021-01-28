<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'quiz_baze';
    
    $a = mysqli_connect($host,$user,$password,$db);
    mysqli_select_db($a,$db);

    if(isset($_POST['username'])){

        $uname = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "select * from login_table where user='{$uname}'AND password='{$password}'";
        $result = mysqli_query($a, $sql);
        
        if(mysqli_num_rows($result)!= 0){
            session_start();
            $_SESSION['admin'] = true;
            header('Location: admin_page.php');
            exit();
        }
        else{
            echo "Вы ввели неправильный пароль";
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Вход</title>
</head>
<body>
    <div class="container mt-5">
        <form method="POST" action="#" class="login_form">
            <h1 class="">Вход для администратора</h1>
            <div class="form_container">
                <div class="form-group mt-3">
                    <label>Имя</label>
                    <input type="text" name="username" placeholder="Введите имя" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label>Пароль</label>
                    <input type="password" name="password" placeholder="Введите пароль" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" name="submit" value="Войти" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</body>
</html>