<?php
    require_once('./components/layout.php');
    $url = $_SESSION["url"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>Search <?=$web_name?></title>
</head>
<body>
    <!-- Navigation -->
    <?=nav()?>
    <!-- Container -->
    <div class="container mt-3 search__video-list"></div>
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="<?=$url?>/assets/js/module/search.js" type="module"></script>
</body>
</html>