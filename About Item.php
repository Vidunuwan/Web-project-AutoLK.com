
<?php
$title="About";
require_once('Include/header.php');



if(isset($_REQUEST['qyt'])){
	$qyt=$_REQUEST['qyt'];	
}
else{
	$qyt=1;
	
	$_SESSION['itemIDtoA']=$_REQUEST['itemId'];
	$_SESSION['path1']=$_REQUEST['path1'];
	$_SESSION['path2']=$_REQUEST['path2'];
}

$itemId=$_SESSION['itemIDtoA'];

if(isset($_REQUEST['add'])){
	$inQyt=$_SESSION['qyt'];
	$coustemerEmail=$_SESSION['loginEmail'];
	$sqlAddCart="INSERT INTO cart VALUES('$coustemerEmail','$itemId',$inQyt)";
	$link->query($sqlAddCart);
}

include("include/NavigationBar2.php");//Navigation bar

$sql_re="SELECT user_id FROM review WHERE item_id='$itemId'";
$result_re=$link->query($sql_re);
$reviewCount=($result_re->num_rows);
?>

<link rel="stylesheet" href="include/About item/About item.css">
<br>

<?php 
//Get item details from item table
$sql="SELECT * FROM items WHERE item_id='$itemId'";
$result=$link->query($sql);
$row=$result->fetch_array();
//Get item details from item table done 
$_SESSION['in_stock_item']=$row['in_stock_item'];
?>

    <!-- View -->
<br>
<div class="container-fluid">
	<div class="row imageContainer">
		<?php include("include/About item/About item slide.php");?>
		<div class= "buyContainer col-6">
			<div class="content">
				<div class="row">
					
				</div>
				<div class="title">
					<h1><?php echo $row['name']; ?></h1>
					<h4><?php echo $row['main_category']; ?>,<?php echo $row['sub_category']; ?></h4>
				</div>
				<div class="row">
					
				</div>
				<div class="row">
					<p class="col-2"><strong>Availability:&nbsp</strong> </p>
					<?php 
					if($row['in_stock_item']!=0){
						$disabled="";
					?>
					<p class="col-10" style="color:#49BF16;">&nbspIn stock(<?php echo $row['in_stock_item']; ?> items) </p>
					<?php 
					} 
					else{
						$disabled="disabled";
					?>
					
					<p class="col-10" style="color:#FF0004;">&nbspOut of stock </p>
					
					<?php 
					} 
					?>
				</div>
				<div class="price row">
					<h6 class="col-4" style="color: #E8AE03"><?php echo $reviewCount; ?>&nbsp;Reveiw</h6>
					<h6 class="col-4" style="color: #E8AE03"><?php echo round($row['rating'], 2); ?>&nbsp;Rating</h6>
				</div>
				<div class="price row">
					<h6 class="col-2"><strong>Price:</strong>&nbsp&nbsp: </h5>
					<h3 class="col-2"><?php echo $row['price']; ?>&nbsp;LKR</h3>
				</div>
				<div class="row quantityRow">
					<div class="qty">
						<strong>Quantity:</strong>
						<a href="About Item.php?qyt=<?php echo $qyt-1;?>" class="btn btn-info">-</a>
						<?php 
						if($qyt>0 && $qyt<$row['in_stock_item']){
							$_SESSION['qyt']=$qyt;	
						}
						elseif($qyt==$row['in_stock_item']){
							$_SESSION['qyt']=$row['in_stock_item'];
							$qyt=$row['in_stock_item'];
						}
						else{
							$_SESSION['qyt']=1;
							$qyt=1;
						}
						echo $_SESSION['qyt'];
						
						?>
						<a href="About Item.php?qyt=<?php echo $qyt+1;?>" class="btn btn-info">+</a>
						
					</div>
				</div>
				<?php
				if($_SESSION['loginStat']==1){
				?>
				<div >
					<form method="post" action="ShopingCart.php">
						<div class="d-grid gap-2">
							<input type="hidden" name="itemId" value="<?php echo $itemId; ?>">
  							<input class="btn btn-primary" type="submit" value="Buy it Now" name="buy" <?php echo $disabled;?>>
						</div>
					</form>

				</div>
				<div >
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
					<div class="d-grid gap-2">
						<input type="hidden" name="itemId" value="<?php echo $itemId; ?>">
						<input type="hidden" name="path1" value="<?php echo $_SESSION['path1']; ?>">
						<input type="hidden" name="path2" value="<?php echo $_SESSION['path2']; ?>">
  						<input class="btn btn-success" type="submit" value="Add to cart" name="add" <?php echo $disabled;?>>
					</div>
					</form>
				</div>
				<?php
				}
				else{
				?>
				<div class="alert alert-danger" role="alert" align="center">
  					<b>Log in before buy products</b>
				</div>
				<?php
				}
				?>
				<br>
				<div class="extraText">
					<ul>
						<li> Free delevary islandwide</li>                           
						<li> Delevered within two weeks</li>                            
						<li> 7 days return</li>  
					</ul>                      
                            <div class="paymentPartners">
                                <p style="padding-left:20px;">Our payment partners</p>
                                <div class="row paymentRow">
                                    <img src="Images/About item/img7.jpg" alt="Visa" class="col-2 payImage" >
                                    <img src="Images/About item/img8.png" alt="Master" class="col-2 payImage">
                                    <img src="Images/About item/img9.png" alt="payeer" class="col-2 payImage">
                                    <img src="Images/About item/img10.png" alt="paypal" class="col-2 payImage">
                                </div>
                            </div>
				</div>
                    </div>
                        
                </div>
                    
            </div>
            <div class="desciptionContainer">
                    <h3>Descrption</h3>
                    <div class="description">
                        <table class="table table-striped table-borderless">
                            <tr>
                                <td class="descriptionRow">Condition</td>
                                <td>Brand new</td>
                            </tr>
                            <tr>
                                <td>Brand</td>
                                <td><?php echo $row['Brand']; ?></td>
                            </tr>
                            <tr>
                                <td>Compatible Brands</td>
                                <td>All cars</td>
                            </tr>
                            <tr>
                                <td>Warrenty</td>
                                <td><?php echo $row['warranty_time']; ?></td>
                            </tr>
                        </table>
                    </div>
            </div>
	<div class="content">
			<div class= "buyContainer col-12">
				<p><?php echo $row['short_discription']; ?></p>
			</div>
	</div>
</div>
        

<?php
if($_SESSION['loginStat']==1){
	include("include/About item/Review.php");
}


require_once('Include/footer.php');?>