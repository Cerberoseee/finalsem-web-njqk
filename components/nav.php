<?php
    
    function menuHTML(){
        // Check login
        $isLogin = false;
        if(isset($_SESSION["account"])){
            $isLogin = true;
            $account = $_SESSION['account'];
        }
        $url = $_SESSION["url"];
        ?>
        <div class="nav__menu-list p-1">                         
            <ul>
                <li id="close-menu">
                    <span class="nav__menu mr-h-5" title="Click to show the menu">
                        <i class="fa-solid fa-bars"></i>
                    </span>
                </li>
                <li>
                    <a href="<?=$url?>">
                        <span class="mr-h-5">
                        <i class="fa-solid fa-house"></i>
                    </span>
                    Home 
                    </a>
                </li>
                <?php
                    if($isLogin){
                        ?>
                        <li id="menu-nav__notifi">
                            <a href="<?=$url?>/account/notification.php">
                                <span class="mr-h-5">
                                <i class="fa-solid fa-bell"></i>
                            </span>
                            Notification 
                            </a>
                        </li>
                        <li id="menu-nav__upload">
                            <a href="<?=$url?>/account/upload.php">
                                <span class="mr-h-5">
                                <i class="fa-solid fa-upload"></i>
                            </span>
                            Upload a video 
                            </a>
                        </li>
                        <li id="menu-nav__profile">
                            <a href="<?=$url?>/account/profile.php">
                                <span class="mr-h-5">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            Your Profile 
                            </a>
                        </li>
                        <li>
                            <a href="<?=$url?>/account/history.php">
                                <span class="mr-h-5">
                                    <i class="fa-solid fa-video"></i>
                                </span>
                                History
                            </a>
                        </li>
                        <li>
                            <a href="<?=$url?>/account/myvideo.php">
                                <span class="mr-h-5">
                                    <i class="fa-solid fa-house"></i>
                                </span>
                                Your videos
                            </a>
                        </li>
                        <li>
                            <a href="<?=$url?>/logout.php">
                                <span class="mr-h-5">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </span>
                                Log out
                            </a>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li id="menu-nav__login-btn">
                            <a href="<?=$url?>/login.php">
                                <span class="mr-h-5">
                                <i class="fa-solid fa-right-to-bracket"></i>
                            </span>
                            Login 
                            </a>
                        </li>
                        <li id="menu-nav__register-btn">
                            <a href="<?=$url?>/register.php">
                                <span class="mr-h-5">
                                <i class="fa-solid fa-user-plus"></i>
                            </span>
                            Register 
                            </a>
                        </li>
                        <?php
                    }
                ?> 
                <li id="category-show">
                    <span class="mr-h-5">
                        <i class="fa-brands fa-discourse"></i>
                    </span>
                    Explore
                    <span id="category-icon" class="float-right"><i class="fa-solid fa-caret-down"></i></span>
                </li>
                <ul id="category-list" class="pl-1 mt-h-5">
                        <li><a href="">
                            Music
                        </a></li>
                        <li><a href="">
                            Gaming
                        </a></li>
                        <li><a href="">
                            Comedy
                        </a></li>
                        <li><a href="">
                            Drama
                        </a></li>
                        <li><a href="">
                            Movie
                        </a></li>
                </ul>
                <?php
                    if($isLogin){
                        ?>
                        <li>
                            <a href="<?=$url?>/account/setting.php>">
                                <span class="mr-h-5">
                                    <i class="fa-solid fa-gear"></i>
                                </span>
                                Setting
                            </a>
                        </li>
                        <?php
                    }
                ?>
            </ul>
        </div>
        <?php
    }
    function navHTML(){
        // Check login
        $isLogin = false;
        if(isset($_SESSION["account"])){
            $isLogin = true;
            $account = $_SESSION['account'];
        }
        $url = getUrl();
        ?>
        <nav class="nav sticky-nav py-1">
            <div class="nav__group">
                <div class="nav__menu" title="Click to show the menu">
                    <img src="<?=$url?>/assets/icons/menu.svg" alt="SVG Image">
                </div>
                <div class="nav__logo" title="JQKTube website">
                    <span><a href="<?=$url?>">Logo website</a></span>
                </div>
            </div>
            <!-- Menu -->
            <?=menuHTML()?>
            <div class="nav__search">
                <span id="nav__search-icon" title="Click here to search video"><img src="<?=$url?>/assets/icons/search.svg" alt="search icon"></span>
                <input class="nav_search-input" type="search" placeholder="Search..."/>
                <div class="nav__search-list">
                    <ul>
                        <li><a href="<?=$url?>/search.php?keyword=">Một trời đã xa</a></li>
                        <li><a href="<?=$url?>/search.php?keyword=">Một trời đã xa</a></li>
                        <li><a href="<?=$url?>/search.php?keyword=">Một trời đã xa</a></li>
                        <li><a href="<?=$url?>/search.php?keyword=">Một trời đã xa</a></li>
                        <li><a href="<?=$url?>/search.php?keyword=">Một trời đã xa</a></li>
                    </ul>
                </div>
            </div>
            <div class="nav__account">
                <div class="nav__notification" title="Notifications">
                    <span class="nav__notification-icon">
                        <img src="<?=$url?>/assets/icons/noti.svg" alt="SVG Image">
                    </span>
                    <div class="nav__noti-list">
                        <ul>
                            <li class="text-fade">No any notifications</li>
                        </ul>
                    </div>
                </div>
                
                
                <?php
                    if($isLogin){
                        ?>
                        <div class="nav__avatar" title="Your account management">
                            <img id="nav__avatar-id" src="<?=$url?>/api/<?=$account["avatarPath"]?>" alt="SVG Image">
                            <div class="nav__profile-options">
                                <div class="profile-options__info mb-1">
                                    <img src="<?=$url?>/api/<?=$account["avatarPath"]?>" alt="SVG Image">
                                    <div class="profile-options__info-details ml-h-5">
                                        <h3  class="profile-options__info-name">Minh Kỳ</h3>
                                        <span  class="profile-options__info-username text-fade">@minhky0211</span>
                                    </div>
                                </div>
                                <hr class="hr-color">
                                <ul class="profile-options__list">
                                    <li>
                                        <a href="<?=$url?>/account/profile.php?id=<?=$account["userId"]?>" class="profile-options__item">
                                            <img src="<?=$url?>/assets/icons/Profile expand/Menu/Icon/Profile.svg" alt="">
                                            <span class="ml-h-5">Your channel</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>/account/manage-video.php" class="profile-options__item">
                                            <img src="<?=$url?>/assets/icons/Profile expand/Menu/Icon/managevideo.svg" alt="">
                                            <span class="ml-h-5">Manage video</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="profile-options__item">
                                            <img src="<?=$url?>/assets/icons/Profile expand/Menu/Icon/Darkmode.svg" alt="">
                                            <span class="ml-h-5">Dark mode</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>/account/setting.php" class="profile-options__item">
                                            <img src="<?=$url?>/assets/icons/Profile expand/Menu/Icon/Setting.svg" alt="">
                                            <span class="ml-h-5">Setting</span>
                                        </a>
                                    </li>
                                </ul>
                                <hr class="hr-color">
                                <ul class="profile-options__list">
                                    <li>
                                        <a href="<?=$url?>logout.php" class="profile-options__item">
                                            <img src="<?=$url?>/assets/icons/Profile expand/Menu/Icon/Log out.svg" alt="">
                                            <span class="ml-h-5">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- <a href="<?=$url?>/account/profile.php?id=<?=$account['userId']?>">
                            </a> -->
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="nav__account-access">
                            <a id="nav__login-btn" href="<?=$url?>/login.php" class="btn btn-primary">
                                <span><i class="fa-solid fa-right-to-bracket"></i></span>
                                Login</a>
                            <a id="nav__register-btn" href="<?=$url?>/register.php" class="btn btn-outline-primary">
                                <span><i class="fa-solid fa-user-plus"></i></span>
                                Register</a>
                        </div>
                        <?php
                    }
                ?>
                
            </div>
        </nav>
        <?php
    }
?>