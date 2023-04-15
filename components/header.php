<?php
    function headerHTML(){
        $url = $_SESSION["url"];
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="<?=$url?>/assets/css/base.css">
        <link rel="stylesheet" href="<?=$url?>/assets/css/main.css">
        <link rel="stylesheet" href="<?=$url?>/assets/fontawesome/css/fontawesome.css"/>
        <link rel="stylesheet" href="<?=$url?>/assets/fontawesome/css/all.min.css"/>
        <link rel="stylesheet" href="<?=$url?>/assets/css/videoplayer.css">
        <link rel="stylesheet" href="<?=$url?>/assets/css/responesive.css">
        <?php
    }
?>