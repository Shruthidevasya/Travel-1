<?php
    include("dbFunc.php");
    $obj = new dbFunc();
    $comment_id=$_GET['comment_id'];
    $obj-> comment_delete($comment_id);
    header('Location:view_comments.php');
    ?>