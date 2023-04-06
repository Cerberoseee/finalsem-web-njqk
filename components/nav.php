<?php
    function navHTML(){
        ?>
        <nav class="nav sticky-nav">
            <div class="nav__group">
                <div class="nav__menu" title="Click to show the menu">
                    <img src="./assets/icons/menu.svg" alt="SVG Image">
                </div>
                <div class="nav__logo" title="JQKTube website">
                    <span>Logo website</span>
                </div>
            </div>
            <div class="nav__search">
                <span id="nav__search-icon" title="Click here to search video"><img src="./assets/icons/search.svg" alt="search icon"></span>
                <input class="nav_search-input" type="search" placeholder="Search..."/>
                <span id="nav__search-micro" title="Search with voice"><img src="./assets/icons/microphone.svg" alt="voice icon"></span>
            </div>
            <div class="nav__account">
                <div class="nav__notification" title="Notifications">
                    <img src="./assets/icons/noti.svg" alt="SVG Image">
                </div>
                <div class="nav__avatar" title="Your account management">
                    <img src="./assets/icons/Avatar.png" alt="SVG Image">
                </div>
            </div>
        </nav>
        <?php
    }
?>