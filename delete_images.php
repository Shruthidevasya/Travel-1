<?php
    include("db.php");
    $obj=new db();
    $conn=$obj->dbconnector();
    $travel_id=$_GET['travel_id'];
    $res=mysqli_query($conn,"select * from travel_details where travel_id=$travel_id");
    $row=mysqli_fetch_assoc($res);

    $sub_image=$row['sub_images'];
    $sub_image_data  = $sub_image;
    $sub_image_final = explode(",", $sub_image_data);


    if(isset($_POST['delete_image'])){
        $delete_image_name=$_POST['delete_image_name'];
        echo $delete_image_name."<br/>";
 
        $storyid=$row['story_id'];
        $sub_image1=$row['sub_images'];
        $sub_image_data1  = $sub_image1;
        $sub_image_final1 = explode($delete_image_name.',', $sub_image_data1);
        
        foreach($sub_image_final1 as $sub_images)
        {
            $formdata=array(
                'sub_images'=>$sub_images
            );
        }
        
        $table_name="travel_details";
        $obj=new db();
        $obj->dbconnector();
        $update_result=$obj->delete_image($table_name,$formdata,$storyid,$travel_id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="admin.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="wrapper">
   <div class="container-fluid">
      <div class="row dashboard-header">
         <div class=" col-xs-12 col-md-6 text-center search">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
               <input type="text" name="employeeid"  size="30" placeholder="Search by place"/>
               <button type="submit" class="search_btn" id="search" name="search">Search</button><br /><br />
            </form>
         </div>
         <div class="col-xs-12 col-md-6">
            <div class="col-md-12 text-right menus">
                <a class="button" href="admin_dashboard.php">Home</a>
                <a class="button" href="edit.php">Edit Profile</a>
                <a class="button" href="logout.php">Logout</a>
            </div>
         </div>
      </div>

       <div class="col-md-12">
                      <?php
                      foreach($sub_image_final as $sub_images)
                      {
                        if($sub_images!=''){
                           ?>
                        <div class="col-xs-6 col-md-3 text-center" id="one<?php echo $i;?>">
                        <img class="travel_simg" src=<?php echo $sub_images;?> >
                        <form method="post" action="">
                        <input type="hidden" value="<?php echo $sub_images; ?>" name="delete_image_name"><br/>
                        <button type="submit" class="btn btn-default" name="delete_image">Delete Image</button>
                        </form>
                        </div>
                        <?php
                       }
                    }
                       ?>
                  </div>
          
   </div>
</div>
</body>
</html>