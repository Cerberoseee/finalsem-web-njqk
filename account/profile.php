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
                        <img class="profile__avatar-img" src="" alt="">
                    </div>
                </div>
                <?php
                    if($isLogin){
                        ?>
                        <div class="col-6">
                            <div class="profile__feature float-right">
                                <a href="<?=$url?>account/profile.php?id=<?=$account["userId"]?>&type=edit" class="btn btn-outline-primary rounded">Edit profile</a>
                                <a href="<?=$url?>account/profile.php?id=<?=$account["userId"]?>&type=manage" class="btn btn-primary rounded">Manage videos</a>
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
                        <span>569 <span class="text-fade">Followers</span></span>
                        <span>69 <span class="text-fade">Videos</span></span>
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
                                    <h3>Your videos <i class="fa-solid fa-caret-right"></i></h3>
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
                </div>
                <div class="row">
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
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="profile__video-heading-tag">
                                    <h3>Created playlist <i class="fa-solid fa-caret-right"></i></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row profile__video-list">
                            <?=itemPlaylistHTML()?>
                            <?=itemPlaylistHTML()?>
                            <?=itemPlaylistHTML()?>
                            <?=itemPlaylistHTML()?>
                            <?=itemPlaylistHTML()?>
                            <?=itemPlaylistHTML()?>
                            <?=itemPlaylistHTML()?>
                            <?=itemPlaylistHTML()?>
                        </div>
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
                                    <p>
                                    Hello, I'm Ryo Yamada. I play a range of popular video games and music make content on those stuff. Maybe you like horror games, or funny games, or comedy sketches,
                                    or animations, or compilations, or reactions, or reviews, or challenges, or cryptic lore, or mind-crippling ennui, or stuff-that-is-guaranteed-to-probably-make-you-cry? 
                                    Whatever you're into I'm sure there's something for you down in the briny deep of my video page. So why not dive in? Enjoy my interesting yet crude music.
                                    The subject matter of the content on this channel is intended for audiences 13+ and in some cases 17+ . Viewer discretion is advised.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h3>Details</h3>
                                <ul class="profile__list-url">
                                    <li>
                                        <img class="mr-h-5" src="<?=$url?>/assets/icons/email.svg" alt="">
                                        <span class="pr-about__email">admin@gmail.com</span>
                                    </li>
                                    <li>
                                        <img class="mr-h-5" src="<?=$url?>/assets/icons/date.svg" alt="">
                                        <span class="pr-about__createAt">30 March 2002</span>
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
                                <span class="pr-about__gender">Female</span>
                            </li>
                            <li>
                                <img class="mr-h-5" src="<?=$url?>/assets/icons/Birthday.svg" alt="">
                                <span class="pr-about__day">30 March 2002</span>
                            </li>
                            <li>
                                <img class="mr-h-5" src="<?=$url?>/assets/icons/location.svg" alt="">
                                <span class="pr-about__location">Japan</span>
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