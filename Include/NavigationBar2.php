<?php
$coustemerEmail=$_SESSION['loginEmail'];
$sqlGetCountItem="SELECT COUNT(item_id) AS count FROM cart WHERE user_id='$coustemerEmail'";
$resultGetCountItem=$link->query($sqlGetCountItem);
foreach($resultGetCountItem as $Count){	
}
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
	<a href="" class="navbar-brand">&emsp; AutoLK.com</a>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav ">
			<li class="nav-item"><a href="../Project/HomePage.php" class="nav-link">Home</a></li>
		</ul>
		<ul class="navbar-nav">
        		<li class="nav-item dropdown">
          			<a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catogery</a>
          			<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            			<?php 
						$i=0;
						while ($i<11){
							$i++;
						?>
							<li><a class="dropdown-item" href="#"><?php echo "This is Catogery   ".$i ?></a></li>
						<?php
						} 
						?>
            			
          			</ul>
        		</li>	
      	</ul>
    </div>
	<ul class="navbar-nav ">
		<?php
		if ($_SESSION['loginStat']==0) { ?>
			<li class="nav-item">
				<a href="./LoginPage.php" class="nav-link">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
  						<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
  						<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
					</svg>&emsp;User Login
				</a>
			</li>
		<?php
		}
		else{ ?>
			<li class="nav-item"><a href="" class="nav-link"><?php echo $_SESSION['loginEmail'] ?></a></li>
			<li class="nav-item"><a href="Homepage.php?passlogstat=0" class="nav-link">Log out</a></li>
		<?php 
		}
		?>	
	</ul>
	<ul class="navbar-nav ">
		<li class="nav-item">
			<a href="ShopingCart.php" class="nav-link">
					<!--Shoping Cart-->
					<button type="button" class="btn btn-dark position-relative">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  							<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
						</svg>
						<?php
						if($Count['count']!=0){
						?>
  						<span id="unrdMg" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $Count['count'] ?>
  							<span class="visually-hidden">unread messages</span>
  						</span>
						<?php
						}
						?>
					</button>
					<!--End Shoping Cart-->
			
			</a>
		</li>
		<li class="nav-item"><a href="" class="nav-link">&emsp;</a></li>
	</ul>	
	
</nav>
