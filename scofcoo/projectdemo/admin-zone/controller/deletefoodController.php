<?php
include "model/DbModel.php";

$id = "";
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}

$delfood = delete_food_by_id($id);
if($delfood)
{
	$msg["body"] = "data deleted successfully";
	$msg["title"] = "Warning";
	$msg["type"]="danger";
	setFlash("message",$msg);
	redirect("managefood");
}
else
{
	$msg["body"] = "data not deleted successfully";
	$msg["title"] = "Warning";
	$msg["type"]="danger";
	setFlash("message",$msg);
	redirect("managefood");
}