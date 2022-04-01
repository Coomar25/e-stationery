<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Note Book</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
<link href="<?php echo $base_url ?>resource/bootstrap/css/font-awesome.min.css" rel="stylesheet">

         <link rel="stylesheet" href="<?php echo $base_url ?>resource/bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="<?php echo $base_url ?>resource/style6.css">
        <script src="<?php echo $base_url ?>resource/js/jquery-3.2.1.js"></script>
        <script src="<?php echo $base_url ?>resource/bootstrap/js/bootstrap.js"></script>
         <script src="<?php echo $base_url ?>resource/js.js"></script>
       
        <style>
            
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            .navbar {
                margin-bottom: 0;
                border-radius: 0;
                border-radius: 20px 20px 20px 20px ;
                
                
            }
            #nvv{
                position: relative;
            }
         
            /* Add a gray background color and some padding to the footer */
            footer {
                background-color: #f2f2f2;
                padding: 25px;
            }
            .navbtn{
                border: 1px solid gold;
                border-radius: 20px 0 20px 0;
             
            }
           .navbtn:hover{
               box-shadow: 3px;
                 border-radius: 20px 0 20px 0;
                 
            }
                       
        </style>
    </head>
    <body class="container">

        <nav class="navbar   " id="nvv">
            <div class="container-fluid">
         <div class="navbar-header">
                    <button type="button" class="navbar-toggle navbar-inverse" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
<!--                <div class=" navbar-nav <?php echo $_SESSION['active_url'] == 'home' ? 'active' : '' ?>"><a href="<?= $base_url . '?r=home' ?>">Home</a></div>-->
                 
<!--             <a class="navbar-nav <?php echo $_SESSION['active_url'] == 'home' ? 'active' : '' ?>" href="<?= $base_url . '?r=home' ?>"><img src="<?php echo $base_url ?>/resource/image/logo1.png" height="50px" width="60px"></a>
            -->
         </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="<?php echo $_SESSION['active_url'] == 'home' ? 'active' : '' ?>" ><a href="<?= $base_url . '?r=home' ?>"><strong style=" font-family: monospace; font-size: 30px;" id="j">J</strong ><strong style=" font-family:sans-serif; font-size: 20px; " id="agir">agir</strong></a></li>
                   
                           <?php
                        if (!empty($_SESSION['login'])) {
                            ?>
                               <?php
                        }
                        ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if(!empty($_SESSION['user']['login'])){ ?>                 
                        <li><p  style="margin: 7px;padding: 5px;color: #fff"><a href="<?= $base_url ?>?r=userprofile&id=<?php echo $_SESSION['user']['user_id']?>"><?php echo $_SESSION['user']['user_name'] ?></a></p></li>
                            <li><a style="margin: 7px;padding: 5px;" href="<?= $base_url ?>?r=logout" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                        <?php  } elseif(!empty($_SESSION['employer']['login'] )) {
                           ?>
                             <li><a style="margin: 7px;padding: 5px;" href="<?= $base_url ?>?r=alljobpost" class=" "><span class=""></span>&nbsp;Alljobpost</a></li>
                         <li><p  style="margin: 7px;padding: 5px;color: #fff"><a href="<?= $base_url ?>?r=employerprofile&id=<?php echo$_SESSION['employer']['user_id']?>"><?php echo $_SESSION['employer']['user_name'] ?></a></p></li>
                            <li><a style="margin: 7px;padding: 5px;" href="<?= $base_url ?>?r=logout" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                            
                                <?php
                        }else{
                            ?>
                            <li class="<?php echo $_SESSION['active_url'] == 'login' ? 'active' : '' ?> navbtn" id="navbtn"><a href="<?= $base_url ?>?r=login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
                            <li class="<?php echo $_SESSION['active_url'] == 'signup' ? 'active' : '' ?> navbtn" id="navbtn"><a href="<?= $base_url ?>?r=signup">Sign Up</a></li>
                            <li class="<?php echo $_SESSION['active_url'] == 'signup' ? 'active' : '' ?> navbtn" id="navbtn"><a href="<?= $base_url ?>?r=employersignup">Employer Zone</a></li>
                        <?php
                            
                        }
                        ?>
                    </ul>
                </div>
                
            </div>
        </nav>
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
            
            
            
<!--        <div>
            <?php
            if (empty($_SESSION['user']['login'])) {
                            ?>
                            <li class="<?php echo $_SESSION['active_url'] == 'login' ? 'active' : '' ?>"><a href="<?= $base_url ?>?r=login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
                            <li class="<?php echo $_SESSION['active_url'] == 'signup' ? 'active' : '' ?>"><a href="<?= $base_url ?>?r=signup">Sign Up</a></li>
                            <li class="<?php echo $_SESSION['active_url'] == 'signup' ? 'active' : '' ?>"><a href="<?= $base_url ?>?r=employersignup">Employer Zone</a></li>
                            <?php
                        } else {
                            ?>
                            <li><p  style="margin: 7px;padding: 5px;color: #fff"><?php echo $_SESSION['user']['user_name'] ?></p></li>
                            <li><a style="margin: 7px;padding: 5px;" href="<?= $base_url ?>?r=logout" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                            <?php
                        }
                        ?>
                              <?php
                        if (!empty($_SESSION['employer']['login'] )) {
                           
                            ?>
                            <li><p  style="margin: 7px;padding: 5px;color: #fff"><?php echo $_SESSION['employer']['user_name'] ?></p></li>
                            <li><a style="margin: 7px;padding: 5px;" href="<?= $base_url ?>?r=logout" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                            <?php
                        }
                        ?>
        </div>-->