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
        <label for="">Add a new playlist</label>
        <div class="playlist__create mt-h-5 mb-1">
            <input id="playlist-text" type="text" class="input input-primary mr-h-5">
            <button class="btn btn-primary" id="create-playlist">Create</button>
        </div>
        <h4>Save to</h4>

        <ul class="more__options-list mt-h-5 playlist__list"></ul>
        <button class="btn btn-primary mt-1" id="save-playlist">Save</button>
        <span class="alert d-block text-center" id="alert-add-platlist"></span>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="<?=$url?>/assets/js/module/getvideo.js" type="module"></script>
    <script src="<?=$url?>/assets/js/videoplayer.js"></script>
</body>
</html>