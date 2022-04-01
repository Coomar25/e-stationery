<?php 
include "header.php";
?>
<div>
<?php
$users = view_users();
if($users)
{
	echo "<table border=1 class='table table-hover' > <tr><th>user id </th><th>email </th><th>password </th><th>user name</th><th>phone </th><th>address </th><th>user type</th><th>imageurl</th><th>created date </th><th>action </th></tr>";
	while($row = $users->fetch_assoc())
	{
	echo "<tr><td>". $row["user_id"] . 
	"</td><td>" . $row["email"] . 
	"</td><td>" . $row["password"] . 
	"</td><td>" . $row["uname"] . 
	"</td><td>" . $row["phone"] . 
	"</td><td>" . $row["address"] . 
	"</td><td>" . $row["user_type"] . 
	"</td><td>" . $row["imageurl"] . 
	"</td><td>" . $row["created_date"] . 
	"</td><td><a href='" . $base_url . 
	"?r=signup&id=" . $row["user_id"] . 
	"'>edit </a> <a href='" . $base_url . 
	"?r=deleteuser&id=" . $row["user_id"] . 
	"' >delete </a></td></tr>" ;
	}
	echo "</table>";
}
else
{
	echo "no users found";
}

?>

</div>

<?php

include "footer.php";

?>