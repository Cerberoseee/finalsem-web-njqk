<?php
    require_once('video_page/video.php');
    require_once('video_page/recommends.php');
    require_once('video_page/description.php');
    require_once('video_page/comments.php');
    function streamTemplate(){
        // Video
        videoHTML();
        // recommending videos
        recommendsHTML();
        // the desciption of the video
        descriptionHTML();
        // comments of a video
        commentsHTML();
    }
?>