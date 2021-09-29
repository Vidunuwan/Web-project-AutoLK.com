<?php
$title="Sign Up";
require_once('Include/header.php');
$_SESSION['totitem']=$_REQUEST['totitem'];
$_SESSION['totPrice']=$_REQUEST['totPrice'];
?>
<link rel="stylesheet" href="Include/CSS/Checkout.css">

      <div class="content" >
          <div class="container" style="
 				 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  				 text-align: center;" >
              <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    			<input type="hidden" name="merchant_id" value="1218716">    <!-- Replace your Merchant ID -->
    			<input type="hidden" name="return_url" value="http://se/Project/Payment%20success.php">
    			<input type="hidden" name="cancel_url" value="http://se/Project/Homepage.php?pass=0">
    			<input type="hidden" name="notify_url" value="http://se/Project/Homepage.php?pass=0">  
    			
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