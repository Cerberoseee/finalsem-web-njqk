<?php
    function videoHTML(){
        $url = $_SESSION["url"];
        ?>
        <!-- Video -->
        <div class="video__container">
            <div class="content-video">
                <div class="video-thumbnails">
                    <img id="thumb" src="<?=$url?>/uploads/thumbs/6418286203.jpg" alt="">
                </div>
                <video id="player">
                    <source src="<?=$url?>/uploads/641716.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <?php
    }
?>