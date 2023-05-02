<?php
    function videoHTML(){
        $videoId = isset($_GET["video"]) ? $_GET["video"] : "";
        $url = $_SESSION["url"];
        ?>
        <!-- Video -->
        <div class="video__container">
            <div class="content-video">
                <div class="video-thumbnails">
                    <img id="thumb" src="" alt="">
                </div>
                <video id="player">
                    <source id="player_src" src="" type="video/mp4">
                </video>
            </div>
        </div>
        <?php
    }
?>