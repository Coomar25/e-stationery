<?php
include"view/header.php"
?>
<h1>this is home page </h1>

<?php
$fooditem = get_food_item();

if($fooditem)
{
	while($row = $fooditem->fetch_assoc())
	{
	echo "<div class='col-md-4 col-sm-6'>
<div class='card'>
<img class='image' src='" . $base_url ."Admin-zone/". $row["imgurl"] . "' height='250px' width='100%' />
  <h4><b>" . $row["food_name"] . "</b></h4> 
  <p>" . $row["f_desc"] . "</p>
   <button class='btn btn-info btn-block'> Price : " . $row["price"] . "</button> <br>
  <p><a href='" . $base_url . "?r=viewfooddetail' class='btn btn-primary' >View food </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='" . $base_url . "?r=addtocart' class='btn btn-danger' >add to cart </a><br></p><br>
</div>
</div>";
}
}
else
{
	echo "sorry no food items available";
}

include "view/footer.php";
?>