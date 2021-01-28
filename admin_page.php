<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['admin'])): ?>
        <!-- Если вошёл -->
        <header class="py-3 bg-dark d-flex justify-content-end">
            <a href="exit.php" class="btn btn-light mx-5">Выйти</a>
        </header>

        <div class="container mt-3">

            <div class="container d-flex justify-content-end">
                <a href="add_quiz_form.php" class="btn btn-primary">Создать вопрос</a>
            </div>


            <?php
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $db = 'quiz_baze';
            
            $a=mysqli_connect($host,$user,$password,$db);
            mysqli_select_db($a,$db);
            
            $sql="select * from quiz_table";
            $result=mysqli_query($a, $sql);
            $num_rows=mysqli_num_rows($result);

            $quiz_data=mysqli_fetch_all($result);
            if($num_rows!=0){
                echo'<table class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <td scope="col">#</td>
                        <td scope="col">Название опроса</td>
                        <td scope="col">Ссылка</td>
                        <td scope="col">Статус</td>
                        <td scope="col">Вопросы</td>
                        <td scope="col">Удалить</td>
                    </tr>
                </thead>
                <tbody>';
                for ($i=0;$i<$num_rows;$i++){
                    if ($quiz_data[$i][3]==0)
                        $status[$i]="Закрыт  ";
                    else if ($quiz_data[$i][3]==1)
                        $status[$i]="Открыт  ";
                    echo('
                    <tr scope="row">
                        <td>'.$quiz_data[$i][0].'</td>
                        <td>'.$quiz_data[$i][1].'</td>
                        <td>'.$quiz_data[$i][2].'</td>
                        <td>'.$status[$i].'<a href="change_quiz_status.php?id='.$quiz_data[$i][0].'&status='.$quiz_data[$i][3].'"><img src="icons/status.svg" style="max-width: 40px;"></td>
                        <td><a href="upgrade_quiz_form.php?quiz_id='.$quiz_data[$i][0].'"><img src="icons/question.svg" style="max-width: 40px;"></td>
                        <td><a href="delete_quiz.php?id='.$quiz_data[$i][0].'"><img src="icons/delete.svg" style="max-width: 40px;"></a></td>
                    </tr>');
                    
                }
                echo'</tbody></table>';
            }

            ?>

        </div>






    <?php else: ?>
        <!-- Если не вошёл -->
        <header class="py-3 bg-dark d-flex justify-content-end">
            <a href="index.php" class="btn btn-light mx-5">Войти</a>
        </header>
        <h1 class="text-center mt-5">Вы не вошли в систему!</h1>

    <?php endif; ?>
</body>
</html>