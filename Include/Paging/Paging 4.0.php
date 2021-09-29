<div class="container-fluid" >
	<div class="row" style="background-color: #DADADA">
		<div class="col-5"></div>
		<div class="col-2"><br>
		<nav aria-label="...">
  			<ul class="pagination">
    			<li class="page-item <?php echo $prevBtnStat;?>">
					<a class="page-link" href="Catogery.php?pageno=<?php echo $pageNo-1; ?>&amp;catogery=<?php echo $catogery;?>">Previous</a>
    			</li>
				
    			<li class="page-item <?php echo $prevPage2Stat;?>"><a class="page-link" href="Catogery.php?pageno=<?php echo $prevPage2; ?>&amp;catogery=<?php echo $catogery; ?>"><?php echo $prevPage2; ?></a></li>
				<li class="page-item <?php echo $prevPage1Stat;?>"><a class="page-link" href="Catogery.php?pageno=<?php echo $prevPage1; ?>&amp;catogery=<?php echo $catogery; ?>"><?php echo $prevPage1; ?></a></li>
				
    			<li class="page-item active">
      				<span class="page-link">
        				<?php echo $pageNo; ?>
        				<span class="sr-only">(current)</span>
      				</span>
    			</li>
				
    			<li class="page-item <?php echo $nextPage1Stat;?>"><a class="page-link" href="Catogery.php?pageno=<?php echo $nextPage1; ?>&amp;catogery=<?php echo $catogery; ?>"><?php echo $nextPage1; ?></a></li>
				<li class="page-item <?php echo $nextPage2Stat;?>"><a class="page-link" href="Catogery.php?pageno=<?php echo $nextPage2; ?>&amp;catogery=<?php echo $catogery; ?>"><?php echo $nextPage2; ?></a></li>
				
    			<li class="page-item <?php echo $nextBtnStat;?>">
      				<a class="page-link " href="Catogery.php?pageno=<?php echo $pageNo+1; ?>&amp;catogery=<?php echo $catogery;?>">Next</a>
    			</li>
  			</ul>
		</nav>
	</div>
	</div>
</div>