<?php
    require_once('layout.php');
    function menuHTML(){
        $url = $_SESSION["url"];
        ?>
        <div class="nav__menu-list p-1">                         
            <ul>
                <li id="close-menu">
                    <span class="nav__menu mr-h-5" title="Click to show the menu">
                        <i class="fa-solid fa-bars"></i>
                    </span>
                </li>
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
                <li>
                    <a href="<?=$url?>">
                        <span class="mr-h-5">
                        <i class="fa-solid fa-house"></i>
                    </span>
                    Home 
                    </a>
                </li>
                <li id="menu-nav__notifi">
                    <a href="<?=$url?>/account/notification.php">
                        <span class="mr-h-5">
                        <i class="fa-solid fa-bell"></i>
                    </span>
                    Notification 
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
                    <a href="">
                        <span class="mr-h-5">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        Your videos
                    </a>
                </li>
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
                            Music
                        </a></li>
                        <li><a href="">
                            Music
                        </a></li>
                        <li><a href="">
                            Music
                        </a></li>
                        <li><a href="">
                            Music
                        </a></li>
                </ul>
                <li>
                    <a href="<?=$url?>/account/setting.php">
                        <span class="mr-h-5">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        Setting
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
            </ul>
        </div>
        <?php
    }
    function navHTML(){
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
            </div>
            <div class="nav__account">
                <div class="nav__notification" title="Notifications">
                    <span class="nav__notification-icon">
                        <img src="<?=$url?>/assets/icons/noti.svg" alt="SVG Image">
                    </span>
                    <div class="nav__noti-list">
                        <ul>
                            <li>1. Bạn đã được 10 like</li>
                            <li>1. </li>
                            <li>1. </li>
                            <li>1. </li>
                        </ul>
                    </div>
                </div>
                
                <!-- <div class="nav__avatar" title="Your account management">
                    <img src="/assets/icons/Avatar.png" alt="SVG Image">
                </div> -->
                <div class="nav__account-access">
                    <a id="nav__login-btn" href="<?=$url?>/login.php" class="btn btn-primary">
                        <span><i class="fa-solid fa-right-to-bracket"></i></span>
                        Login</a>
                    <a id="nav__register-btn" href="<?=$url?>/register.php" class="btn btn-outline-primary">
                        <span><i class="fa-solid fa-user-plus"></i></span>
                        Register</a>
                </div>
                
            </div>
        </nav>
        <?php
    }
?>