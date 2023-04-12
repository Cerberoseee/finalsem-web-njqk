<?php
    function cmtItemReply(){
        ?>
        <li class="cmt__list-item-reply">
            <div class="cmt__item-avt mr-1">
                <img src="./assets/icons/Avatar.png" alt="">
            </div>
            <div class="cmt__item-content">
                <div class="cmt__item-heading">
                    <span class="cmt__item-name mr-h-5">Ky Nhong</span>
                    <small class="cmt__item-time">2 weeks ago</small>
                </div>
                <div class="cmt__item-body">
                    <p>
                        Momo is so well mannered, I love the way she just watches everything you two are doing. She's not even trying to steal food, I thought for sure she would try to steal that long man candy when it was dangling in front of her face lol.
                    </p>
                </div>
                <div class="cmt__item-func mt-h-5">
                    <button class="btn btn-primary rounded mr-h-5 btn-md">
                        <span class="cmt__item-func-text flex-align-center">
                            <img src="./assets/icons/reply.svg" alt="">
                            <span class="ml-h-5"> Reply</span>
                        </span>
                    </button>
                    <button class="btn rounded mr-h-5 btn-md">
                        <span class="cmt__item-func-text flex-align-center">
                            <img src="./assets/icons/like-btn.svg" alt="">
                            <span class="ml-h-5"> 14K</span>
                        </span>
                    </button>
                    <button class="btn rounded mr-h-5 btn-md">
                        <span class="cmt__item-func-text flex-align-center">
                            <img src="./assets/icons/report.svg" alt="">
                        </span>
                    </button>
                </div>
            </div>
        </li>
        <?php
    }
    function commentItem(){
        ?>
        <li class="cmt__list-item">
            <div class="cmt__item-avt mr-1">
                <img src="./assets/icons/Avatar.png" alt="">
            </div>
            <div class="cmt__item-content">
                <div class="cmt__item-main">
                    <div class="cmt__item-heading">
                        <span class="cmt__item-name mr-h-5">Ky Nhong</span>
                        <small class="cmt__item-time">2 weeks ago</small>
                    </div>
                    <div class="cmt__item-body">
                        <p>
                            Momo is so well mannered, I love the way she just watches everything you two are doing. She's not even trying to steal food, I thought for sure she would try to steal that long man candy when it was dangling in front of her face lol.
                        </p>
                    </div>
                    <div class="cmt__item-func mt-h-5">
                        <button class="btn btn-primary rounded mr-h-5 btn-md">
                            <span class="cmt__item-func-text flex-align-center">
                                <img src="./assets/icons/reply.svg" alt="">
                                <span class="ml-h-5"> Reply</span>
                            </span>
                        </button>
                        <button class="btn rounded mr-h-5 btn-md">
                            <span class="cmt__item-func-text flex-align-center">
                                <img src="./assets/icons/like-btn.svg" alt="">
                                <span class="ml-h-5"> 14K</span>
                            </span>
                        </button>
                        <button class="btn rounded mr-h-5 btn-md">
                            <span class="cmt__item-func-text flex-align-center">
                                <img src="./assets/icons/report.svg" alt="">
                            </span>
                        </button>
                    </div>
                    <button id="showreply" class="btn btn-link btn-link--blue mt-1 text-sm">SHOW 12 REPLIES  ▼</button>
                </div>
                <!-- Reply -->
                <div class="cmt__item-reply">
                    <ul>
                    <?=cmtItemReply()?>
                    <?=cmtItemReply()?>
                    <?=cmtItemReply()?>
                    <?=cmtItemReply()?>
                    </ul>
                </div>
                
            </div>
        </li>
        <?php
    }
    function commentsHTML(){
        ?>
        <!-- Video comments -->
        <div class="video__comments">
            <div class="video__comments-panel">
                <div class="video__cmt-numbers">
                    <span>521 comments</span>
                </div>
                <div class="video__cmt-tab">
                    <div class="btn-group">
                        <button class="btn active">Top comments</button>
                        <button class="btn">Newest first</button>
                    </div>
                </div>
            </div>
            <div class="video__comments-post mt-1">
                <div class="comments__post-img">
                    <img src="./assets/icons/post-cmt.svg" alt="">
                </div>
                <div class="comments__post-textarea">
                    <textarea placeholder="Add a comment" name="" id="comments__post-textarea"></textarea>

                    </textarea>
                    <div class="comments__textarea-func mt-h-5">
                        <button class="btn btn-outline-second btn-md float-right w-6 rounded">Comment</button>
                        <button class="btn btn-outline-primary btn-md float-right mr-h-5 w-6 rounded">Cancel</button>
                    </div>
                </div>
            </div>
            <ul class="video__comments-list">
                <?=commentItem()?>
            </ul>
        </div>
        <?php
    }
?>