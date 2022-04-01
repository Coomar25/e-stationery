<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Admin Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
<link href="<?php echo $base_url ?>resource/bootstrap/css/font-awesome.min.css" rel="stylesheet">

         <link rel="stylesheet" href="<?php echo $base_url ?>resource/bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="<?php echo $base_url ?>resource/style.css">
        <script src="<?php echo $base_url ?>resource/js/jquery-3.2.1.js"></script>
        <script src="<?php echo $base_url ?>resource/bootstrap/js/bootstrap.js"></script>
         <script src="<?php echo $base_url ?>resource/js.js"></script>
       
       
   <style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="<?=$base_url?>?r=addfood">add food</a>
  <a href="<?=$base_url?>?r=managefood">managefood</a>
  <a href="<?=$base_url?>?r=services">Services</a>
  <a href="<?=$base_url?>?r=places">Places</a>
  <a href="<?=$base_url?>?r=gallery">Gallery</a>
  <a href="<?=$base_url?>?r=about">About</a>
  <a href="<?=$base_url?>?r=feedback">Feedback <span class=""></span></a>
</div>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    <h1>Admin Panel</h1>
    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if(!empty($_SESSION['admin']['login'])){ ?>                 
                        <li><p  style="margin: 7px;padding: 5px;color: #fff"><a href="<?= $base_url ?>?r=userprofile&id=<?php echo $_SESSION['user']['user_id']?>"><?php echo $_SESSION['user']['user_name'] ?></a></p></li>
                            <li><a style="margin: 7px;padding: 5px;" href="<?= $base_url ?>?r=logout" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                        <?php  } ?>
                    </ul>
  
</div>
        <div class="container-fluid" style="min-height: 500px;"> 
            <?php
            if (hasFlash('message')) {
                $falshError = getFlash('message');
                foreach ($falshError as $fe) {
                    ?>
                    <div class="alert alert-<?php echo $fe['type']; ?> fade in alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <?php
                        echo empty($fe['title']) ? '' : "<strong>" . $fe['title'] . "</strong> ";
                        echo $fe['body'];
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
            
            <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
     