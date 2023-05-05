<?php
    function videoItem(){
        $url = $_SESSION["url"];
        ?>
        <div class="video__list-item my-1">
            <div class="video__thumb">
                <span class="video__thumb-timer">00:07</span>
                <img src="<?=$url?>/assets/icons/Rectangle14.png" alt="">
            </div>
            <div class="video__contents ">
                <div class="video__heading">I can’t see shit please help</div>
                <div class="video__details">
                    <span class="mr-h-5">April 1, 2012 • 14k</span>
                </div>
                <div class="video__author">
                    <span class="video__author-avt"><img src="<?=$url?>/assets/icons/sonavt.png" alt=""></span>
                    <span class="video__author-name">Son ga</span>
                </div>
            </div>
        </div>
        <?php
    }

    //Main fucntion
    function recommendsHTML(){
        $url = $_SESSION["url"];
        ?>
        <!-- Video recommends -->
        <div class="video__recommends">
            <div class="video__recommends-tab">
                <button  id="recommened__tab" class="btn btn-second recommends__related unround-b">Recommend</button>
                <button id="top-views__tab" class="btn btn-second recommends__views unround-b">Top views</button>
            </div>
            <div class="video__recommends-list"></div>
        </div>
        <?php
    }
?>