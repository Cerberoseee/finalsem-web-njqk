<?php
    require_once('./components/layout.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>Register | JQKTube</title>
</head>
<body>
    <!-- Container -->
    <div class="container register__container p-5">
        <div id="register__container-bg"></div>
        <div class="row">
            <div class="register-form col-5 col-md-6 float-right">
                <form id="registerForm">
                    <div class="form-header mt-2 text-center">
                        <legend>JQK WIBUTAPCODE</legend>
                        <small>Join with us</small>
                    </div>
                    <div class="form-input-group">
                        <div class="form-input">
                            <label>Firstname</label>
                            <input id="firstname" type="text" name="firstname" placeholder="Firstname">
                            <small class="alert-error"></small>
                        </div>
                        <div class="form-input">
                            <label>Lastname</label>
                            <input id="lastname" type="text" name="lastname" placeholder="Lastname">
                            <small class="alert-error"></small>
                        </div>
                    </div>
                    <div class="form-input">
                        <label>Username</label>
                        <input id="username" type="text" name="username" placeholder="Enter username">
                        <small class="alert-error"></small>
                    </div>
                    <div class="form-input">
                        <label>Email</label>
                        <input id="email" type="email" name="email" placeholder="Email">
                        <small class="alert-error"></small>
                    </div>
                    <div class="form-input">
                        <label>Phone</label>
                        <input id="phone" type="number" name="phone" placeholder="Phone number">
                        <small class="alert-error"></small>
                    </div>
                    <div class="form-input-group">
                        <div class="form-input">
                            <label>Password</label>
                            <input id="password" type="password" name="password" placeholder="Password">
                            <small class="alert-error"></small>
                        </div>
                        <div class="form-input">
                            <label>Re-enter password</label>
                            <input name="re_password" id="re_password" type="password" placeholder="Password confirm">
                            <small class="alert-error"></small>
                        </div>
                    </div>
                    <div class="form-input form-checkbox">
                        <input type="checkbox" name="" id="showpass">
                        <label for="">Show password</label>
                    </div>
                    
                    <div class="form-input">
                        <label>Date of birth</label>
                        <div class="form-input-group input-select-group">
                            <select class="input-select" name="day" id="days"></select>
                            <select class="input-select" name="month" id="months"></select>
                            <select class="input-select" name="year" id="years"></select>
                        </div>
                    </div>
                    <div class="form-input">
                        <label for="">Gender</label>
                        <div class="input-radio-group">
                            <div class="input-group">
                                <input id="male" type="radio" name="gender" value="male"/>
                                <label for="">Male</label>
                            </div>
                            <div class="input-group">
                                <input id="female" type="radio" name="gender" value="female"/>
                                <label for="">Female</label>
                            </div>
                            <div class="input-group">
                                <input id="other" type="radio" name="gender" value="other"/>
                                <label for="">Other</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <button type="reset" class="btn btn-outline-primary mb-1">Reset</button>
                    <br/>
                    <small>If you have an account, you should click here to <a class="text-link-light" href="login.php">login</a></small>
                </form>
            </div>
        </div>
        <div class="register__loading text-center">
            <img src="./assets/imgs/amalie-steiness.gif" alt="">
        </div>
        <div class="register__success text-center mt-5">
            <h3 class="register__success-title">Congratualion! ! ! </h3>
            <p>You are become a member of JQKTube</p>
            <span>Please check your email to verify your account!</span>
            <span class="d-block register__success-icon"><i class="fa-solid fa-envelope"></i></span>
        </div>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="./assets/js/module/register.js" type="module"></script>
</body>
</html>