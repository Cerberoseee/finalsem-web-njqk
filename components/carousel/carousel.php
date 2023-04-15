<?php
    
    function carouselItem(){
        $url = $_SESSION["url"];
        ?>
        <div class="carousel__item" draggable="false">
            <div class="carousel__item-img">
                <img src="<?=$url?>/assets/imgs/pexels-vlad-alexandru-popa-1402787.jpg" alt="">
            </div>
            <div class="carousel__item-content">
                <div class="carousel__item-heading mb-h-5">
                    <span>Life is fleeting, cherish every seconds of it or you might regret</span>
                </div>
                <div class="carousel__item-details">
                    <img src="<?=$url?>/assets/imgs/avatar-meo-cute-1.jpg" alt="">
                    <div class="carousel__content-info d-flex ml-h-5">
                        <span class="text-fade">April 1, 2012 • 14k <i class="fa-solid fa-eye text-fade"></i></span>
                        <span>Bocchi</span>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    function carousel(){
        $url = $_SESSION["url"];
        ?>
        <div class="wrapper__carousel">
            <i id="carousel-left-arrow" class="fa-solid fa-arrow-left"></i>
            <div class="carousel">
                <?=carouselItem()?>
                <?=carouselItem()?>
                <?=carouselItem()?>
                <?=carouselItem()?>
                <?=carouselItem()?>
                <?=carouselItem()?>
                <?=carouselItem()?>
                <?=carouselItem()?>
                <?=carouselItem()?>
                <?=carouselItem()?>
                <?=carouselItem()?>
                <?=carouselItem()?>
            </div>
            <i id="carousel-right-arrow" class="fa-solid fa-arrow-right"></i>
        </div>
        <?php
    }
?>