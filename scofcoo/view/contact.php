<?php

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<link rel="stylesheet" type="text/css" href="view/contact.css">

<body>


	<form action="" method="POST">
		<div id="contactWrap">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="sectionTitle">Contact us</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-center">
							<div class="blurb">
								Want to chat? Send us a message. We'd love to hear from you!
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-sm-offset-2">
							<div class="inputContainer">
								<label>Name</label>
								<input type="text" name="contactName" id="contactName" value="" class="form-control" autocomplete="off" />
							</div>
						</div>
						<div class="col-sm-4">
							<div class="inputContainer">
								<label class="screen-reader-text">Email</label>
								<input type="text" name="email" id="email" value="" class="form-control" autocomplete="off" />
							</div>
						</div>
						<div class="col-sm-8 col-sm-offset-2">
							<div class="inputContainer">
								<label class="screen-reader-text">Message</label>
								<textarea name="comments" id="commentsText" class="form-control" autocomplete="off"></textarea>
							</div>
						</div>
						<div class="col-sm-8 col-sm-offset-2">
							<button name="submit" type="button" class="btn btn-primary btn-lg">Send</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>




</body>

</html>