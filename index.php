<?php
    require_once('./components/layout.php');
    $url = $_SESSION["url"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>Home <?=$web_name?></title>
</head>
<body>
    <!-- Navigation -->
    <?=nav()?>

    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <h3>TRENDING</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?=carouselHTML()?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="profile__video-heading-tag">
                            <h3>Recommended <i class="fa-solid fa-caret-right"></i></h3>
                        </div>
                    </div>
                </div>
                <div class="row profile__video-list profile__video-list--recommend"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="profile__video-heading-tag">
                            <h3>Others <i class="fa-solid fa-caret-right"></i></h3>
                        </div>
                    </div>
                </div>
                <div class="row profile__video-list profile__video-list--all"></div>
            </div>
        </div>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="<?=$url?>/assets/js/module/all-video.js" type="module"></script>
</body>
</html>

