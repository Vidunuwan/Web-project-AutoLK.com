<?php
$title="Log In";
require_once('Include/header.php');
?>
<link rel="stylesheet" href="Include/CSS/LoginPage.css">
<style>
	body {
    background-color:#FFFFFF;
	background-image: url('Images/LoginPage/BG1.gif');
</style>
<?php
$_SESSION['loginStat']=0;


if(isset($_REQUEST['login'])){
	
	$emailLog=$_REQUEST['email'];
	$passwordLog=$_REQUEST['password'];
	
	if(!empty($emailLog) && !empty($passwordLog)){
		$sqlGetDataLog="SELECT password FROM user WHERE e_mail='$emailLog'";
		$resultLog=$link->query($sqlGetDataLog);
		$rowLog=$resultLog->fetch_array();
		if($rowLog['password']!=""){
			if($rowLog['password']==md5($passwordLog)){
				echo "Login success";
				$_SESSION['loginEmail']=$emailLog;
				header("Location: HomePage.php?pass=1");
			}
			else{
				?>
			
            <div>
				<div class="alert alert-danger" role="alert" style="text-align: center;">
  			Check your password
				</div>
            </div>
    		
				<?php
			}
		}
		else{
			?>
			
            <div>
				<div class="alert alert-danger" role="alert" style="text-align: center;">
  			Sing Up with your email before login!
				</div>
            </div>
    		
<?php
		}
	}
	else{ ?>
            <div>
				<div class="alert alert-danger" role="alert" style="text-align: center;">
  			Feild cannot be emty!
				</div>
            </div>
		
<?php
	}
}
?>
<div class="header">
	<div>
	</div>
</div>

      <div class="content" >
          <div class="container" >
              <div class="login">
                <h3>Log In</h3>
              </div>
              <form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']?>" name="loginForm" class="loginform" method="POST">
                <div class="row inputrow" >
                    <div class="col-sm-1" ></div>
                    <i class="fa fa-user col-sm-1 icn" aria-hidden="true"></i>
                    <input type="email" name="email" placeholder="Email" id="mail" class="col-sm-8 inputbox" >                   
                </div>
                <div class="row inputrow">
                    <div class="col-sm-1"></div>
                    <i class="fa fa-unlock-alt col-sm-1 icn" aria-hidden="true"></i>
                    <input type="password" name="password" placeholder="Password" class="col-sm-8 inputbox">
                </div>
                <div class="row inputrow">
                    <div class="col-sm-4"></div>
                    <input type="submit" value ="Log In" class="col-sm-4 submitbtn" name="login">
                </div>
              </form>
              <div class="toSignup">
                <p id="signuptext">Don't have an account? <a href="SignupPage.php">Signup</a></p>
              </div>
			  <div class="toSignup">
                <p id="signuptext" style="text-align:justify;"><a href="HomePage.php?pass=0"> &emsp;&emsp;&emsp;&emsp;Back to Home</a></p>
              </div>
          </div>
      </div>
<?php require_once('Include/footer.php');?>