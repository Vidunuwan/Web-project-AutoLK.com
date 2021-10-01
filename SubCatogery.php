<?php

$title=$_REQUEST['catogery'];
require_once('Include/header.php');



include("include/NavigationBar2.php");//Include navigation bar

$active="";
$catogery=$_REQUEST['catogery'];
$subcatogery=$_REQUEST['subCat'];

include("include/Paging/Paging 5.0.php");//Paging part 1

$sqlSubCat="SELECT DISTINCT sub_category FROM items WHERE main_category='$catogery'";
$resultSubCat=$link->query($sqlSubCat);
?>
<h1 style="text-align: center;"><?php echo $catogery; ?></h1>
<div class="container">
	<div class="row">
		
<?php
while($rowSubCat=$resultSubCat->fetch_array()){
	?>
		<div class="col-6">
			<div class="list-group">
			
				<a type="button" class="list-group-item list-group-item-action <?php echo $active;?>" href="SubCatogery.php?subCat=<?php echo $rowSubCat['sub_category']; ?>&amp;catogery=<?php echo $catogery?>">
    <?php echo $rowSubCat['sub_category']; ?>
				</a>
			</div>
			</div>
			
<?php
}
?>
<h3 style="text-align: center;"><?php echo $subcatogery; ?></h3>		
	</div>
</div>
<br>



<?php
if($_SESSION['loginStat']==0){
?>
	<div class="alert alert-danger" role="alert" align="center">
  		<b>Log in before buy products</b>
	</div>
<?php
}

$sqlGetToHome="SELECT * FROM items WHERE main_category='$catogery' AND sub_category='$subcatogery' LIMIT $start,12";
$resultGetToHome=$link->query($sqlGetToHome);
?>
<div class="container" >
	<div class="row">
		<?php
		while($rowGetToGome=$resultGetToHome->fetch_array()){
		?>
		<div class="col-3">
			<table  class="table table-striped table-hover" style="
 				 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  				 text-align: center;" >
				<tr>
					<td style="height:80px;" align="center">
						<h4><strong><?php echo $rowGetToGome['name']; ?></strong></h4>
						
					</td>
				</tr>
				<tr>
					<td style="height:300px;">
						<img src="Images/Items/<?php echo $rowGetToGome[2]; ?>/<?php echo $rowGetToGome[3]; ?>/<?php echo $rowGetToGome['item_id']; ?>/1.png" alt="image can't load" class="img-thumbnail" width="500px" height="500px" >
					</td>
				</tr>
				<tr>
					<td style="height:100px;" align="center">
						<h3 id="price"><?php echo $rowGetToGome['price']; ?>&nbsp;LKR</h3>
						
						<form action="About Item.php" method="post">
    						<input type="hidden" name="itemId" value="<?php echo  $rowGetToGome['item_id']; ?>">
							<input type="hidden" name="path1" value="<?php echo  $rowGetToGome[2]; ?>">
							<input type="hidden" name="path2" value="<?php echo  $rowGetToGome[3]; ?>">
							<input type="submit" value="Buy Now" name="submit" class="btn btn-success">
						</form>
						
					</td>
				</tr>
			</table>
		</div>
		<?php 
		}

		?>
	</div>	
</div>



<?php 
include("include/Paging/Paging 6.0.php");//Paging part 2
//include("include/footerBar.php");//footer bar 

require_once('Include/footer.php');

?>
