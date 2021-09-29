<?php
//Pagination Start
if(isset($_REQUEST['pageno'])){
	$pageNo=$_REQUEST['pageno'];
	$start=($pageNo-1)*12;
}
else{
	$pageNo=1;
	$start=0;
}
//Get last page
$sql_all="SELECT item_id FROM items WHERE main_category='$catogery'";
$result_all=$link->query($sql_all);
$last_page=ceil(($result_all->num_rows)/12);
echo $last_page;
//$last_page=30;

if($pageNo==1){
	$prevPage1=".";
	$prevPage2=".";
	$nextPage1=$pageNo+1;
	$nextPage2=$pageNo+2;
	$prevBtnStat="disabled";
	$nextBtnStat="";
	$prevPage2Stat="disabled";
	$prevPage1Stat="disabled";
	$nextPage1Stat="";
	$nextPage2Stat="";
}
elseif($pageNo==2){
	$prevPage1=$pageNo-1;
	$prevPage2=".";
	$nextPage1=$pageNo+1;
	$nextPage2=$pageNo+2;
	$prevBtnStat="";
	$nextBtnStat="";
	$prevPage1Stat="";
	$prevPage2Stat="disabled";
	$nextPage1Stat="";
	$nextPage2Stat="";
	
}
elseif($pageNo==$last_page){
	$prevPage1=$pageNo-1;
	$prevPage2=$pageNo-2;
	$nextPage1=".";
	$nextPage2=".";
	$prevBtnStat="";
	$nextBtnStat="disabled";
	$nextPage1Stat="disabled";
	$nextPage2Stat="disabled";
	$prevPage1Stat="";
	$prevPage2Stat="";
	
}
elseif($pageNo==$last_page-1){
	$prevPage1=$pageNo-1;
	$prevPage2=$pageNo-2;
	$nextPage1=$pageNo+1;
	$nextPage2=".";
	$prevBtnStat="";
	$nextBtnStat="";
	$nextPage1Stat="";
	$nextPage2Stat="disabled";
	$prevPage1Stat="";
	$prevPage2Stat="";
}
else{
	$nextPage1=$pageNo+1;
	$nextPage2=$pageNo+2;
	$prevPage1=$pageNo-1;
	$prevPage2=$pageNo-2;
	$prevBtnStat="";
	$nextBtnStat="";
	$prevPage2Stat="";
	$prevPage1Stat="";
	$nextPage1Stat="";
	$nextPage2Stat="";
}
if($last_page==2){
	if($pageNo==1){
	$prevPage1=".";
	$prevPage2=".";
	$nextPage1=2;
	$nextPage2=".";
	$prevBtnStat="disabled";
	$nextBtnStat="";
	$prevPage2Stat="disabled";
	$prevPage1Stat="disabled";
	$nextPage1Stat="";
	$nextPage2Stat="disabled";
	}
	
	elseif($pageNo==2){
	$prevPage1=1;
	$prevPage2=".";
	$nextPage1=".";
	$nextPage2=".";
	$prevBtnStat="";
	$nextBtnStat="disabled";
	$prevPage1Stat="";
	$prevPage2Stat="disabled";
	$nextPage1Stat="disabled";
	$nextPage2Stat="disabled";
	}

}
if($last_page==1){
	$prevPage1=".";
	$prevPage2=".";
	$nextPage1=".";
	$nextPage2=".";
	$prevBtnStat="disabled";
	$nextBtnStat="disabled";
	$prevPage2Stat="disabled";
	$prevPage1Stat="disabled";
	$nextPage1Stat="disabled";
	$nextPage2Stat="disabled";
	
}

//End Paging
?>