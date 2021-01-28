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

    <div class="container mt-5 px-5">
        <h2>Добавить опрос</h2>
        <form method="GET" action="add_quiz.php">
            <div class="form-group mt-3">
                    <label>Имя</label>
                    <input type="text" name="quiz_name" placeholder="Введите имя" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                    <label>Ссылка (необязательно)</label>
                    <input type="text" name="link" placeholder="Введите ссылку" class="form-control">
            </div>
            <div class="form-group mt-3">
                    <label>Статус: </label><br>
                    <input type="radio" name="status" value="0" required>  Опрос закрыт<br>
                    <input type="radio" name="status" value="1">  Опрос открыт
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="submit" value="Войти" class="btn btn-success">Добавить</button>
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