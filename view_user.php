<?php
    include("dbFunc.php");
    $obj = new dbFunc();
    $user = $obj-> user_fetch();
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
      <br/>
      <br/>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Action</th>
    </tr>
    
        <?php
    while($row=mysqli_fetch_array($user)){
     ?>
     <tr>
         <td><?php echo $row['username'];?></td>
         <td><?php echo $row['firstname'];?></td>
         <td><?php echo $row['lastname'];?></td>
         <td><?php echo $row['email'];?></td>
         <td><?php echo $row['dob'];?></td>
         <td>
             <?php
         echo '<a href="deleteuser.php?user_id=' . $row['username'] . '" class="btn btn-warning btn-md">Delete User</a><br/>';
         ?>
        </td>
    </tr>
   
     <?php
    }
    ?>
    </table>
    </body>
</html>
