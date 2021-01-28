<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личная страница</title>
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

    <?php else: ?>
        <!-- Если не вошёл -->
        <header class="py-3 bg-dark d-flex justify-content-end">
            <a href="index.php" class="btn btn-light mx-5">Войти</a>
        </header>
        <h1 class="text-center mt-5">Вы не вошли в систему!</h1>

    <?php endif; ?>
</body>
</html>