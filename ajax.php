<?php
session_start();
if (isset($_SESSION['username'])) {
    $like = $_POST['like'];
    $dislike = $_POST['dislike'];
    $table = "reaction";
    $sid = $_SESSION['id'];
    $user = $_SESSION['username'];
    require_once('dbFunc.php');
    $obj = new dbFunc();
    $select = "user";
    $row = $obj->like_check($sid, $user, $select);
    $count = sizeof($row);
    if (!($count)) {
        $field = array("sid", "user", "`like`", "dislike");
        $data = array($sid, $user, $like, $dislike);
        $obj->Insertdata($table, $field, $data);
    } else {
        $obj->like_update($sid, $user, $like, $dislike);
    }
    $lcheck = "`like`";
    $lcount = $obj->like_count($sid, $lcheck);
    $dcheck = "dislike";
    $dcount = $obj->like_count($sid, $dcheck);
    $count = [];
    $count['like'] = $lcount;
    $count['dislike'] = $dcount;
//echo "upvote :" . $lcount . "downvote :" . $dcount;
    $result = new \stdClass();
    $result->lcount = $lcount;
    $result->dcount = $dcount;
    $myJSON = json_encode($result);
    echo $myJSON;
}//echo $dcount;
?>