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
            <img id="profile__background--img" src="<?=$url?>" alt="">
        </div>
        <div class="container container__profile">
            <div class="row">
                <div class="col-6">
                    <div class="profile__avatar">
                        <img class="profile__avatar-img" src="" alt="">
                    </div>
                </div>
                <?php
                    if($isLogin && $_GET['id'] === $account['userId']){
                        ?>
                        <div class="col-6">
                            <div class="profile__feature float-right">
                                <a href="<?=$url?>account/edit-profile.php" class="btn btn-outline-primary rounded">Edit profile</a>
                                <a href="<?=$url?>account/manage-video.php" class="btn btn-primary rounded">Manage videos</a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="profile__info">
                        <div class="profile__name">Shigeo Tokuda</div>
                        <div class="profile__tag">@tokuda.jav</div>
                        <div class="profile__bio mt-1">Actor</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="profile__figures">
                        <span id="profile__figures--followers">569 <span class="text-fade">Followers</span></span>
                        <span><span id="profile__figures--videos">69</span> <span class="text-fade">Videos</span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="profile__filter">
                        <div class="profile__filter-cate">
                            <ul class="profile-filter-list">
                                <li id="profile_home" class="profile-filter-item active">Home</li>
                                <li id="profile_playlist" class="profile-filter-item">Playlist</li>
                                <li id="profile_liked" class="profile-filter-item">Liked videos</li>
                                <li id="profile_videos" class="profile-filter-item">Your videos</li>
                                <li id="profile_about" class="profile-filter-item">About</li>
                            </ul>
                        </div>
                        <div class="profile__search">
                            <input class="profile__search-input" type="search" placeholder="Search here">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Home -->
            <div class="container profile__home">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="profile__video-heading-tag">
                                    <h3>My videos <i class="fa-solid fa-caret-right"></i></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row profile__video-list profile__video-list--user"></div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="profile__video-heading-tag">
                                    <h3>Liked videos <i class="fa-solid fa-caret-right"></i></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row profile__video-list">
                            <?=itemVideoHTML()?>
                            <?=itemVideoHTML()?>
                            <?=itemVideoHTML()?>
                            <?=itemVideoHTML()?>
                            <?=itemVideoHTML()?>
                            <?=itemVideoHTML()?>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="profile__video-heading-tag">
                                    <h3>Created playlist <i class="fa-solid fa-caret-right"></i></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row profile__video-list profile__video-list--playlist"></div>
                    </div>
                </div>
            </div>
            <!-- Playlist -->
            <div class="container profile__playlist">

            </div>
            <div class="container profile__liked">

            </div>
            <!-- Your videos -->
            <div class="container profile__videos">

            </div>
            <!-- About -->
            <div class="container profile__about">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-12">
                                <h3>About</h3>
                                <div class="pr-about__content">
                                    <p><?=$account["about"]?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h3>Details</h3>
                                <ul class="profile__list-url">
                                    <li>
                                        <img class="mr-h-5" src="<?=$url?>/assets/icons/email.svg" alt="">
                                        <span class="pr-about__email"><?=$account["email"]?></span>
                                    </li>
                                    <li>
                                        <img class="mr-h-5" src="<?=$url?>/assets/icons/date.svg" alt="">
                                        <span class="pr-about__createAt"><?=$account["dateCreated"]?></span>
                                    </li>
                                    <li>
                                        <img class="mr-h-5" src="<?=$url?>/assets/icons/Link.svg" alt="">
                                        <span class="pr-about__link"><a href="https://www.pornhub.com">pornhub.com</a></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h3>Social media</h3>
                                <ul class="profile__list-url">
                                    <li>
                                        <img class="mr-h-5" src="<?=$url?>/assets/icons/Facebook.svg" alt="">
                                        <span>Twitter</span>
                                    </li>
                                    <li>
                                        <img class="mr-h-5" src="<?=$url?>/assets/icons/Twitter.svg" alt="">
                                        <span>Facebook</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <h3>Infomation</h3>
                        <ul class="profile__list-url">
                            <li>
                                <img class="mr-h-5" src="<?=$url?>/assets/icons/gender.svg" alt="">
                                <span class="pr-about__gender"><?=$account["gender"]?></span>
                            </li>
                            <li>
                                <img class="mr-h-5" src="<?=$url?>/assets/icons/Birthday.svg" alt="">
                                <span class="pr-about__day"><?=$account["dateOfBirth"]?></span>
                            </li>
                            <li>
                                <img class="mr-h-5" src="<?=$url?>/assets/icons/location.svg" alt="">
                                <span class="pr-about__location"><?=$account["location"]?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Loading scripts -->
    <script src="<?=$url?>/assets/js/module/get-profile.js" type="module"></script>
    <?=scripts()?>
</body>
</html>