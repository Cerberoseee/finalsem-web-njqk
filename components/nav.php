<?php
    function menuHTML(){
        ?>
        <div class="nav__menu-list p-1">                         
            <ul>
                <li id="close-menu">
                    <span class="nav__menu mr-h-5" title="Click to show the menu">
                        <i class="fa-solid fa-bars"></i>
                    </span>
                </li>
                <li>
                    <a href="#1234">
                        <span class="mr-h-5">
                        <i class="fa-solid fa-house"></i>
                    </span>
                    Home 
                    </a>
                </li>
                <li>
                    <a href="">
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
                    <a href="">
                        <span class="mr-h-5">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        Setting
                    </a>
                </li>
                <li>
                    <a href="">
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
        ?>
        <nav class="nav sticky-nav py-1">
            <div class="nav__group">
                <div class="nav__menu" title="Click to show the menu">
                    <img src="./assets/icons/menu.svg" alt="SVG Image">
                </div>
                <div class="nav__logo" title="JQKTube website">
                    <span>Logo website</span>
                </div>
            </div>
            <!-- Menu -->
            <?=menuHTML()?>
            <div class="nav__search">
                <span id="nav__search-icon" title="Click here to search video"><img src="./assets/icons/search.svg" alt="search icon"></span>
                <input class="nav_search-input" type="search" placeholder="Search..."/>
                <span id="nav__search-micro" title="Search with voice"><img src="./assets/icons/microphone.svg" alt="voice icon"></span>
            </div>
            <div class="nav__account">
                <div class="nav__notification" title="Notifications">
                    <img src="./assets/icons/noti.svg" alt="SVG Image">
                </div>
                <!-- <div class="nav__avatar" title="Your account management">
                    <img src="./assets/icons/Avatar.png" alt="SVG Image">
                </div> -->
                <div class="nav__account-access">
                    <a href="login.php" class="btn btn-primary">
                        <span><i class="fa-solid fa-right-to-bracket"></i></span>
                        Login</a>
                    <a href="register.php" class="btn btn-outline-primary">
                        <span><i class="fa-solid fa-user-plus"></i></span>
                        Register</a>
                </div>
                
            </div>
        </nav>
        <?php
    }
?>