<?php 
include "model/DbModel.php";

if(empty($_POST))
{
	include "view/addfood.php";
	return;
}

try{
$flag = false;
$flag = empty($_POST["fname"]) || empty($_POST["fdesc"]) || empty($_POST["price"]) ;

if ($flag) {
        $error['body'] = 'All input field are required.';
        $error['title'] = 'Danger!!';
        $error['type'] = 'danger';
        setFlash('message', $error);
        include 'view/addfood.php';
        return;
    }

   $foodname = filtertext($_POST["fname"]);
   $fdesc =  filtertext($_POST["fdesc"]);
   $price = filtertext($_POST["price"]);
 	$target="";
       if (!empty($_FILES["foodimgupload"]) && $_FILES["foodimgupload"]["error"] == 0) {
        $target = "images/".basename($_FILES['foodimgupload']['name']);
      //  echo $target;
        //die();
        move_uploaded_file($_FILES['foodimgupload']['tmp_name'],$target);
   $food = add_new_food($foodname,$fdesc,$price,$target);
   if($food)
   {
   		$msg['title']='Success!!';
        $msg['body']="successfully added new food item";
        $msg['type']='success';
        setFlash('message', $msg);
        include "view/addfood.php";
        return;
   }
   else
   {
   		$msg['title']='danger!!';
        $msg['body']="food item not added successfully";
        $msg['type']='danger';
        setFlash('message', $msg);
        include "view/addfood.php";
        return;
   }

}
} catch (Exception $ex) {
    throwError();
}

?>
