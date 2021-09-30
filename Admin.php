<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin View</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"><strong></strong>
    <!-- CSS -->
    <link rel="stylesheet" href="Include/CSS/Admin.css">
    
    <!--font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  <div class="">
	<div class="row">
	  <?php
	  session_start();
	  include("include/connect to db.php");//Connect to database
	  
	  include("include/NavigationBar2.php");//Include navigation bar
	  
	  $sql1="SELECT * FROM `transaction`";
	  $result1=$link->query($sql1);
	  ?>
	</div>
	 
	 
    <div class="row cartContainer">
        <div class="leftCol col-lg-8">
            <div class="headBar">
                <h2 class="cart">Admin View</h2>
                <button class="selectAll"> Last Transactions</button>
            </div>
            <ul class="itemList">
				<?php
				$i=1;
				while($row1=$result1->fetch_array()){
				?>
				<div class="alert alert-success" role="alert">
  					<?php echo $i.". <strong>Date:</strong> ".$row1['date']." Amount <strong>".$row1['amount']."</strong> LKR by ".$row1['user_id']."  ".$row1['items']." Items"; ?>
				</div>
				<?php 
					$i++;
				} ?>
            </ul>
        </div>
        <div class="rightCol col-lg-3">
            <h1>Category</h1>
            <div class="toUser">
			<?php
				$sql2="SELECT DISTINCT main_category FROM items";
				$result2=$link->query($sql2);
				while($row2=$result2->fetch_array()){
					
				
				?>
                  <h5 class=""><?php echo $main=$row2['main_category'];?></h5>
                  <ul>
					  <?php
					$sql3="SELECT COUNT(sub_category) AS Count,sub_category AS sub FROM items WHERE main_category='$main' GROUP BY sub_category";
					$result3=$link->query($sql3);
					while($row3=$result3->fetch_array()){
					  ?>
                    <li><P><?php echo $row3['sub'];?>(<?php echo $row3['Count'];?> items)</P></li>
				<?php 
					} ?>
                  </ul>
				<?php } ?>
            </div>
            <div class="toAdmin">
                  <h5>Last Transactions</h5>
                  <table class="table">
                    <tr>
                      <td class="tableRow1" style="font-weight:700;">Part</td>
                      <td class="tableRow2" style="font-weight:700;">Price</td>
                    </tr>
			<?php
				$sql1="SELECT * FROM `transaction`";
	  			$result1=$link->query($sql1);
				$totItems=0;
				$totAmount=0;
				
				while($row1=$result1->fetch_array()){
					
				?>
                    <tr>
                      <td class="tableRow1"><?php echo $row1['items']; ?></td>
                      <td class="tableRow2"><?php echo $row1['amount']; ?>LKR</td>
                    </tr>
			<?php
					$totItems+=$row1['items'];
					$totAmount+=$row1['amount'];
				} ?>
                    
                  </table>
				<h5>Total</h5>
                  <div class="row">
                    <h6 class="col-6"><?php echo $totItems; ?></h6>
                    <h5 class="col-6"><?php echo $totAmount; ?>LKR</h5>
                  </div>
            </div>
        </div>
    </div>
	  
</div>	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../boostrapjs/bootstrap.min.js"></script>
  </body>
</html>