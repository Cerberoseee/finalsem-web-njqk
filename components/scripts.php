<?php
    function scriptsHTML(){
        $url = $_SESSION["url"];
        ?>
        <script src="<?=$url?>/assets/js/view.js" type="module"></script>
        <?php
    }
?>