<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Payment Sucess</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	  
    <link rel="stylesheet" href="Include/CSS/Payment success.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  <?php
	  
	  session_start();
	  
	  include("include/connect to db.php");//Connect to database
	  $t=time();
	  $coustemerEmail=$_SESSION['loginEmail'];
	  $orderid="$coustemerEmail"."$t";
	  $items=$_SESSION['totitem'];
	  $amount=$_SESSION['totPrice'];
	  $date=date("l jS \of F Y h:i:s A");
	  
	  $sqlin="INSERT INTO transaction VALUES('$orderid','$coustemerEmail',$items,$amount,'$date')";
	  $link->query($sqlin);
	  
	  //Update items table
	  $sql="SELECT * FROM cart WHERE user_id='$coustemerEmail'";
	  $result=$link->query($sql);
	  while($row=$result->fetch_array()){
		  $qyt=$row['quantity'];
		  $itemId=$row['item_id'];
		  $sqlUp="UPDATE items SET in_stock_item=in_stock_item-$qyt WHERE item_id='$itemId'";
		  $link->query($sqlUp);
	  }
	  
	  $sqlDel="DELETE FROM cart WHERE user_id='$coustemerEmail'";
	  $link->query($sqlDel);
	  
	  
	  
	  ?>
    <div class="Container-fluid">
            <div class="content">
                <div>
                    <h2 id="success">Payment Successful</h2>
                </div>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="#6FD205" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                    </svg>
                </div>
                <div>
                    <h2 id="thank">Thank You!</h2>
                </div>
                <div class="link">
                    <a id="continue" href="HomePage.php?pass=1">Continue Shopping</a>
                </div>
            </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../boostrap/js/bootstrap.min.js"></script>
  </body>
</html>