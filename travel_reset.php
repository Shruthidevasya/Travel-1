<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Page Title</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
   <script src="main.js"></script>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.min.js"></script>
</head>

<body>
   
   <section >
   <!-- <div style="border:1px solid grey;background-color:white;border-radius:20px;height:300px;width:600px;margin-top:100px;margin-left:400px;margin-right:400px;"><br> -->
           <h1 class="col-md-12 text-center">
           <span class="label label-danger"  style="text-align:center;">Login
           </h1><br><br>
       <form action="login.php" method="post"  class="col-md-4 col-md-offset-4"><br><br>
        <input type="password"  name="newpassword"   class="form-control" placeholder="Enter New Password" required><br>
        <input type="password"  name="confirmpassword"   class="form-control" placeholder="Confirm New password" required><br>
       <button type="submit" name="login" class="form-control btn btn-danger">Let's Go</button><br><br>
       </form>
    <!-- </div>    -->
   </section>
</body>
</html>