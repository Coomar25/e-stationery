<?php
include 'view/header.php';
?>
<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        <div class="panel panel-primary" style=" border-radius: 4px 4px 10px 10px">
            <div class="panel-heading" style="  ;">
                <div class=" panel-title">
                    <strong> Admin Login</strong>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo $base_url ?>?r=login" method="post">
                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Enter email">                                        
                                    </div>
                               <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>  
                      <div class="form-group">
                        <input class="btn btn-success waves-effect" type="submit" value="Login">
                    </div>
                  
                      
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'view/footer.php';
?>