<?php

include("dbFunc.php");

session_start();
$flag=0;
$title = $_POST["title"];
$user=$_SESSION['username'];
$description = $_POST["description"];
$photo=$_FILES['file']['name'];
$alt_image=$_POST['add_tag'];

$filepath="upload/".$photo;
$up=move_uploaded_file($_FILES["file"]["tmp_name"] , "$filepath");


condition($_POST["title"]);
condition($_POST["description"]);
condition($filepath);


function condition($valueoffeild){
  global $flag;      
    if (empty($valueoffeild) ){ 
      $flag = 1;
    }
  }
if(!$up)
{
echo'image not uploaded';
}
if(!$flag){
$form_data = array(
    'title'=> $title,
    'description'=>$description,
    'photo'=>$filepath,
    'user'=>$user,
    'alt'=>$alt_image
  );

  $table_name = 'stories';
  $x = new dbFunc();
  $x->insertstories("$table_name",$form_data);
}
 
  
?>

