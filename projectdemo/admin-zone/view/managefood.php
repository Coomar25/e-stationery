<?php
include "view/header.php";

?>

<div class ="container">
	<div class="row">
		<div class = "col-md-12">
			<?php
				$fooditem  =  get_food_item();
				if($fooditem)
				{
					$sno = 1;
					echo "<table border=1 class='table table-hover'><tr><th>s.no </th><th>food image</th><th>food name </th><th>food description </th><th>price</th><th> action </th> </tr>";
					while($row = $fooditem->fetch_assoc())
					{
						echo "<tr><td>" . $sno .
						"</td><td><img src='" . $base_url . $row["imgurl"] .
						"' height='100px' width='100px' /></td><td>" . $row["food_name"] .
						"</td><td>" . $row["f_desc"] .
						"</td><td>" . $row["price"] .
						"</td><td> <a href='" . $base_url . "?r=editfood&id=" . $row["fid"] . "'> edit </a> <a href ='" . $base_url . "?r=deletefood&id=" . $row["fid"] . "' > delete </a> </td></tr>";

						$sno++;
					}



				}
				else
				{
					echo "no food item to display";
				}



			?>

		</div>
	</div>
</div> 

<?php
include "view/footer.php";
?>