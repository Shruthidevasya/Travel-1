<?php
// include("data.php");
// 
include("data.php");
$id = null;
if ( !empty($_GET['id'])) {
   $id = $_GET['id'];
   
}
$res=$k->takesdetail($id);

$result = $res->fetch_assoc();
$title=$result['title'];
$description=$result['description'];
$photo=$result['photo'];?>



<?php
if(isset($_POST['update'])){
    $title = $_POST["title"];
    $description = $_POST["description"];
    // $photo=$_FILES['file']['name'];

    // $filepath="upload/".$photo;
    // $up=move_uploaded_file($_FILES["file"]["tmp_name"] , "$filepath");
    $form_data = array(
        'title'=> $title,
        'description'=>$description,
        'photo'=>$photo
        
      );
    
      $table_name = 'stories';
      $x = new Connect();
      $x->updatestories("$table_name",$form_data,$id);
}
?>
<html>
    <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/style.css">
    <script src="ckeditor/ckeditor.js"></script>
    </head>
    <body>
    <div class="col-md-12">
       
    </div>
    <div class="col-md-6 headerstyle">
    <a href="viewStories.php" >  <img src="logo.png" class="logo">
    </div>
    <div class="col-md-6 headerstyle text-right">
            <button type="button" name="view" class="btnstyle"><a href="index.php#story" >View</a></button>
    </div>

    
    <div class="col-md-6" style="margin-left:28%;">
        <form  method="post" enctype="multipart/form-data">
        <label for="title" class="storytext">Title of story</label>
            <input type="text" id="title" name="title" value="<?php echo $title;?>" class="form-control" ><br>
            <!-- <label for="title" class="storytext">Image</label><br>
            <img src="<?php echo $photo?>" >
            <input type="file" class="form-control" name="file"><br/> -->
       

        <label for="description" class="storytext">Write your travelling story</label><br>
        
        
        <textarea name="description" class="ckeditor" class="form-control" value="#myDiv"><?php echo $description?></textarea>

        
        <input name="update" type="submit" id="update" value="Update" class="form-control btnsubmit"><br><br>
        </form>
        </div>
    </body>
    </html>

