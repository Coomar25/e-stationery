<!DOCTYPE html>
<html>

<head>
    <title>login form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

<link href="<?php echo $base_url ?>resource/bootstrap/css/font-awesome.min.css" rel="stylesheet">

         <link rel="stylesheet" href="<?php echo $base_url ?>resource/bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="<?php echo $base_url ?>resource/style6.css">
        <script src="<?php echo $base_url ?>resource/js/jquery-3.2.1.js"></script>
        <script src="<?php echo $base_url ?>resource/bootstrap/js/bootstrap.js"></script>
         <script src="<?php echo $base_url ?>resource/js.js"></script>
    

</head>

<body>

    <div class="container">

        <h2 class="big-heading display-4 bold">Login Page</h2>

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
        </div>

        <p class="heading">Please enter your name and password</p>

        <form method="" action="<?php echo $base_url; ?>?r=Mylogin" method="post">
            <div class="jumbotron container">
                <div class="form-group call">
                    <label for="name">Name:</label><br>
                    <div class="input-group mb-3">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </div>
                        </div>
                        <input class="form-control" type="text" name="uname" value="<?php echo isset($_POST["uname"])? $_POST["uname"] : '' ; ?>" id="" placeholder="Username or Name"
                            autocomplete="off" required><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="passsword">Your passsword:</label><br>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                        </div>
                        <input class="form-control" type="password" name="password" id=""
                            placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="">
                    <label class="form-check-label" for="checkbox">Remember me</label>
                </div>
                <div class="form-group mygroup2">
                    <button type="submit" class="btn btn-success btn-block text-center"
                        onclick="popup();">Login</button>
                    <h5> OR</h5>
                    <button type="button" class="btn btn-primary btn-block text-center"> <a
                            href="https://www.facebook.com/" target="_blank"> Login via facebook</a></button>
                </div>
                <a class="CAB myCA" href="#" onclick="accountClick()">Create an account?</a>

        </form>
    </div>




</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="index.js"></script>
<script>
    function popup() {
        Swal.fire({
            icon: 'success',
            title: 'Good Job!',
            text: 'Login Successful...',
            showConfirmButton: false,
            timer: 1000
        })
    }
</script>

</html>