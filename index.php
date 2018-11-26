<?php

session_start();

if(isset($_POST['logout']))
{
    session_destroy();
    unset($_SESSION['username']);
    echo "<script>location.href='login.php'</script>";
}
if(isset($_POST['stories']))
{
    echo "<script>location.href='stories.php'</script>";
}
if(isset($_POST['username']))
$username =$_SESSION['username'];

if(isset($_POST['firstname']))
$first=$_SESSION['firstname'];

if(isset($_POST['lastname']))
$last=$_SESSION['lastname'];

if(isset($_POST['email']))
$email=$_SESSION['email'];

if(isset($_POST['dob']))
$dob = date("d-m-Y",$_SESSION['dob']);

include("dbFunc.php");
$y = new dbFunc();
$res = $y->search();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link  rel="stylesheet" href="css/style.css">
</head>
<body>
<div>

    <div class="col-md-12 main-container">
        <div class="col-md-6 headerstyle">
            <a href="index.php" >  <img src="logo.png" class="logo">
        </div>
        <div class="col-md-6 headerstyle text-right">
            <?php if((isset($_SESSION['username'])))
            {?>
            <div class="col-md-8 headerstyle text-right">  <?php
           echo ' <form action="" method="post">
            <a href="index.php"> <button type="submit" name="logout" class="btnstyle">Logout</button></a>
             </form>';
          ?></div>
          <div class="col-md-4 headerstyle text-right">
          <?php
             echo ' <form action="" method="post" >
            <a href="stories.php"> <button type="submit" name="stories" class="btnstyle">Add story</button></a>
             </form>';?></div><?php
            }
            else
                echo ' <a href="login.php"> <button type="submit" name="log" class="btnstyle">Login</button></a>';
            ?>

        </div>
        <img src="slider-1.jpg" class="centerview">
    </div>
    <div class="col-md-12" ><h2 class="moreDetailtiyle">Stories</h2>
            <?php
            foreach($res as $row)
            {

                $title = $row['title'];
                $description = $row['description'];
                $photo = $row['photo'];
                ?>

                <div class="col-md-3 story-container"  id="story">
                    <a href="details.php?id=<?php echo $row['id']?>"><h2 class="storytitle"><?php echo substr($title, 0, 10);?></h2>

                        <img src="<?php echo $photo;?>"  class="center">
                </div>


                <?php
            }
            ?>
    </div>
</div>
</body>
</html>
