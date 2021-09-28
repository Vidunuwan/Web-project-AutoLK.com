<?php
$title="Log In";
require_once('Include/header.php');
?>
<style>
	body {
    background-color:#FFFFFF;
	background-image: url('Images/LoginPage/BG1.gif');
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
    height: 300px;
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
    background-color:#252526;
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
#signuptext a {
    color: #646466;
    text-decoration: none;
}
#signuptext a:hover {
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
.submitbtn:hover {
    background-color: #111111;
    box-shadow: 3px 3px #151515;
    border: 1px soli #111111;
}
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
				echo "Check your password";
			}
		}
		else{
			echo "Sign Up with your email before login";
		}
	}
	else{
		echo "Feild cannot be emty";
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
          </div>
      </div>

<?php require_once('Include/footer.php');?>