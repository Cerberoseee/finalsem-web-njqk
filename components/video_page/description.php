<?php
    function descriptionHTML(){
        $url = $_SESSION["url"];
        ?>
        <!-- Video description -->
        <div class="video__description mb-2">
            <div class="video__title">Son buscu</div>
            <div class="video__extension my-1">
                <div class="video__creater">
                    <div class="video__creater-avt">
                        <img src="<?=$url?>/assets/icons/subcriberavt.png" alt="">
                    </div>
                    <div class="video__creater-details">
                        <div class="creater__details-heading">
                            <span class="video__creater-name mr-h-5">John Smith</span>
                            <span class="video__creater-subs mr-h-5">100k subcribers</span>
                        </div>
                        <button class="btn btn-outline-primary btn__create-follow">Follow</button>
                    </div>
                </div>
                <div class="video__react-extension">
                    <ul class="video__extension-like-dis">
                        <li class="btn-group-like-dis rounded mr-h-5">
                            <button class="btn">
                                <span class="cmt__item-func-text flex-align-center">
                                    <img src="<?=$url?>/assets/icons/like-btn.svg" alt="">
                                    <span id="like__span" class="ml-h-5">14K</span>
                                </span>
                            </button>
                            <button class="btn">
                                <span class="cmt__item-func-text flex-align-center">
                                    <span id="dislike__span" class="mr-h-5">14K</span>
                                    <img src="<?=$url?>/assets/icons/dislike-btn.svg" alt="">
                                </span>
                            </button>
                        </li>
                        <li>
                            <button id="share-video" class="btn btn__extension-share rounded mr-h-5">
                                <span class="cmt__item-func-text flex-align-center">
                                    <img src="<?=$url?>/assets/icons/share-btn.svg" alt="">
                                    <span class="ml-h-5"> Share</span>
                                </span>
                            </button>
                        </li>
                        <li>
                            <button class="btn btn__extension-share rounded">
                                <span class="cmt__item-func-text text-align-center">
                                    . . . 
                                </span>
                            </button>
                        </li>
                    </ul>
                    <hr class="mt-1">
                </div>
            </div>
            <div class="video__description-content mt-4">
                <div class="video__information">
                    <span class="video__information-text flex-align-center mr-1">
                        <span id="views__span">1,000,000</span>
                        <img class="ml-h-5" src="<?=$url?>/assets/icons/views.svg" alt="">
                    </span>
                    <span id="datetime__span" class="video__information-text">Mar 30, 2023</span>
                </div>
                <div class="video__information-content mt-h-5">
                    <p id="description__span">After a long wait, John Smith is finally with us. But was it worth the wait, and is it a fitting swan song for one of the best buscu scene in recent memory? Let's find out. <span id="showmore">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed rem maiores quasi accusantium ratione natus facilis cupiditate possimus. Earum cupiditate voluptates unde est quidem, velit maiores at. Aperiam recusandae provident est tempora! Non vel corrupti quo quisquam nostrum praesentium facilis dolorum accusamus tempora quos. Quibusdam earum ea molestiae dolore! Quod pariatur delectus dignissimos incidunt itaque accusantium ab molestiae commodi ex voluptatem debitis et, quidem porro! Dolore dicta quia optio est quasi amet voluptatum deleniti rem, debitis dolor saepe nihil fugit animi repellendus temporibus earum accusantium totam et similique tempora tempore voluptas ex. Voluptatem hic dolor expedita consequuntur commodi. Illo adipisci magni rerum exercitationem ab labore. Quasi laborum illo tenetur odio consequuntur eos corporis optio modi quisquam facilis! Aut provident minima vero corporis, nobis quisquam repudiandae tenetur ratione, omnis officiis ex. A officiis molestiae neque voluptatum, inventore quam, veniam corporis consectetur quidem ullam aspernatur alias dicta velit sapiente autem iure labore. Placeat voluptatum libero reiciendis saepe beatae ea, veniam reprehenderit quaerat. Beatae est provident officia voluptate, nam quidem illum odio recusandae dolores eaque molestias earum? Aliquid accusantium dignissimos voluptate nulla perspiciatis obcaecati? Fuga, repellat deleniti labore unde nisi soluta debitis sint, dignissimos totam harum amet! Laboriosam dolores dolore animi veritatis deleniti.</span><button id="showhide" class="btn btn-link">More details</button></p>
                </div>
            </div>
            <div class="share__popup">
                <span class="share__popup-exit"><i class="fa-solid fa-circle-xmark"></i></span>
                <h3>The link of this video</h3>
                <input class="share__popup--src" type="text">
                <button class="btn btn-primary" id="copy-link">Copy</button>
            </div>
        </div>
        <?php
    }
?>