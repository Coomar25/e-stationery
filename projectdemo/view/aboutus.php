<h1>About Us</h1>
<form method="POST">
	<input type="text" name="data" class="form-control">
	<input type="submit" value="Submit" >
</form>
<table>
	<tr><th>name</th><th>anout></th></tr>
	<?php
		while ($a=$about->fetch_assoc()) {
			?>
			<tr><td><?=$a['name']?></td><td><?=$a['about']?></td></tr>
			<?php 
		}
	?>
</table>