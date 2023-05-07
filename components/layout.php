<?php
    require_once('nav.php');
    require_once('scripts.php');
    require_once('header.php');
    require_once('video-page.php');
    require_once('video_item/video_item.php');
    require_once('carousel/carousel.php');
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

    // Slider for trending video
    function carouselHTML(){
        carousel();
    }
    // Get the url of server
    session_start();
    function getUrl(){
        $sv_name = $_SERVER['SERVER_NAME'];
        $sv_protocol = '';
        if(strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https') {
            $sv_protocol = "https";
        }
        else {
            $sv_protocol = "http";
        }
        $sv_port = $_SERVER['SERVER_PORT'];
        $url = "$sv_protocol://$sv_name:$sv_port/";

        return $url;
    }
    $_SESSION["url"] = getUrl();

    $web_name = " | WIBUTAP";
?>