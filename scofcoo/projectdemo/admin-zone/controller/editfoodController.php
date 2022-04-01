<?php

include "model/DbModel.php";

$id = "";
if(isset($_GET["id"]))
$id = $_GET["id"];

if(empty($_POST))
{
$food = get_food_by_id($id);
include "view/editfood.php";
return;
}

try{
$flag = empty($_POST["fname"]) || empty($_POST["fdesc"]) || empty($_POST["price"]);
if($flag)
{
	$error["body"] = "All inputs are required";
	$error["title"] = "danger";
	$error["type"] = "danger";
	setFlash("message",$error);
	$food = get_food_by_id($id);
	include "view/editfood.php";
	return;
}

$foodname = filterText($_POST["fname"]);
$fdesc = filterText($_POST["fdesc"]);
$price = filterText($_POST["price"]);
$target="";
       if (!empty($_FILES["foodimgupload"]) && $_FILES["foodimgupload"]["error"] == 0) {
        $target = "images/".basename($_FILES['foodimgupload']['name']);
      //  echo $target;
        //die();
        move_uploaded_file($_FILES['foodimgupload']['tmp_name'],$target);
$update = update_food_by_id($id,$foodname,$fdesc,$price,$target);
if($update)
{
	$error["body"] = "data updated successfully";
	$error["title"] = "success";
	$error["type"] = "success";
	setFlash("message",$error);
	redirect("managefood");
}
else
{
	$error["body"] = "data not updated successfully";
	$error["title"] = "danger";
	$error["type"] = "danger";
	setFlash("message",$error);
	include "view/editfood.php";
	return;
}

}
} catch (Exception $ex) {
    throwError();
}


?>