<?php
    require_once('./components/layout.php');
    if(isset($_SESSION["account"])){
        unset($_SESSION["account"]);
    }
    $url = $_SESSION["url"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>Layout</title>
</head>
<body>
    <!-- Navigation -->
    <?=nav()?>

    <!-- Container -->
    <div class="container mt-4"> 
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="<?=$url?>/assets/js/module/logout.js" type="module"></script>
</body>
</html>