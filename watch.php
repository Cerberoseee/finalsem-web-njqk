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
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="<?=$url?>/assets/js/module/getvideo.js" type="module"></script>
    <script src="<?=$url?>/assets/js/videoplayer.js"></script>
</body>
</html>