<?php
include 'model/DbModel.php';
if(!empty($_SESSION['admin']['login'])){
	header("location:" . $base_url . "?r=login");
} else{
	include 'view/feedback.php';
	return;
}

?>
