<html>
<head>
    <title>forgetpassword</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>
   <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>
<div style="border:1px solid grey;background-color:white;border-radius:20px;height:300px;width:500px;margin-top:100px;margin-left:400px;margin-right:400px;"><br>
               <div class="panel-body ">
                   <div class="text-center">
                     <h3><i class="fa fa-lock fa-4x"></i></h3>
                     <h2 class="text-center">Forgot Password?</h2>
                     <p>You can reset your password here.</p>
                     <div class="panel-body">
       
                       <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="#"> 
       
                         <div class="form-group">
                           <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                             <input id="email" name="emailto" placeholder="email address" class="form-control"  type="email">
                           </div>
                         </div>
                         <div class="form-group">
                           <input name="emailsent" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                         </div>
                         
                         <input type="hidden" class="hide" name="token" id="token" value=""> 
                       </form>
       
                     </div>
                   </div>
                 </div>
             </div>    

</body>

</html>

<?php
if(isset($_POST['emailsent'])){
$emailto = $_POST['emailto'];
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'shruthidmg@gmail.com';
$mail->Password = 'mamathamohan';
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->isHTML(true);

function mailToUser($mail,$emailto) {
    $subject = "your request for reset password";
    $message = ""; 
    $message .= "<html><head><title></title></head><body>";
    $message .= "<p>Hello </p>";
    $message .= "<p>your can reset the password using this link</p>";
    $message .= '<a href="http://localhost/Travel-1/mail/travel_reset.php">click here</a>';
    $message .= "<p>Thank you for contacting TRAVEL</p>";
    $message .= "</body></html>";
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($emailto);
    $mail->setFrom('shruthidmg@gmail.com', 'TRAVEL');
    $success = $mail->Send();
    $mail->ClearAllRecipients();
}
    mailToUser($mail,$emailto);
}
?>













