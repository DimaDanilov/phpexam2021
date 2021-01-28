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
        <h2>Добавить вопросы</h2>
        <form method="GET" action="upgrade_quiz.php">
            <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>">
            <div class="form-group mt-3">
                <label>Выберите тип данных в вопросе</label>
                <select class="form-select">
                    <option disabled>Выберите тип данных</option>
                    <option selected value="Число">Число</option>
                    <option value="Положительное число">Положительное число</option>
                    <option value="Строка">Строка</option>
                    <option value="Текст">Текст</option>
                </select>
            </div>
            <div class="form-group mt-3">
                    <label>Вопрос</label>
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
        <h1 class="text-center mt-5">Вы не вошли в систему!</h1>

    <?php endif; ?>
    
</body>
</html>