<?php
$title="Sign Up";
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
    width: 640px;
    
    background-color: #FFFFFF;
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
    background-color:#D2D0D0;
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

      <div class="content" >
          <div class="container" style="
 				 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  				 text-align: center;" >
              <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    			<input type="hidden" name="merchant_id" value="1218716">    <!-- Replace your Merchant ID -->
    			<input type="hidden" name="return_url" value="http://sample.com/return">
    			<input type="hidden" name="cancel_url" value="http://sample.com/cancel">
    			<input type="hidden" name="notify_url" value="http://sample.com/notify">  
    			
    			<input type="hidden" name="order_id" value="ItemNo12345">
    			<input type="hidden" name="items" value="Door bell wireless"><br>
    			<input type="hidden" name="currency" value="LKR">
    			<input type="hidden" name="amount" value="<?php echo $_REQUEST['totPrice'];?>">  
    	<table>
			<tr>
				<td>
					First name:
				</td>
				<td>
					<input type="text" name="first_name"  class="inputbox">
				</td>
				<td>
					&emsp;Last name:
				</td>
				<td>
					<input type="text" name="last_name"  class="inputbox">
				</td>
			</tr>
			<tr><td colspan="4">&emsp;</td></tr>
			<tr>
				<td>
					E-mail:
				</td>
				<td>
					<input type="email" name="email"  class="inputbox" value="<?php echo $_REQUEST['coustomerEmail'];?>">
				</td>
				<td>
					&emsp;Mobile:
				</td>
				<td>
					<input type="text" name="phone"  class="inputbox">
				</td>
			</tr>
			<tr><td colspan="4">&emsp;</td></tr>
			<tr>
				<td>
					Adress:
				</td>
				<td>
					<input type="text" name="address"  class="inputbox">
				</td>
				<td>
					&emsp;City:
				</td>
				<td>
					<input type="text" name="city"  class="inputbox">
				</td>
			</tr>
		</table>
    			
    			
    			
    	<input type="hidden" name="country" value="Sri Lanka"><br><br><br> 
    			
    	<div class="d-grid gap-2">
  			<input type="submit" value="Buy Now" class="btn btn-primary">
		</div>
    			
    			   
</form> 
          </div>
      </div>
<?php require_once('Include/footer.php');?>