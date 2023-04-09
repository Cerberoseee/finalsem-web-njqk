<?php
    require_once('./components/layout.php');

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
            <img src="./assets/imgs/bg-profile.jpg" alt="">
        </div>
        <div class="container container__profile">
            <div class="row">
                <div class="col-6">
                    <div class="profile__avatar">
                        <img src="./assets/imgs/avatar-meo-cute-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="profile__feature float-right">
                        <button class="btn btn-outline-primary rounded">Edit profile</button>
                        <button class="btn btn-primary rounded">Manage videos</button>
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
                        <ul class="profile-filter-list">
                            <li class="profile-filter-item active">Home</li>
                            <li class="profile-filter-item">Home</li>
                            <li class="profile-filter-item">Home</li>
                            <li class="profile-filter-item">Home</li>
                            <li class="profile-filter-item">Home</li>
                        </ul>
                        <div class="profile__search">
                            <input type="search" placeholder="Search here">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
</body>
</html>