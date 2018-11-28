<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet">
    <title>Петиции</title>
</head>
<body>
<?php
include_once 'database.php';
include_once 'functions.php';
?>
<h1>Регистрация пользователя</h1>

<form class="form-group">
<input type="text" name="login" placeholder="Введите login" class="form-control"><br>
<input type="email" name="email" placeholder="Введите email" class="form-control"><br>
    <input type="submit" value="Зарегистрироваться" class="btn btn-primary" id="btn">
</form>

<?php
if($_GET[login]!='' and $_GET[email]!='')
{
    $login=$_GET[login];
    $email=$_GET[email];
    $result=AddUser($link, $login, $email);
    if($result=='find')
    {
        echo '<span class="possition2"><p>Такой логин или email уже существует</p>';
    }
    if($result=='OK')
    {
        echo '<span class="possition2"><p>Данные добавлены</p></span>';
    }
}
?>
<a href="authorization.php"><p id="possition">Войти (для зарегистрированных)</p></a>

</body>
</html>


