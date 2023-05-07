<?php
    require_once('../components/layout.php');
    $url = $_SESSION["url"];
    // Check login
    $isLogin = false;
    if(isset($_SESSION["account"])){
        $isLogin = true;
        $account = $_SESSION['account'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>Edit Profile | <?=$account["channelName"].$web_name?></title>
</head>
<body>
    <!-- Navigation -->
    <?=nav()?>

    <!-- Container -->
    <div class="container-fluid">
        <div class="profile__background">
            <div id="background-change" class="profile__avatar-replace">
                <span><i class="fa-solid fa-camera-retro"></i></span>
            </div>
            <img id="profile__background--img" src="<?=$url.$account["backgroundPath"]?>" alt="">
        </div>
        <div class="container container__profile">
            <div class="row">
                <div class="col-6">
                    <div class="profile__avatar">
                        <div id="avatar-change" class="profile__avatar-replace">
                            <span><i class="fa-solid fa-camera-retro"></i></span>
                        </div>
                        <img src="<?=$url.$account["avatarPath"]?>" class="profile__avatar-img" src="" alt="">
                    </div>
                </div>
                <?php
                    if($isLogin){
                        ?>
                        <div class="col-6">
                            <div class="profile__feature float-right">
                                <a href="<?=$url?>account/profile.php?id=<?=$account["userId"]?>" class="btn btn-outline-primary rounded">Cancel</a>
                                <a id="save" class="btn btn-primary rounded">Save changes</a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
                <div class="row">
                    <div class="col-12">
                        <hr class="mt-1 hr-color">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="profile__info">
                        <div class="profile__info-group">
                            <div class="d-block" for="">Profile name</div>
                            <span id="profilename" class="profile__info-input profile__info-input--limited profile__name" contenteditable><?=$account["channelName"]?></span>
                        </div>
                        <div class="profile__info-group">
                            <div class="d-block" for="">User name</div>
                            <span class="profile__info-input profile__info-input--limited profile__tag" contenteditable><?=$account["username"]?></span>
                        </div>
                        <div class="profile__info-group">
                            <div class="d-block" for="">Bio</div>
                            <span class="profile__info-input profile__info-input--limited profile__bio" contenteditable><?=$account["bio"]?></span>
                        </div>
                        <div class="profile__info-group">
                            <div class="d-block" for="">About</div>
                            <span class="profile__info-input profile__info-input--limited profile__about" contenteditable><?=$account["about"]?></span>
                        </div>
                        <div class="profile__info-group">
                            <div class="d-block" for="">Email</div>
                            <span class="profile__info-input profile__email" contenteditable><?=$account["email"]?></span>
                        </div>
                        <div class="form-input profile__info-gender">
                            <label for="">Gender</label>
                            <div class="input-radio-group ml-h-5">
                                <div class="input-group">
                                    <input id="male" type="radio" name="gender" value="male" <?=$account["gender"] == "male"? "checked": "";?>/>
                                    <label for="">Male</label>
                                </div>
                                <div class="input-group">
                                    <input id="female" type="radio" name="gender" value="female" <?=$account["gender"] == "female"? "checked": "";?>/>
                                    <label for="">Female</label>
                                </div>
                                <div class="input-group">
                                    <input id="other" type="radio" name="gender" value="other"<?=$account["gender"] == "other"? "checked": "";?>/>
                                    <label for="">Other</label>
                                </div>
                            </div>
                        </div> 
                        <div class="form-input profile__info-dob">
                            <label>Date of birth</label>
                            <div class="form-input-group input-select-group">
                                <select class="input-select" name="day" id="days"></select>
                                <select class="input-select" name="month" id="months"></select>
                                <select class="input-select" name="year" id="years"></select>
                            </div>
                        </div>
                        <div class="profile__info-group">
                            <div class="d-block" for="">Location</div>
                            <span class="profile__info-input profile__location" contenteditable><?=$account["location"]?></span>
                        </div>
                    </div>
                </div>
            </div
        </div>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="<?=$url?>/assets/js/module/edit-profile.js" type="module"></script>
</body>
</html>