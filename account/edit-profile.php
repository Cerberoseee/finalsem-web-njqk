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
    <title>Profile | JQKTube</title>
</head>
<body>
    <!-- Navigation -->
    <?=nav()?>

    <!-- Container -->
    <div class="container-fluid">
        <div class="profile__background">
            <img src="<?=$url?>/assets/imgs/bg-profile.jpg" alt="">
        </div>
        <div class="container container__profile">
            <div class="row">
                <div class="col-6">
                    <div class="profile__avatar">
                        <img src="<?=$url?>/api/<?=$account["avatarPath"]?>" class="profile__avatar-img" src="" alt="">
                    </div>
                </div>
                <?php
                    if($isLogin){
                        ?>
                        <div class="col-6">
                            <div class="profile__feature float-right">
                                <a href="<?=$url?>account/profile.php?id=<?=$account["userId"]?>&type=edit" class="btn btn-outline-primary rounded">Cancel</a>
                                <a href="<?=$url?>account/profile.php?id=<?=$account["userId"]?>&type=manage" class="btn btn-primary rounded">Save changes</a>
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
                            <span class="profile__info-input profile__name" contenteditable>Shigeo Tokuda</span>
                        </div>
                        <div class="profile__info-group">
                            <div class="d-block" for="">User name</div>
                            <span class="profile__info-input profile__tag" contenteditable>@tokuda.jav</span>
                        </div>
                        <div class="profile__info-group">
                            <div class="d-block" for="">Bio</div>
                            <span class="profile__info-input profile__bio" contenteditable>Actor</span>
                        </div>
                        <div class="profile__info-group">
                            <div class="d-block" for="">About</div>
                            <span class="profile__info-input profile__about" contenteditable>
                            Hello, I'm Ryo Yamada. I play a range of popular video games and music make content on those stuff. Maybe you like horror games, or funny games, or comedy sketches, or animations, or compilations, or reactions, or reviews, or challenges, or cryptic lore, or mind-crippling ennui, or stuff-that-is-guaranteed-to-probably-make-you-cry? Whatever you're into I'm sure there's something for you down in the briny deep of my video page. So why not dive in?
Enjoy my interesting yet crude music.
The subject matter of the content on this channel is intended for audiences 13+ and in some cases 17+ . Viewer discretion is advised.
                            </span>
                        </div>
                        <div class="profile__info-group">
                            <div class="d-block" for="">Email</div>
                            <span class="profile__info-input profile__bio" contenteditable>YamdaryoKessoku@gmail.com</span>
                        </div>
                        <div class="form-input profile__info-gender">
                            <label for="">Gender</label>
                            <div class="input-radio-group ml-h-5">
                                <div class="input-group">
                                    <input id="male" type="radio" name="gender" value="male" checked/>
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
                            <span class="profile__info-input profile__location" contenteditable>Japan</span>
                        </div>
                    </div>
                </div>
            </div
        </div>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
</body>
</html>