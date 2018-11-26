<?php
    include("dbFunc.php");
    $obj = new dbFunc();
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        $obj-> user_story($id);
    }
?>