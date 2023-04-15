<?php
    require_once('../components/layout.php');
    $url = $_SESSION["url"];
    $colPC = 2;
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
                        <img src="<?=$url?>/assets/imgs/avatar-meo-cute-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="profile__feature float-right">
                        <a href="<?=$url?>account/profile.php?type=edit" class="btn btn-outline-primary rounded">Edit profile</a>
                        <a href="<?=$url?>account/profile.php?type=manage" class="btn btn-primary rounded">Manage videos</a>
                    </div>
                </div>
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
                                <li class="profile-filter-item active">Home</li>
                                <li class="profile-filter-item">Playlist</li>
                                <li class="profile-filter-item">Liked videos</li>
                                <li class="profile-filter-item">Your videos</li>
                                <li class="profile-filter-item">About</li>
                            </ul>
                        </div>
                        <div class="profile__search">
                            <input class="profile__search-input" type="search" placeholder="Search here">
                        </div>
                    </div>
                </div>
            </div>
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
                        <?=itemVideoHTML($colPC)?>
                        <?=itemVideoHTML($colPC)?>
                        <?=itemVideoHTML($colPC)?>
                        <?=itemVideoHTML($colPC)?>
                        <?=itemVideoHTML($colPC)?>
                        <?=itemVideoHTML($colPC)?>
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
                        <?=itemVideoHTML($colPC)?>
                        <?=itemVideoHTML($colPC)?>
                        <?=itemVideoHTML($colPC)?>
                        <?=itemVideoHTML($colPC)?>
                        <?=itemVideoHTML($colPC)?>
                        <?=itemVideoHTML($colPC)?>
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
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
</body>
</html>