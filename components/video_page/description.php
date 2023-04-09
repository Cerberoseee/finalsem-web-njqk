<?php
    function descriptionHTML(){
        ?>
        <!-- Video description -->
        <div class="video__description mb-2">
                <div class="video__title">Son buscu</div>
                <div class="video__extension my-1">
                    <div class="video__creater">
                        <div class="video__creater-avt">
                            <img src="./assets/icons/subcriberavt.png" alt="">
                        </div>
                        <div class="video__creater-details">
                            <span class="video__creater-name mr-h-5">John Smith</span>
                            <span class="video__creater-subs mr-h-5">100k subcribers</span>
                            <button class="btn btn-outline-primary btn__create-follow">Follow</button>
                        </div>
                    </div>
                    <div class="video__react-extension">
                        <div class="video__extension-like-dis">
                            <div class="btn-group-like-dis rounded mr-h-5">
                                <button class="btn">
                                    <span class="cmt__item-func-text flex-align-center">
                                        <img src="./assets/icons/like-btn.svg" alt="">
                                        <span class="ml-h-5"> 14K</span>
                                    </span>
                                </button>
                                <button class="btn">
                                    <span class="cmt__item-func-text flex-align-center">
                                        <span class="mr-h-5">14K</span>
                                        <img src="./assets/icons/dislike-btn.svg" alt="">
                                    </span>
                                </button>
                            </div>
                            <button class="btn btn__extension-share rounded mr-h-5">
                                <span class="cmt__item-func-text flex-align-center">
                                    <img src="./assets/icons/share-btn.svg" alt="">
                                    <span class="ml-h-5"> Share</span>
                                </span>
                            </button>
                            <button class="btn btn__extension-share rounded">
                                <span class="cmt__item-func-text text-align-center">
                                    . . . 
                                </span>
                            </button>
                        </div>
                        <hr class="mt-1">
                    </div>
                </div>
                <div class="video__description-content mt-4">
                    <div class="video__information">
                        <span class="video__information-text flex-align-center mr-1">1,000,000
                            <img class="ml-h-5" src="./assets/icons/views.svg" alt="">
                        </span>
                        <span class="video__information-text">Mar 30, 2023</span>
                    </div>
                    <div class="video__information-content mt-h-5">
                        <p>After a long wait, John Smith is finally with us. But was it worth the wait, and is it a fitting swan song for one of the best buscu scene in recent memory? Let's find out.  <button class="btn  btn-link">More details</button></p>
                    </div>
                </div>
            </div>
        <?php
    }
?>