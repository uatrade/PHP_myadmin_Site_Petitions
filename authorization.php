<?php
include_once 'database.php';
include_once 'functions.php';
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet">
        <title>Петиции</title>
    </head>
    <body>

<h1>Для добавления петиций введите ваш данные</h1>
<form class="form-group">
    <input type="text" name="login" placeholder="Введите login" class="form-control"><br>
    <input type="email" name="email" placeholder="Введите email" class="form-control"><br>
    <input type="submit" value="Войти" class="btn btn-primary" id="btn">
</form>


<?php

if($_GET[login]!='') {
    $login = $_GET[login];

    $respon = CheckUsers($link, $login);
}

if($respon)
{

    foreach ($respon as $item) {
        echo '<a href='.'"addpetition.php?id='.$item[user_id].'&login='.$item[login].'"><p id="possition">Добавить петицию</p></a>';
    }

    echo '<a href='.'"golos.php?id='.$item[user_id].'&login='.$item[login].'"><p id="possition">Проголосовать</p></a>';

    /*$item[user_id]*/
}
else
{
    echo '<p style="text-align: center">Авторизация не выполнена</p>';
}

?>

    </body>
</html>
