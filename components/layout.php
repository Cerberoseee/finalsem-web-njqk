<?php
    require_once('nav.php');
    require_once('scripts.php');
    require_once('header.php');
    require_once('video-page.php');
    require_once('video_item/video_item.php');
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

    // template video
    function videoTemplate(){
        streamTemplate();
    }

    // item in list of videos
    function itemVideoHTML(){
        videoItem_List();
    }
    // item playlist of videos
    function itemPlaylistHTML(){
        videoItem_Playlist();
    }
?>