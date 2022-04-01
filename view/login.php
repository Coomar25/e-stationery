<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Animated Login Form</title>
    <link rel="stylesheet" href="view/loginresources/loginstylesheet.css">
    <link rel="stylesheet" href="/SC OF COO/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    
</head>


<body>
   
    <div class="center">
        <h1>Login</h1>
        <form action="<?php echo $base_url ?>?r=login" method="post">
            <div class="txt_field">
                <input type="text" name="usname" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pass" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="#">Signup</a>
            </div>
        </form>
    </div>
    <script src="/SC OF COO/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
</body>

</html>