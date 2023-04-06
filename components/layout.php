<?php
    require_once('nav.php');
    require_once('scripts.php');
    require_once('header.php');
    require_once('video-page.php');
    // Header template
    function head(){
        headerHTML();
    }
    // Navigation template
    function nav(){
        navHTML();
    }
    // Scripting url
    function scripts(){
        scriptsHTML();
    }

    function videoTemplate(){
        streamTemplate();
    }
?>