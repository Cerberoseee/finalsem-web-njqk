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
            <div class="register-form col-4 float-right">
                <form method="post">
                    <div class="form-header mt-2">
                        <legend>JQK WIBUTAPCODE</legend>
                        <small>Join with us</small>
                    </div>
                    <div class="form-input-group">
                        <div class="form-input">
                            <label>Firstname</label>
                            <input type="text" placeholder="Firstname">
                            <small class="alert-error">Please enter your username</small>
                        </div>
                        <div class="form-input">
                            <label>Lastname</label>
                            <input type="text" placeholder="Lastname">
                        </div>
                    </div>
                    <div class="form-input">
                        <label>Username</label>
                        <input type="text" placeholder="Enter username">
                    </div>
                    <div class="form-input">
                        <label>Email</label>
                        <input type="email" placeholder="Email">
                    </div>
                    <div class="form-input">
                        <label>Phone</label>
                        <input type="number" placeholder="Phone number">
                    </div>
                    <div class="form-input-group">
                        <div class="form-input">
                            <label>Password</label>
                            <input type="password" placeholder="Password">
                        </div>
                        <div class="form-input">
                            <label>Re-enter password</label>
                            <input type="text" placeholder="Password confirm">
                        </div>
                    </div>
                    <div class="form-input form-checkbox">
                        <input type="checkbox" name="" id="">
                        <label for="">Show password</label>
                    </div>
                    
                    <div class="form-input">
                        <label>Date of birth</label>
                        <div class="form-input-group input-select-group">
                            <select class="input-select" name="" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                            <select class="input-select" name="" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                            <select class="input-select" name="" id="">
                            <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-input">
                        <label for="">Gender</label>
                        <div class="input-radio-group">
                            <div class="input-group">
                                <input type="radio" name="gender"/>
                                <label for="">Male</label>
                            </div>
                            <div class="input-group">
                                <input type="radio" name="gender"/>
                                <label for="">Female</label>
                            </div>
                            <div class="input-group">
                                <input type="radio" name="gender"/>
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
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
</body>
</html>