<?php
    include("dbFunc.php");
    $obj = new dbFunc();
    $res = $obj-> profile_fetch();
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
      <div class="row">
          <div class="dashboard-header">
         <div class="col-md-6 text-center search">
            <!-- <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
               <input type="text" name="employeeid"  size="30" placeholder="Search by place"/>
               <button type="submit" class="search_btn" id="search" name="search">Search</button><br /><br />
            </form> -->
         </div>
         <div class="col-md-6">
            <div class="col-md-12 text-right menus">
                <a class="button" href="admin_dashboard.php">Home</a>
                <a class="button" href="view_user.php">View users</a>
                <a class="button" href="view_comments.php">View Comments</a>
                <a class="button" href="admin.php">Logout</a>
            </div>
         </div>
      </div>
      </div>

      <div class="row">
      <div class="col-md-12 main-container">
      <?php
            while($row=mysqli_fetch_array($res)){
            $story_id=$row['id'];
            $place=$row['title'];
            $banner_image=$row['photo'];
            $banner_path=$banner_image;

          ?>
               <div class="col-xs-6 col-md-6 text-center container-data">
                   <?php
               echo '<h1 class="travel_header">'.$place.'</h2>';
               echo '<a href="admin_details.php?story_id=' . $story_id . '"><img class="travel_img" src= ' . $banner_path .'></a><br/>';
               ?>
               </div>
                  <?php
       }
                  ?>
              
   </div>
</div>
</body>
</html>