<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet">

<?php include_once 'database.php';
include_once 'functions.php';
?>
<h1>Добавление петиций</h1>

<h3>Ваше имя: <span style="color: brown"><?php echo $_GET[login] ?></span> </h3>
<form class="form-group">
    <input type="hidden" name="id" value="<?php echo $_GET[id]; ?>" class="form-control"><br>
    <input type="hidden" name="login" value="<?php echo $_GET[login] ?>">
    <input type="text" name="title" placeholder="Заголовок" class="form-control"><br>
    <textarea name="comment" class="form-control" rows="5"></textarea><br>
    <input type="submit" value="Добавить петицию" class="btn btn-primary" id="btn">
</form>


<?php
if($_GET[title]!='' and $_GET[comment]!='' and $_GET[id]!='')
{
    $title=$_GET[title];
    $comment=$_GET[comment];
    $user_id=$_GET[id];
    $results=AddPetition($link, $user_id, $title, $comment);

    if($results)
    {
        echo "<span style='color:blue; text-align: center; font-size: 16px;'><p>Петиция добавлена</p></span>";
    }
}
echo '<a href='.'"golos.php?id='.$_GET[id].'&login='.$_GET[login].'"><p id="possition">Проголосовать</p></a>';

?>