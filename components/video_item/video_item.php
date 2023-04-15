<?php
    function videoItem_List($colPC){
        $url = $_SESSION["url"];
        ?>
        <div class="col-<?=$colPC?> col-md-3 col-sm-6">
            <a href="#345">
                <div class="profile__video-item">
                    <div class="pr-video-item__img">
                        <img src="<?=$url?>/assets/imgs/bigboob.jpg" alt="">
                    </div>
                    <div class="pr-video-item__content">
                        <h3 class="pr-video-item__content-title">Why you should and shouldn't live in Japan</h3>
                        <div class="pr-video-item__content-info">
                            <img src="<?=$url?>/assets/imgs/avatar-meo-cute-1.jpg" alt="">
                            <div class="pr-video-item__content-details ml-h-5">
                                <span>Bocchi</span>
                                <span class="pr-video-item__content-more text-fade">April 1, 2012 • 14k <i class="fa-solid fa-eye text-fade"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }

    function videoItem_Playlist(){
        $url = $_SESSION["url"];
        ?>
        <div class="col-2 col-md-3 col-sm-6">
            <a href="#123">
                <div class="profile__video-playlist">
                    <div class="pr-video-item__img">
                        <div class="pr-video-item__img-banner">
                            <div class="img-banner__info">
                                <h3 class="img-banner__info-count">12</h3>
                                <span>videos</span>
                                <span><img src="<?=$url?>/assets/icons/playlist.svg" alt=""></span>
                                <span class="text-fade">Public</span>
                            </div>
                        </div>
                        <img src="<?=$url?>/assets/imgs/modern-tokyo-street-background.jpg" alt="">
                    </div>
                    <div class="pr-video-item__content">
                        <h3 class="pr-video-item__content-title">Why you should and shouldn't live in Japan</h3>
                        <span class="pr-video-item__content-more text-fade">April 1, 2012 • 14k <i class="fa-solid fa-eye text-fade"></i></span>
                        <span class="pr-video-item__content-more text-fade d-block">View full playlist</span>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
?>