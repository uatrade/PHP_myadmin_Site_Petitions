<?php

$link=mysqli_connect('localhost', 'root', '', 'Petitions');

if(mysqli_connect_errno())
{
    echo '������ ����������� � ���� ������('.mysqli_connect_errno().') :'.mysqli_connect_error();
    exit();
}
?>