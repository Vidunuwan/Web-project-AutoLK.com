<?php
$title="Verify email";
require_once('Include/header.php');
?>
<style>
	body {
    background-color:#FFFFFF;
	background-image: url('');
}
.header {
    width: 100%;
    height: 300px;
}
.headerImage {
    width: 100%;
    height: 400px;
}
.content {
    margin-top: 40px;
}
.image {
    width: 100%;
    height: 300px;
}
.container{
    width: 400px;
    border: 1px solid #151515 ;
    background-color: #252526;
    height: 410px;
    border-radius: 2%;
}
.row {
    margin-top: 15px;
    height: 40px;
}
.icn {
    margin-top: 10px;
    padding-left: 10px;
    font-size: 20px;
    color: #565658 ;
}
.login {
    margin-top: 10px;
    font-size: 20px;
    color: #A09F9F ;
	text-align: center;
}
.inputbox {
    border-radius: 3px;
    background-color:#Dfdfdf;
    border: 1px solid #1D1D1E;
    color: gray;
    display:block;
}
.inputbox:focus {
    outline: none;
    border: none;
}
#signuptext {
    padding-left: 60px;
    color: #565658;
    margin-top: 10px;
}
#signuptextb {

    color: #565658;
    margin-top: 10px;
	text-align: center;
}
#signuptexta {
    color: #646466;
    text-decoration: none;
}
#signuptexta:hover {
    color: #484849;
}
.submitbtn {
    background-color: #1D1D1E;
    border: 1px solid#151515;
    font-weight: bold;
    color: #565658;
    border-radius: 2%;
    display:block;
    
}
.submitbtn2 {
    background-color: #234565;
    border: 1px solid# #234533;
    font-weight: bold;
    color: #565658;
    border-radius: 2%;
    display:block;
    
}
.submitbtn:hover {
    background-color: #111111;
    box-shadow: 3px 3px #151515;
    border: 1px solid #111111;
}
</style>
<?php

if(isset($_REQUEST['send'])){
	$btnval="Resend code";
	$btndisable=0;
	include("include/sendmail.php");
	
}
else{
	$btnval="Send code";
	$btndisable=1;
}
if(isset($_REQUEST['verify'])){
	$btnval="Resend code";
	$btndisable=0;
	
	if(!empty($_REQUEST['otp'])){
		if(strval($_SESSION['otp'])==$_REQUEST['otp']){
			echo "Vefification success";
			
			$eMailN=$_SESSION['eMail'];
			$fNameN=$_SESSION['fname'];
			$lNameN=$_SESSION['lname'];
			$phoneN=$_SESSION['phone'];
			$passwordEn=$_SESSION['password'];
			
			$sqlInsert="INSERT INTO user VALUES('$eMailN','$fNameN','$lNameN','$passwordEn','$phoneN')";
			$resultInsert=$link->query($sqlInsert);
	
			if($resultInsert){
				echo("Successfully aded");
				header("Location: LoginPage.php");
				
			}
			else{
				echo("Fail add data");
			}
			
			
		}
		else{
			echo "Code did not match";
		}
	}
	else{
		echo "Enter code that we sent to you";
	}
	
}


?>
<div class="content">
	<div class="container" >
		<div class="login">
			<h4>Verify your email adress</h4>
		</div>
		<p id="signuptextb">Pleace confirm that you want to use this as your account and email adress. once it done you will be able to start buying</p>
<?php
if($btndisable==1){ ?>
				<p id="signuptextb">Click on Send button for get the code</p>
<?php
}
else{ 
?>
				<p id="signuptextb">Enter the code we sent to your email address</p>
				<p id="signuptextb"><strong><?php echo $_SESSION['eMail'];?></strong></p>
<?php 
} 
?>
		<form autocomplete="off"  name="loginForm" class="loginform" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
			<div class="row inputrow">
				<div class="col-sm-1"></div>
				<i class="fa fa-unlock-alt col-sm-1 icn" aria-hidden="true"></i>
				<input type="text" name="otp" placeholder="Enter code here" class="col-sm-8 inputbox">
			</div>
			<div class="row inputrow">
				<div class="col-sm-4"></div>
<?php
if($btndisable==1){ ?>
				<input type="submit" value ="Verify" class="col-sm-4 submitbtn" name="verify" disabled>
<?php
}
else{
?>
				<input type="submit" value ="Verify" class="col-sm-4 submitbtn" name="verify">
<?php 
}
?>			</div>
			<div class="row inputrow">
				<div class="col-sm-4"></div>
				<input type="submit" value ="<?php echo $btnval;?>" class="col-sm-4 submitbtn2" name="send">
            </div>
		</form>
		<div class="toSignup">
<?php
if($btndisable==0){ ?>
			<p id="signuptext">Don't received a code? Resend it</p>
<?php
}
?>			
		</div>
	</div>
</div>

<?php require_once('Include/footer.php');?>