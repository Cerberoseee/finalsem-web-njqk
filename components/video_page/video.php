<?php
    function videoHTML(){
        $videoId = isset($_GET["video"]) ? $_GET["video"] : "";
        $url = $_SESSION["url"];
        ?>
        <!-- Video -->
        <div class="video__container">
            <div class="content-video">
                <div class="video-thumbnails">
                    <img id="thumb" src="<?=$url?>/uploads/videos/<?=$videoId?>/thumbnail.jpg" alt="">
                </div>
                <video id="player">
                    <source src="<?=$url?>/uploads/videos/<?=$videoId?>/video.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <?php
    }
?>