<?php
$link = new MySQLi("localhost","root","","autolk.com");
if($link->connect_error){
	echo "Fail to connect data base";
}
?>