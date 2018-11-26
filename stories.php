<?php
session_start();
if (!(isset($_SESSION['username'])))
{
    header('Location: login.php');
    exit;
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
    <a href="index.php" >  <img src="logo.png" class="logo">
    </div>
    <div class="col-md-6 headerstyle text-right">
            <button type="button" name="view" class="btnstyle"><a href="index.php" >View</a></button>
    </div>

    
    <div class="col-md-6" style="margin-left:28%;">
        <form action="storiesphp.php" method="post" enctype="multipart/form-data">
        <label for="title" class="storytext">Title of story</label>
            <input type="text" id="title" name="title" placeholder="Title of stroy.." class="form-control" ><br>
           
            <label for="title" class="storytext">Image</label>
            <input type="file"  class="form-control" name="file"><br/>
            
            <label for="tag" class="storytext">Add a tag for image</label>
            <input type="text" name="add_tag"/>
       <br/>
        <label for="description" class="storytext">Write your travelling story</label>
            <textarea name="description" class="ckeditor" class="form-control"></textarea><br>

        <input type="submit" name="submit" id="submit" class="form-control btnsubmit"><br><br>
        </form>
        </div>
    </body>
    </html>
