<!--<meta http-equiv="content-type" content="text/html; charset=UTF-8" />-->

<?php

function get_users($link)
{
    $sql="Select * from users";

    $result=mysqli_query($link, $sql);

    $allusers=mysqli_fetch_all($result, 1);

    echo '<pre>';

    foreach ($allusers as $item) {
        echo '<pre>' . $item[login] . '</pre>';
    }
}

function AddUser($link, $login, $email){

    $sql="Select login, email from users where login='$login' or email='$email'";
    $find = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

    foreach ($find as $item)
        return 'find';


    $sql="INSERT INTO users VALUES (null, '$login', '$email')";

    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

    mysqli_close($link);
    return 'OK';
}

function AddPetition($link, $user_id, $title, $comment)
{
    $sql="INSERT INTO userpetions VALUES (null, '$user_id', '$title', '$comment')";
    $result2 = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
    mysqli_close($link);


    return $result2;
}

function CheckUsers($link, $login)
{
    $sql="select user_id, login From users where users.login='$login'";
    $result3 = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
    mysqli_close($link);

    return $result3;
}
function AllPetition($link)
{
    $sql="select petition_id, title, info from `userpetions`";
    $result4 = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
    /*mysqli_close($link);*/
    return $result4;
}
function CountGolos($link, $petition_id)
{
    $sql="select COUNT(*) from `golos` where petition_id=$petition_id";
    $rescount = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
    foreach ($rescount as $item)
    {
        return $item['COUNT(*)'];
    }
}

function AddGolos($link, $user_id, $petition_id)
{
    /*проверка записи*/
    $sql="select golos_id from golos where user_id=$user_id and petition_id=$petition_id";
    $result5 = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
    $count=0;
    foreach ($result5 as $item)
    {
        $count++;
    }

    if($count==0)
    {
        $sqlAdd="INSERT INTO `golos` VALUES (null, '$user_id', '$petition_id')";
        $result6 = mysqli_query($link, $sqlAdd) or die("Ошибка " . mysqli_error($link));
        mysqli_close($link);
        return $result6;
    }
     if($count!=0)
     {
         return 0;
     }
    mysqli_close($link);
}