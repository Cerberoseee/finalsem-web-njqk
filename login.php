<?php
    require_once('./components/layout.php');
    $url = $_SESSION["url"];
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
            <div class="login-form col-4 col-md-6">
                <form id="login" method="post">
                    <div class="form-header mt-2">
                        <legend>WIBUTAP</legend>
                        <small>Join with us</small>
                    </div>
                    <div class="form-input">
                        <label>Email</label>
                        <input id="email" type="email" placeholder="Email" require>
                    </div>
                    <div class="form-input">
                            <label>Password</label>
                            <input id="password" type="password" placeholder="Password" require> 
                    </div>
                    <div class="form-input form-checkbox">
                        <input id="showpass" type="checkbox" name="" id="">
                        <label for="">Show password</label>
                    </div>
                    <div class="form-input text-center">
                        <label class="alert"></label>
                    </div>
                    <div class="form-input pwd_nxcqa">
                        <a href="<?=$url?>/forget_password.php">Forget password?</a>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <small>If you do not have an account, you should click here to <a class="text-link-light" href="register.php">register</a></small>
                </form>
            </div>
        </div>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="<?=$url?>/assets/js/module/login.js" type="module"></script>
</body>
</html>