<?php

echo "<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>";

include("dbFunc.php");
//$id = null;
session_start();
$id=$_SESSION['id'];
$res=$k->viewdetail($id);
$result = $res->fetch_assoc();
$title=$result['title'];
$description=$result['description'];
$photo=$result['photo'];
$alt=$result['alt'];
$_SESSION['photo']=$photo;

if(isset($_POST['submit'])){

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'Abcd@123';
    $dbname = 'Travel';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
            
            $image_filter=$_SESSION['uploaded_image'];
            $story_id=$_SESSION['id'];

            if(! $conn ) {
                die('Could not connect: ' . mysqli_error());
             }

             echo 'Submitted sucessfully<br>';

             

             $sql ="UPDATE stories SET filtered_image='$image_filter' WHERE id='$story_id'";
             
              mysqli_query($conn, $sql);

             mysqli_close($conn);
 
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">


        function grayscale(filter){

            $.post("file2.php",
            {
            
                filter:filter
    
            },
            function(data, status){
    
          // alert("Data: " + data + "\nStatus: " + status);
                     $('#blah').attr('src', data);
                    // document.getElementById("blah").style.display="block";
            });

        }

    </script>

</head>

<body>

    <form method="post" enctype="multipart/form-data" style="text-align:center;">

    <!-- <input type="file" id="image_file" name="file" onchange="readURL(this);" /><br/> -->

    <img id="blah" src=<?php echo $photo;?> alt=<?php echo $alt; ?> id="display_image" style="height:550px;width:auto;"/>
    <br/>
    <input type="button" name="blacknwhite" id="blacknwhite" value="Greyscale" onclick="grayscale('gray')">
    <input type="button" name="toaster" id="toaster"  value="toaster" onclick="grayscale('toaster')">
    <input type="button" name="nashville" id="nashville"  value="nashville" onclick="grayscale('nashville')">
    <input type="button" name="lomo" id="lomo" value="lomo" onclick="grayscale('lomo')">
    <br/>
    <!-- <input type="button" name="kelvin" id="kelvin" style="display:none;" value="kelvin" onclick="grayscale('kelvin')"> -->
    <input type="submit" name="submit">

    <button onclick="window.location.href='index.php'" style="border:none;background-color:#FF005F;color:white;padding:5px 5px;">Home page</button>

    </form>

</body>
</html>