<?php
    require_once('./components/layout.php');
    $url = $_SESSION['url'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>Video Page</title>
</head>
<body>
    <!-- Navigation -->
    <?=nav()?>

    <!-- Container -->
    <div class="container video-container mt-4">
        <?=videoTemplate()?>  
    </div>
    <div class="share__popup">
        <span class="share__popup-exit"><i class="fa-solid fa-circle-xmark"></i></span>
        <h3>The link of this video</h3>
        <input class="share__popup--src" type="text">
        <button class="btn btn-primary" id="copy-link">Copy</button>
    </div>
    <div class="playlist__popup">
        <span class="playlist__popup-exit"><i class="fa-solid fa-circle-xmark"></i></span>
        <h4>Save to</h4>
        <ul class="more__options-list"> 
            <li id="playlist">Playlist1</li>
            <li id="playlist">Playlist2</li>
        </ul>
        <button class="btn btn-primary" id="save-playlist">Save</button>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="<?=$url?>/assets/js/module/getvideo.js" type="module"></script>
    <script src="<?=$url?>/assets/js/videoplayer.js"></script>
</body>
</html>