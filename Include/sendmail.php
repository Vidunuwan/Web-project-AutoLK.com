<?php

$otp=rand(1000,9999);
$_SESSION['otp']=$otp;
echo $_SESSION['otp'];
$emailto=$_SESSION['eMail'];
//send mail
$to       = "$emailto";
$subject  = "AutoLK.com account verification code";
$message  = "<h3>AutoLK.com account verification code is</h3> <h1>$otp</h1><br> Thank your for join with us!";
$headers  = 'From: [autolk17]@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";
//end -- send mail
	
?>