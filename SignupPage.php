<?php
$title="Sign Up";
require_once('Include/header.php');
?>
<style>
	body {
    background-image: url('Images/SingUp/BG3.gif');
}
::placeholder {
    color: #27292C;
}
.content {
    width: 600px;
    height: 500px;
    margin-top: 120px;
    margin-left: 28%;
}
.contentHeader , .formContainer {
    width: 600px;
    text-align: center;
}
.contentHeader {
    color: #7C7E81;
}
.formContainer {
    height: 500px;
}
.row {
    margin-top: 15px;
    height: 40px;
}
.formRow {
    margin-top: 20px;
    text-align: center;
}
.inputIcon {
    margin-top: 10px;
    padding-left: 10px;
    font-size: 20px !important;
    color: #CAC9C9;
}
.inputbox {
    border-radius: 4px;
    background-color: #7B8396;
    color: #27292C;
}
.inputbox:focus{
    outline: none;
}
.signupbtn {
    width: 150px;
    background-color: #565656 ;
    color:  #131313   ;
    font-weight: 600;
    border: 2px solid#1D1D1F  ;
	
}
.signupbtn:hover {
    background-color: #14171C ;
    color: #5C657A ;
    border: none  ;
}
</style>
</head>
	
<body>
<?php		
if(isset($_REQUEST['submit'])){
	$eMail=$_REQUEST['email'];
	$fName=$_REQUEST['fname'];
	$lName=$_REQUEST['lname'];
	$password=$_REQUEST['password'];
	$cPassword=$_REQUEST['confirmPassword'];
	$phone=$_REQUEST['contactNumber'];
	
	if(!empty($fName) && !empty($lName) && !empty($eMail) && !empty($password)&& !empty($cPassword)&& !empty($phone)){
		$insertStat=1;
		
		$sqlGetdata="SELECT e_mail FROM user";
		$rasultGetdata=$link->query($sqlGetdata);
		
		while($rowGetdata=$rasultGetdata->fetch_array()){
			if($eMail==$rowGetdata['e_mail']){
				?>
			<div class="header">
            <div>
				<div class="alert alert-danger" role="alert" style="text-align: center;">
  			E mail is alredy taken
				</div>
            </div>
    		</div>
	<?php
				$insertStat=0;
				break;
			}
		}
		
		if($password!=$cPassword){
			$insertStat=0;
			?>
			<div class="header">
            <div>
				<div class="alert alert-danger" role="alert" style="text-align: center;">
  			Password Conformation fail
				</div>
            </div>
    		</div>
	<?php
		}
		
		if($insertStat==1){
			$_SESSION['eMail']=$eMail;
			$_SESSION['fname']=$fName;
			$_SESSION['lname']=$lName;
			$_SESSION['phone']=$phone;
			$_SESSION['password']=md5($password);
			
			header("Location: Verification.php");
			
		}
	}
	else{ 
		?>
			<div class="header">
            <div>
				<div class="alert alert-danger" role="alert" style="text-align: center;">
  			Field Cannot be emty!
				</div>
            </div>
    		</div>
	<?php
		
	}

}
	
?>
    <div class="container">
        <div class="content">
            <div class="contentHeader">
                <h3><strong>&emsp;&emsp;Create an Account</strong></h3>
            </div>
            <div class="formContainer">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" name="userData" class="signInForm" method="POST" autocomplete="off" >
                    <div class="row formRow">
                        <div class="col-sm-2"></div>
                        <i class="fa fa-user col-sm-1 inputIcon" aria-hidden="true"></i>
                        <input type="text" name="fname" placeholder="First Name" class="firstName col-sm-7 inputbox">
                    </div>
                    <div class="row formRow">
                        <div class="col-sm-2"></div>
                        <i class="fa fa-user col-sm-1 inputIcon" aria-hidden="true"></i>
                        <input type="text" name="lname" placeholder="Last Name" class="lastName col-sm-7 inputbox">
                    </div>
                    <div class="row formRow">
                        <div class="col-sm-2"></div>
                        <i class="fa fa-envelope col-sm-1 inputIcon" aria-hidden="true"></i>
                        <input type="email" name="email" placeholder="Email Address" class="email col-sm-7 inputbox">
                    </div>
                    <div class="row formRow">
                        <div class="col-sm-2"></div>
                        <i class="fa fa-unlock-alt col-sm-1 inputIcon" aria-hidden="true"></i>
                        <input type="password" name="password" placeholder="Password" class="password col-sm-7 inputbox">
                    </div>
                    <div class="row formRow">
                        <div class="col-sm-2"></div>
                        <i class="fa fa-unlock-alt col-sm-1 inputIcon" aria-hidden="true"></i>
                        <input type="password" name="confirmPassword" placeholder="Confirm Password" class="confirmPassword col-sm-7 inputbox">
                    </div>
                    <div class="row formRow">
                        <div class="col-sm-2"></div>
                        <i class="fa fa-phone col-sm-1 inputIcon" aria-hidden="true"></i>
                        <input type="text" name="contactNumber" placeholder="Contact Number" class="MobileNum col-sm-7 inputbox">
                    </div>
                    <div class="btnrow formRow">
                         &emsp;&emsp;&emsp;<input type="submit" name="submit" class="signupbtn btn btn-primary" value="Register"> 
                    </div>
					<div class="btnrow formRow" style="color: azure">
						&emsp;&emsp;&emsp;<a href="LoginPage.php" class="btn btn-outline-dark">Back to Login</a> 
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once('Include/footer.php');?>
