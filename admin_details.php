<?php
     include("dbFunc.php");
     $obj = new dbFunc();
    $story_id=$_GET['story_id'];
    $res = $obj-> travel_fetch($story_id);
   //  $res=mysqli_query($conn,"select * from travel_details where travel_id=$travel_id");
    $row=mysqli_fetch_assoc($res);
    $travelid=$row['id'];

    if(isset($_POST['btnUpdate'])){
        $place=$_POST['place'];
        $desc=$_POST['description'];
        $storyid=$_POST['storyid'];
        $table_name="stories";
        $formdata=array(
            'title'=>$place,
            'description'=>$desc
        );
        $obj = new dbFunc();
        $update_result=$obj->update_storydata($table_name,$formdata,$storyid);
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
   <link rel="stylesheet" href="jquery.fancybox.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript">
   $(document).ready(function() {
       $("#deleteall").click(function() {
         var id = $(this).data('id');
         $.ajax({
           type: "POST",
           url: "deleteall.php",
           data:{
                 id:id,
           },
           success: function(response){
           window.location.href='admin_dashboard.php'   
           }
       });
     });
     });
       </script>
</head>
<body class="wrapper">
   <div class="container-fluid">
      <div class="row dashboard-header">
         <div class=" col-xs-12 col-md-6 text-center search">
            <!-- <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
               <input type="text" name="employeeid"  size="30" placeholder="Search by place"/>
               <button type="submit" class="search_btn" id="search" name="search">Search</button><br /><br />
            </form> -->
         </div>
         <div class="col-xs-12 col-md-6">
            <div class="col-md-12 text-right menus">
                <a class="button" href="admin_dashboard.php">Home</a>
                <a class="button" href="view_user.php">View users</a>
                <a class="button" href="view_comments.php">View Comments</a>
                <a class="button" href="admin.php">Logout</a>
            </div>
         </div>
      </div>

      <div class="col-xs-12 col-md-12">
            <div class="col-md-12 text-right menus">
                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Edit</button>
                <div class="dropdown">
                <button class="dropbtn  btn btn-warning btn-lg">Delete</button>
                <div class="dropdown-content">
                    <a href="" name="deleteall" id="deleteall" data-id="<?php echo $story_id;?>">Delete Story</a>
                </div>
                </div>
            </div>
      </div>

      <div class="row">
      <div class="col-md-12 main-container">
      <?php
            $banner_image=$row['photo'];
            $banner_path=$banner_image;
            $place=$row['title'];
            $description=$row['description'];
            $user_name=$row['user'];

          ?>
               <div class="col-xs-6 col-md-6 text-center container-data">
                   <img class="travel_img" src=<?php echo $banner_path;?>>
                   <h3>Story Posted By : <?php echo $user_name ?></h3>
               </div>

                <div class="col-md-6">
                     <div class="story">
                        
                        <h2 class="text-center heading"><?php echo $place ?></h2>
                        <p class="description"><?php echo $description; ?></p>

                     </div>
                  </div> 

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Travel Details</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="">
         <input type="hidden" value="<?php echo $story_id; ?>" name="storyid"/>
         <input type="text" name="place" class="form-control" value="<?php echo $place ?>" required><br/>
         <textarea class="form-control" name="description" required><?php echo $description ?></textarea><br/>
         <div class="col-md-4 col-md-offset-4">
         <button type="submit" class="btn btn-info form-control" id="btnUpdate" name="btnUpdate">Update</button><br/><br/>
         </div> 
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
        </div>
      </div>
      </div>
      </div>
                 
              
   </div>
</div>
<script type="text/javascript" src="jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="general.js"></script>
</body>
</html>