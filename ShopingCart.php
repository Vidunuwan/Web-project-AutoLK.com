<?php

$title="Shoping Cart";
require_once('Include/header.php');

$coustemerEmail=$_SESSION['loginEmail'];

if(isset($_REQUEST['buy'])){
	$itemId=$_REQUEST['itemId'];
	$inQyt=$_SESSION['qyt'];
	$sqlAddCart="INSERT INTO cart VALUES('$coustemerEmail','$itemId',$inQyt)";
	$link->query($sqlAddCart);
}

if(isset($_REQUEST['removeItem'])){// Remove items from cart
	$itemID=$_REQUEST['removeItem'];
	$sqlDel="DELETE FROM cart WHERE user_id='$coustemerEmail' AND item_id='$itemID'";
	$link->query($sqlDel);
}
	
if(isset($_REQUEST['count'])){// update the cart if user need more quentity
	$str=$_REQUEST['count'];
	$get=explode(" ",$str);
	$itemID=$get[1];
	$quantity=$get[0];
	if($quantity>0 && $quantity<=$_SESSION['in_stock_item']){
		
		$sqlUpdateq="UPDATE cart SET quantity='$quantity' WHERE user_id='$coustemerEmail' AND item_id='$itemID'";
		$link->query($sqlUpdateq);
	}
		
}

include("include/NavigationBar2.php");//Navigation bar
?>

<link rel="stylesheet" href="Include/CSS/ShopingCart.css">

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
											
$totItem=0;
$totPrice=0;
$sqlGetToCart="SELECT I.*,C.quantity FROM cart C, items I WHERE C.item_id=I.item_id AND C.user_id='$coustemerEmail'";
$resultGetToCart=$link->query($sqlGetToCart);
while($rowGetToCart=$resultGetToCart->fetch_array()){

	

				?>

                <div class="row itemContainer">
                    <img src="Images/Items/<?php echo $rowGetToCart['main_category']; ?>/<?php echo $rowGetToCart['sub_category']; ?>/<?php echo $rowGetToCart['item_id']; ?>/1.png" class="img-fluid itemImage" alt="item1" width="100px" height="100px">
                    
                    <div class="itemContent col-md-6 col-sm-6 col-lg-6">
                        <h6 class="ietemDescription" style="color: green;">
							<?php echo $rowGetToCart['main_category'];?>,
							<?php echo $rowGetToCart['sub_category'];?><br>
                          <b><?php echo $rowGetToCart['name'];?></b>
                        </h6><br>
                          <p class="brand col-lg-8 col-sm-4 col-mb-4"><strong>Brand :</strong><?php echo $rowGetToCart['Brand'];?></p>   
                          <p class="inStock col-lg-6 col-sm-4 col-mb-4">In stock(<?php echo $rowGetToCart['in_stock_item']?> items)</p>
                       
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
                <h4 class="orderSummeryText"style="text-align: center"><strong>Order Summery</strong></h4>	
            </div>
			
			<div class="totalContainer row">
				<table cellpadding="5px">
					<tr>
						<th style="text-align: left">
							<h4>Items</h4>
						</th>
						<th style="text-align: right">
							<?php echo $totItem;?>
						</th>
					</tr>
				</table>
			</div>
			<br><br>
            <div class="totalContainer row">
				<table cellpadding="5px">
					<tr>
						<th style="text-align: left">
							<h3>Total</h3>
						</th>
						<th style="text-align: right">
							<h3><?php 	echo $totPrice;?>&nbsp;LKR</h3>
						</th>
					</tr>
				</table>
            </div>
			<form action="Checkout.php" method="post">
				<div class="checkout">
					<input type="hidden" value="<?php 	echo $coustemerEmail;?>" name="coustomerEmail">
					<input type="hidden" value="<?php 	echo $totPrice;?>" name="totPrice">
					<input type="hidden" value="<?php 	echo $totItem;?>" name="totitem">
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
