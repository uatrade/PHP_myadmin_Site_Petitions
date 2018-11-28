<!DOCTYPE html>
    <html lang="ru">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet">
        <title>Петиции</title>
    </head>
    <body>

    <a href="index.php"><p style="text-align: center; font-size: 16px; font-weight: bold">Главная</p></a>

    <h2 style="text-align: center;">Список петиций</h2>
    <h3>Ваше имя: <span style="color: brown"><?php echo $_GET[login] ?></span> </h3>
    <?php
    include_once 'database.php';
    include_once 'functions.php';

    $allpetition=AllPetition($link);

        if($allpetition!=false)
            {
            foreach ($allpetition as $item)
            {
                $NumGolos=CountGolos($link, $item[petition_id]);
                echo '<div id="allpetit">';
                echo '<h2>'.$item[title].'</h2>';
                echo '<p>'.$item[info].'</p>';
                echo '<a href="golos.php?petition_id='.$item[petition_id].'&login='.$_GET[login].'&id='.$_GET[id].'">Голосовать</a>';
                echo '<p style="font-weight: bold"> Всего голосов: '.$NumGolos.'</p>';
                echo '</div>';
            }
            echo 'вход';
            }
            else
            {
                echo 'Петиции не найдены';
            }

            if($_GET[petition_id]!='' and $_GET[login]!='' and $_GET[id]!='')
            {
                $user_id=$_GET[id];
                $petition_id=$_GET[petition_id];
                $golosOk=AddGolos($link, $user_id, $petition_id);
                if($golosOk!=0) {
                    echo 'Голос принят';
                }
                if ($golosOk==0)
                {
                    echo 'Уже проголосовали';
                }
            }

 ?>
    
</body>
</html>