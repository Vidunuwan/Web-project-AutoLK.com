
<?php
$title="About";
require_once('Include/header.php');

if(isset($_REQUEST['add'])){
	$inQyt=$_SESSION['qyt'];
	$sqlAddCart="INSERT INTO cart VALUES('$coustemerEmail',$itemId,$inQyt)";
	$link->query($sqlAddCart);
}

if(isset($_REQUEST['qyt'])){
	$qyt=$_REQUEST['qyt'];	
}
else{
	$qyt=1;
	$_SESSION['itemIDtoA']=$_REQUEST['itemId'];
}

include("include/NavigationBar2.php");//Navigation bar


$itemId=$_SESSION['itemIDtoA'];
?>
<link rel="stylesheet" href="include/About item/About item.css">
<br>

<?php 
//Get item details from item table
$sql="SELECT * FROM items WHERE item_id='$itemId'";
$result=$link->query($sql);
$row=$result->fetch_array();
//Get item details from item table done 

?>

    <!-- View -->
<br>
<div class="container-fluid">
	<div class="row imageContainer">
		<?php include("include/About item/About item slide.php");?>
		<div class= "buyContainer col-6">
			<div class="content">
				<div class="title">
					<h3><?php echo $row['name']; ?></h3>
				</div>
				<div class="row">
					<input class="Rbtn col-3" type="button" value="Ratings 53">
					<input type="button" value="Reviews 23" class="Rbtn col-3">
				</div>
				<div class="row">
					<p class="col-2">Availability&nbsp: </p>
					<?php 
					if($row['in_stock_item']){
					?>
					<p class="col-10" style="color:#49BF16;">&nbspIn stock(<?php echo $row['in_stock_item']; ?> items) </p>
					<?php 
					} 
					else{
					?>
					<p class="col-10" style="color:#FF0004;">&nbspOut of stock </p>
					<?php 
					} 
					?>
				</div>
				<div class="price row">
					<h6 class="col-2">Price&nbsp&nbsp: </h5>
					<h3 class="col-2"><?php echo $row['price']; ?>&nbsp;LKR</h3>
				</div>
				<div class="row quantityRow">
					<div class="qty">
						<strong>Quantity:</strong>
						<a href="About Item.php?qyt=<?php echo $qyt-1;?>" class="btn btn-info">-</a>
						<?php 
						if($qyt>0 && $qyt<100){
							$_SESSION['qyt']=$qyt;	
						}
						elseif($qyt==100){
							$_SESSION['qyt']=99;
							$qyt=99;
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
				<div >
					<form method="post" action="ShopingCart.php">
						<div class="d-grid gap-2">
  							<input class="btn btn-primary" type="submit" value="Buy it Now" name="buy">
						</div>
					</form>

				</div>
				<div >
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
					<div class="d-grid gap-2">
  						<input class="btn btn-success" type="submit" value="Add to cart" name="add">
					</div>
					</form>
				</div><br>
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
                                <td>Maker</td>
                                <td>Toyota</td>
                            </tr>
                            <tr>
                                <td>Compatible Brands</td>
                                <td>All cars</td>
                            </tr>
                            <tr>
                                <td>Warrenty</td>
                                <td>3 years</td>
                            </tr>
                            <tr>
                                <td>Material</td>
                                <td>Iron</td>
                            </tr>
                            <tr>
                                <td>Weight</td>
                                <td>15kg</td>
                            </tr>
                        </table>
                    </div>
            </div>   
</div>
        

    <!-- View done -->


<?php require_once('Include/footer.php');?>