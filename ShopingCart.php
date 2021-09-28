<?php
$title="Shoping Cart";
require_once('Include/header.php');

include("include/NavigationBar2.php");//Navigation bar
?>

<style>
	body{
    background-color: #CCD0D0;
}
.cartContainer{
    position: absolute;
    width: 90%;
    height: auto;
    left: 5%;
    right: 5%;
    top: 40px;
}
.leftCol {
     padding-right: 0%;
     margin-left: 0%;
}
.rightCol {
    margin-left: 50px;
    background-color: white;
    height: 300px;
    border: 2px solid white;
    border-radius: 5px;
}
.headBar {
    background-color: white;
    padding-left: 0%;
    margin-left: 0px;
    padding-left: 0px;
    margin-bottom: 30px;
    height: 100px;
    border: 2px solid white;
    border-radius: 5px;
}
.cart {
   padding-top: 10px;
}
.selectAll, .cart {
    padding-left: 20px;
}
.selectAll{
    position: flex;
    width: 150px;
    height: 30px;
    text-decoration: none;
    font-size: 15px;
    border: none;
    text-align: left;
    font-weight: 500;
    background-color: white;
}
.selectAll:hover {
    color: #090940;
    text-decoration: underline;
}
.itemList {
    list-style-type:none;
    padding-left: 0px;
    padding-right: 0px;
    margin-top: 20px;
}
.itemContainer{
    width: 100%;
    height: 170px;
    list-style-type:none;
    padding-left: 0px;
    padding-right: 0px;
    margin-bottom: 20px;
    background-color: white;
    margin-left: 0;
    border: 2px solid white;
    border-radius: 5px;
}
.checkBox {
    margin-top: 70px;
    margin-left: 10px;
    width: 20px;
    height: 20px;
    border-color: #7FEACC;
    box-shadow: none;
    outline: none;
}
.checkBox:checked {
    background-color: #7FEACC ;
    box-shadow: none;
}
.itemImage {
    width: 150px;
    height: 140px;
    margin: 10px;
    display: block;
    border-radius: 5px;
}
.ietemDescription{
    font-size: 16px;
    margin-bottom: 20px;
}
.select, .itemContent, .price{
    margin: 1px;
    margin-right: 15px;
}
.addMoreItems {
    width: 50%;
    margin-top: 10px;
    margin-left: 10%;
}
.btnContent {
    justify-content: center;
}
.row1 {
    margin: 2px;
    font-size: 25px;
    height: 50px;
}
.abc {
    margin: 5px;
    margin-top: 20px;
}
.inpt {
    border: none;
}
.btn {
    font-size: 15px;
}
.btn:focus {
    outline: none;
    border: none;
    box-shadow: 0;
}
.valueContainer {
    margin-top: 20px;
    margin-bottom: 5px;
    text-align: center;
}
.deleteIconcontainer {
    text-align: center;
    margin-top: 12px;
    color: #051C16;
}
.deleteIcon {
    font-size: 30px;
}
.summery {
    margin-top: 10px;
    margin-bottom: 10px;
}
.totalItemsContainer {
    margin-top: 20px;
}
.coupon {
    margin-left: 10px;
    border-radius: 5px;
    border: 1px solid #191B1B;
}
.couponbtn {
    margin-left: 30px;
    background-color: #9BEFD7;
    border: none;
    border-radius: 5px;
    transition: backgound-color 1s;
}
.couponbtn:hover{
    background-color: #62E6C0;
}
.totalContainer {
    margin-top: 20px;
}
.checkoutbtn {
    width: 100%;
    height: 40px;
    background-color: #15AC6E;
    border: none;
    border-radius: 5px;
    transition: backgound-color 1s;
}
.checkoutbtn:hover {
    background-color: #62E6C0;
}
</style>

<div class="container">
    <div class="row cartContainer">
        <div class="leftCol col-lg-8">
            <div class="headBar">
                <h2 class="cart">Shopping Cart</h2>
            </div>
			
            <ul class="itemList">

<?php
if($_SESSION['loginStat']==0){
?>
	<div class="alert alert-danger" role="alert" align="center">
  		<b>Log in before buy products</b>
	</div>
<?php
}			

if($Count['count']==0){ ?>
	<div class="alert alert-warning" role="alert">
  		Your cart is emty!
	</div>
	<div class="d-grid gap-2">
  		<a class="btn btn-warning" type="button" href="HomePage.php?pass=<?php echo $_SESSION['loginStat'];?>">Continue Shoping</a>
	</div>
<?php 
}				
				
if(isset($_REQUEST['removeItem'])){
	$itemID=$_REQUEST['removeItem'];
	$sqlDel="DELETE FROM cart WHERE user_id='$coustemerEmail' AND item_id='$itemID'";
	$link->query($sqlDel);
}
	
if(isset($_REQUEST['count'])){
	$str=$_REQUEST['count'];
	$get=explode(" ",$str);
	$itemID=$get[1];
	$quantity=$get[0];
	if($quantity>0){
		
		$sqlUpdateq="UPDATE cart SET quantity='$quantity' WHERE user_id='$coustemerEmail' AND item_id='$itemID'";
		$link->query($sqlUpdateq);
	}
		
}				
			
				
				
				
				
$totItem=0;
$totPrice=0;
$sqlGetToCart="SELECT I.*,C.quantity FROM cart C, item I WHERE C.item_id=I.item_id AND C.user_id='$coustemerEmail'";
$resultGetToCart=$link->query($sqlGetToCart);
while($rowGetToCart=$resultGetToCart->fetch_array()){
	$_SESSION['itemID']=$rowGetToCart['item_id'];
	

				?>

                <div class="row itemContainer">
                    <img src="img1.jpg" class="img-fluid itemImage" alt="item1" width="100px" height="100px">
                    
                    <div class="itemContent col-md-6 col-sm-6 col-lg-6">
                        <h6 class="ietemDescription" style="color: green;">
                          <b><?php echo $rowGetToCart['discription'];?></b>
                        </h6>
                          <p class="brand col-lg-4 col-sm-4 col-mb-4"><strong>Brand :</strong> Nike</p>
                          <p class="color col-lg-4 col-sm-4 col-mb-4"><strong>Color :</strong> black</p>
                          <p class="inStock col-lg-4 col-sm-4 col-mb-4">In stock</p>
                       
                    </div>
                    <div class="price col-md-2 col-sm-2 col-lg-2">
                      <div class="row">
						  <table style="text-align: center;">
							  <tr>
								  <td>
									  <a href="ShopingCart.php?count=<?php echo ($rowGetToCart['quantity']-1)." ".$rowGetToCart['item_id']; ?>" class="btn btn-warning">-</a><!-- Minus button-->
								  </td>
								  <td>
									  <?php echo $rowGetToCart['quantity']; ?> 
								  </td>
								  <td>
									  <a href="ShopingCart.php?count=<?php echo ($rowGetToCart['quantity']+1)." ".$rowGetToCart['item_id']; ?>" class="btn btn-warning">+</a><!-- Add button-->
								  </td>
							  </tr>
						  </table>
                      </div>
                        <div class="valueContainer">
                              <p class="value" style="color: royalblue;"><?php 	echo $rowGetToCart['price']; 				$totPrice+=$rowGetToCart['quantity']*$rowGetToCart['price'];
							  $totItem+=$rowGetToCart['quantity'];?> LKR</p>
                        </div>
						
                        <div class="deleteIconcontainer" ><!-- Delete button-->
							<a class="btn" href="ShopingCart.php?removeItem=<?php echo $rowGetToCart['item_id'];?>" title="Remove from cart">
                            <i class="fa fa-trash-o fa-lg deleteIcon" aria-hidden="true"style="color: red;" ></i>
							</a>
                        </div>
						
                    </div>
                </div>
<?php } ?> 
            </ul>
        </div>
        <div class="rightCol col-lg-3">
            <div class="summery">
                <h4 class="orderSummeryText">Order Summery</h4>
            </div>
            <div class="totalItemsContainer row">
                <p class="totalItemsText col-sm-2 col-md-2">Items</p>
                <div class="col-sm-8 col-md-8"></div>
                <p class="totalItems col-sm-2 col-md-2"><?php echo $totItem;?></p>
            </div>


            <div class="totalContainer row">
                <h6 class="totalText col-sm-3 col-md-3">Total</h6>
                <div class="col-md-6 col-sm-6"></div>
                <p class="total col-sm-3 col-md-3"> <?php 	echo $totPrice;?></p>
            </div>
			<form action="Checkout.php" method="post">
				<div class="checkout">
					<input type="hidden" value="<?php 	echo $coustemerEmail;?>" name="coustomerEmail">
					<input type="hidden" value="<?php 	echo $totPrice;?>" name="totPrice">
<?php
if($_SESSION['loginStat']==1 && $Count['count']!=0) { 
					?>
					<div class="d-grid gap-2">
  						<input type="submit" value="Proceed to checkout" class="btn btn-success">
					</div>
<?php
}
?>
              		
            	</div>
			</form>
            
        </div>
    </div>
</div>
<?php require_once('Include/footer.php');?>
