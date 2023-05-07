<?php
    require_once('../components/layout.php');
    $url = $_SESSION["url"];
    // Check login
    $isLogin = false;
    if(isset($_SESSION["account"])){
        $isLogin = true;
        $account = $_SESSION['account'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>My videos | <?=$account["channelName"].$web_name?></title>
</head>
<body>
    <!-- Navigation -->
    <?=nav()?>

    <!-- Container -->
    <div class="container mt-3">
        <div class="row profile__video-list myvideo__video-list" ></div>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="<?=$url?>/assets/js/module/my-video.js" type="module"></script>
</body>
</html>