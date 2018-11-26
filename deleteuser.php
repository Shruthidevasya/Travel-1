<?php
    include("dbFunc.php");
    $obj = new dbFunc();
    $username=$_GET['user_id'];
    echo $username;
    $obj-> user_delete($username);
    header('Location:view_user.php');
    ?>