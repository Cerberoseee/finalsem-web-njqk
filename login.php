<?php
    require_once('./components/layout.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>Login | JQKTube</title>
</head>
<body>
    <!-- Container -->
    <div class="container login__container p-5">
        <div id="register__container-bg"></div>
        <div class="row flex-center">
            <div class="login-form col-4">
                <form method="post">
                    <div class="form-header mt-2">
                        <legend>JQK WIBUTAPCODE</legend>
                        <small>Join with us</small>
                    </div>
                    <div class="form-input">
                        <label>Email</label>
                        <input type="email" placeholder="Email">
                    </div>
                    <div class="form-input">
                            <label>Password</label>
                            <input type="password" placeholder="Password">
                    </div>
                    <div class="form-input form-checkbox">
                        <input type="checkbox" name="" id="">
                        <label for="">Show password</label>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary flex-center mb-1 mx-auto">Login</button>
                    <small>If you do not have an account, you should click here to <a class="text-link-light" href="register.php">register</a></small>
                </form>
            </div>
        </div>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
</body>
</html>