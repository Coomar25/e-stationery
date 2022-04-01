<?php
include "view/header.php";
?>

<div class="container">
<div class="row">
<div class="col-md-12">

<form class = "form" method = "post" action="<?php echo $base_url; ?>?r=addfood" enctype="multipart/form-data">

<label> food item </label>
<input type="text" class="form-control" name="fname" value="" placeholder="enter food name here" /><br>
<label> food desc </label>
<input type="text" name="fdesc" class="form-control" value="" placeholder="enter food desc here" /><br>

<label> food price </label>
<input type="number" name="price" class="form-control" value="" placeholder="enter price" /><br>

<label> image </label>
<input type="file" name="foodimgupload" class="form-control" /> <br>

<input type="submit" class = "btn btn-primary" value="add food" name="addfood" /> <input type="reset" class="btn btn-info" value="clear" name="resetfood" /> 

</form>

</div>
</div>
</div>

<?php
include "view/footer.php";
?>
