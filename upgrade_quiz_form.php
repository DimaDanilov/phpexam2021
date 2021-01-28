<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить опрос</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

    <?php
    session_start();
    if (isset($_SESSION['admin'])): ?>
    <!-- Если вошёл -->

    <header class="py-3 bg-dark d-flex justify-content-end">
        <a href="admin_page.php" class="btn btn-light">Вернуться</a>
        <a href="exit.php" class="btn btn-light mx-5">Выйти</a>
    </header>

    <?php 
        $quiz_id=$_GET['quiz_id'];
    ?>

    <div class="container mt-5 px-5">
        <h1>Опрос <?php echo $quiz_id;?></h1>

        <?php
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $db = 'quiz_baze';
            
            $a=mysqli_connect($host,$user,$password,$db);
            mysqli_select_db($a,$db);
            
            $sql="select column_name from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='quiz_$quiz_id'";
            $result=mysqli_query($a, $sql);

            $num_rows=mysqli_num_rows($result);
            $quiz_column=mysqli_fetch_all($result);
        
            if($num_rows>0){
                echo '<table class="table mt-3"><thead class="thead-dark"><tr></tr>';
                for ($i=0;$i<$num_rows;$i++)
                echo '<td scope="col">'.$quiz_column[$i][0].'</td>';
                echo '</thead></table>';
            } else echo 'Нет вопросов';

            ?>





        <h2>Добавить вопросы</h2>
        <form method="GET" action="upgrade_quiz.php">
            <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
            <div class="form-group mt-3">
                <label>Выберите тип данных в вопросе</label>
                <select class="form-select" name="question_type">
                    <option disabled>Выберите тип данных</option>
                    <option selected value="int">Число</option>
                    <option value="positive_int">Положительное число</option>
                    <option value="string">Строка</option>
                    <option value="text">Текст</option>
                </select>
            </div>
            <div class="form-group mt-3">
                    <label>Вопрос(писать без пробелов)</label>
                    <input type="text" name="question" placeholder="Введите вопрос для опроса" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="submit" value="add_question" class="btn btn-primary">
                    Добавить вопрос
                </button>
            </div>
        </form>
    </div>

    <?php else: ?>
        <!-- Если не вошёл -->
        <header class="py-3 bg-dark d-flex justify-content-end">
            <a href="index.php" class="btn btn-light mx-5">Войти</a>
        </header>

        <?php

            $host = 'localhost';
            $user = 'root';
            $password = '';
            $db = 'quiz_baze';
            
            $a=mysqli_connect($host,$user,$password,$db);
            mysqli_select_db($a,$db);
            
            $quiz_id=$_GET['quiz_id'];
            echo '<div class="container mt-3"><h1>Опрос'.$quiz_id.'</h1></div>';


            $sql="select column_name from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='quiz_$quiz_id'";
            $result=mysqli_query($a, $sql);

            $num_rows=mysqli_num_rows($result);
            $quiz_column=mysqli_fetch_all($result);

            $sql2="select column_type from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='quiz_$quiz_id'";
            $result2=mysqli_query($a, $sql2);

            $quiz_column2=mysqli_fetch_all($result2);

            if($num_rows>0){
                echo '<div class="container"><form method="GET" action="upgrade_quiz.php">';
                for ($i=1;$i<$num_rows;$i++){
                    echo '<div class="form-group mt-3">
                        <label>'.$quiz_column[$i][0].'</label>';

                        if ($quiz_column2[$i][0]=='int(11)')
                            $quiz_type[$i]='type="number"';
                        else if ($quiz_column2[$i][0]=='int(11) unsigned')
                            $quiz_type[$i]='type="number" min="0"';
                        else if ($quiz_column2[$i][0]=='varchar(30)'){
                            $quiz_type[$i]='type="text" minlength="1" maxlength="30"';}
                        else
                            $quiz_type[$i]='type="text" minlength="1" maxlength="255"';

                        echo '<input '.$quiz_type[$i].' name="question" placeholder="'.$quiz_column[$i][0].'" class="form-control" required></div>';
                }
                echo '<div class="form-group mt-3">
                    <button type="submit" name="submit" value="add_question" class="btn btn-primary">
                        Добавить ответ
                    </button>
                </div></form></div>';
            } else echo 'Нет вопросов';
        
        ?>


    <?php endif; ?>
    
</body>
</html>