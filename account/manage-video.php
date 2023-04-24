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
        <div class="row">
            <div class="profile__background">
                <img src="<?=$url?>/assets/imgs/bg-profile.jpg" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="container container__profile container__profile--manage">
                    <div class="row">
                        <div class="col-12">
                            <div class="profile__avatar">
                                <img src="<?=$url?>/api/<?=$account["avatarPath"]?>" class="profile__avatar-img" src="" alt="">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr class="mt-1 hr-color">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table__videos mx-auto">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="" id=""></th>
                            <th><i class="fa-solid fa-ellipsis-vertical"></i></th>
                            <th>
                            <div class="profile__search">
                                <input class="profile__search-input" type="search" placeholder="Search here">
                            </div>
                            </th>
                            <th>Visibility</th>
                            <th>Upload date <i class="fa-solid fa-up"></i></th>
                            <th>Views</th>
                            <th>Comments</th>
                            <th>Likes/Dislikes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <i class="fa-regular fa-star"></i>
                            </td>
                            <td>
                                <div class="cell__video">
                                    <div class="cell__video-img">
                                        <img src="<?=$url?>/assets/imgs/bigboob.jpg" alt="">
                                    </div>
                                    <div class="cell__video-info ml-h-5">
                                        <span>I can't see shit help!!</span>
                                        <div class="cell__video-functions">
                                            <ul>
                                                <li><i class="fa-solid fa-pen"></i></li>
                                                <li><i class="fa-solid fa-share"></i></li>
                                                <li><i class="fa-solid fa-download"></i></li>
                                                <li><i class="fa-solid fa-trash"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>Public <i class="fa-solid fa-caret-down"></i></td>
                            <td>10:41 PM</td>
                            <td>10, 192 <i class="fa-solid fa-eye"></i></td>
                            <td>124</td>
                            <td>12,346 - 39</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <i class="fa-regular fa-star"></i>
                            </td>
                            <td>
                                <div class="cell__video">
                                    <div class="cell__video-img">
                                        <img src="<?=$url?>/assets/imgs/bigboob.jpg" alt="">
                                    </div>
                                    <div class="cell__video-info ml-h-5">
                                        <span>I can't see shit help!!</span>
                                        <div class="cell__video-functions">
                                            <ul>
                                                <li><i class="fa-solid fa-pen"></i></li>
                                                <li><i class="fa-solid fa-share"></i></li>
                                                <li><i class="fa-solid fa-download"></i></li>
                                                <li><i class="fa-solid fa-trash"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>Public <i class="fa-solid fa-caret-down"></i></td>
                            <td>10:41 PM</td>
                            <td>10, 192 <i class="fa-solid fa-eye"></i></td>
                            <td>124</td>
                            <td>12,346 - 39</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                            <td>
                                <i class="fa-regular fa-star"></i>
                            </td>
                            <td>
                                <div class="cell__video">
                                    <div class="cell__video-img">
                                        <img src="<?=$url?>/assets/imgs/bigboob.jpg" alt="">
                                    </div>
                                    <div class="cell__video-info ml-h-5">
                                        <span>I can't see shit help!!</span>
                                        <div class="cell__video-functions">
                                            <ul>
                                                <li><i class="fa-solid fa-pen"></i></li>
                                                <li><i class="fa-solid fa-share"></i></li>
                                                <li><i class="fa-solid fa-download"></i></li>
                                                <li><i class="fa-solid fa-trash"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>Public <i class="fa-solid fa-caret-down"></i></td>
                            <td>10:41 PM</td>
                            <td>10, 192 <i class="fa-solid fa-eye"></i></td>
                            <td>124</td>
                            <td>12,346 - 39</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
</body>
</html>