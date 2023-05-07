<?php
    require_once('../components/layout.php');
    $url = $_SESSION["url"];
    // Check login
    $isLogin = false;
    if(isset($_SESSION["account"])){
        $isLogin = true;
        $account = $_SESSION['account'];
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?=head()?>
    <title>Upload video | <?=$account["channelName"].$web_name?></title>
</head>
<body>
    <!-- Navigation -->
    <?=nav()?>

    <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <div class="profile__background">
                <img src="<?=$url.$account["backgroundPath"]?>" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="container container__profile container__profile--manage">
                    <div class="row">
                        <div class="col-12">
                            <div class="profile__avatar">
                                <img src="<?=$url.$account["avatarPath"]?>" class="profile__avatar-img" src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="profile__info">
                                <div class="profile__name"><?=$account["channelName"]?></div>
                                <div class="profile__tag">@<?=$account["username"]?></div>
                                <div class="profile__bio mt-1"><?=$account["bio"]?></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="profile__filter">
                                <div class="profile__filter-cate">
                                    <ul class="profile-filter-list">
                                        <li id="profile_home" class="profile-filter-item active">Home</li>
                                        <li id="profile_playlist" class="profile-filter-item">Playlist</li>
                                        <li id="profile_liked" class="profile-filter-item">Liked videos</li>
                                        <li id="profile_videos" class="profile-filter-item">Your videos</li>
                                        <li id="profile_about" class="profile-filter-item">About</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr class="mt-1 hr-color">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wrapper__upload">
                    <!-- Heading -->
                    <div class="upload__heading text-center">
                        <h3 class="py-1">Upload your videos here</h3>
                        <hr class="hr-color mb-1">
                    </div>
                    <!-- Processes -->
                    <div class="upload__processes">
                        <div id="step_1" class="processes__step">
                            <span class="step__bar step__bar--active"></span>
                            <div class="step__title step__title--active">
                                <input value="upload__video" type="radio" name="process__bar" id="" checked>
                                <span>Upload your video</span>
                            </div>
                        </div>
                        <div id="step_2" class="processes__step">
                            <span class="step__bar"></span>
                            <div class="step__title">
                                <input value="info__video" type="radio" name="process__bar" id="">
                                <span>Video info</span>
                            </div>
                        </div>
                        <div id="step_3" class="processes__step">
                            <span class="step__bar"></span>
                            <div class="step__title">
                                <input value="upload__tbumbnail" type="radio" name="process__bar" id="">
                                <span>Upload thumbnail</span>
                            </div>
                        </div>
                        <div id="step_4" class="processes__step">
                            <span class="step__bar"></span>
                            <div class="step__title">
                                <input value="add__tags" type="radio" name="process__bar" id="">
                                <span>Tags and restrictions</span>
                            </div>
                        </div>
                        <div id="step_5" class="processes__step">
                            <span class="step__bar"></span>
                            <div class="step__title">
                                <input value="confirm__upload" type="radio" name="process__bar" id="">
                                <span>Confirm</span>
                            </div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="wrapper">
                        <!-- Select video -->
                        <div class="upload__content mt-4">
                            <div class="upload__video">
                                <img id="upload_input" src="<?=$url?>/assets/imgs/Browse-video-button.png" alt="">
                                <span class="my-1">Select a video file to upload</span>
                                <span class="alert-error" id="alert-upload"></span>
                                <div class="video__preview text-center">
                                  <!-- Nho them AJAX vao cho nay !-->
                                    <span>Preview</span>
                                    <video class="d-block" id="video__preview-src" controls>
                                        <source>
                                    </video>
                                </div>
                            </div>
                        </div>
                        <!-- Update info -->
                        <div class="upload__info mt-4">
                            <div class="form-input">
                                <label>Title <small>(require)</small></label>
                                <input id="title" type="text" name="title" placeholder="Enter the title of the video" require>
                                <small class="alert-error"></small>
                            </div>
                            <div class="form-input">
                                <label>Description</label>
                                <textarea id="desc" type="text" name="desc" placeholder="Enter the description of the video"></textarea>
                                <small class="alert-error"></small>
                            </div>                            
                        </div>
                        <!-- Upload thumbnail -->
                        <div class="upload__thumbnail mt-4">
                            <span>Upload a picture that's the face of your video</span>
                            <div id="upload_thumb" class="mt-3 thumbnail__block">
                                <img src="<?=$url?>/assets/icons/Image-edit.png" alt="">
                                <span>upload thumbnail</span>
                            </div>
                            <div class="thumbnail__preview">
                                <span>Preview</span>
                                <img>
                            </div>
                        </div>
                        <!-- Add tags and restrictions -->
                        <div class="upload__stric mt-4">
                            <div class="form-input">
                                <label>Tags</label>
                                <small class="text-fade">
                                    Adding tags to help your video get recommended to the right audience
                                </small>
                                <input id="tags" type="text" name="tags" placeholder="Enter the tags of the video" require>
                                <small class="alert-error"></small>
                            </div>
                            <div class="form-input">
                                <label for="">Age restriction</label>
                                <small>This video might not be suitable for children</small>
                                <div class="input-radio-group">
                                    <div class="input-group">
                                        <input id="all-age" type="radio" name="age" value="all-age" checked/>
                                        <label for="">All ages</label>
                                    </div>
                                    <div class="input-group">
                                        <input id="age-18" type="radio" name="age" value="age-18"/>
                                        <label for="">R - 18</label>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <!-- Confirm -->
                        <div class="upload__confirm mt-4">
                            <div class="upload__confirm-block">
                                <div class="upload__confirm-video">
                                    <video class="d-block mb-1" id="video-confirm-src" controls>
                                    <source>
                                    </video>
                                    <label id="text-videoname" for="">Name of video</label>
                                </div>
                                <div class="upload__confirm-content mt-1">
                                    <div class="confirm__content-group">
                                    <label for="">Description</label>
                                    <span class="d-block" id="desc__preview">Text</span>
                                    </div>
                                    <div class="confirm__content-group">
                                    <label for="">Tags</label>
                                    <span class="d-block" id="tags__preview">Text</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Unload percents/footer -->
                    <div class="upload__footer my-3 py-2">
                        <div class="upload__footer-backward">
                            <button class="btn btn-primary">BACK</button>
                        </div>
                        <div class="upload__percent text-fade">
                            <span>
                                <i class="fa-solid fa-upload"></i>
                                </span>
                                <span>
                                    Uploading... <span id="percent__numbers">0</span>%
                                </span>
                            <div class="upload__percent-progress">
                                <span class="upload__percent-progress-1"></span>
                            </div>
                        </div>
                        <div class="upload__footer-forward">
                            <button class="btn btn-primary">NEXT</button>
                            <button id="btn_confirm" class="btn btn-primary my-1">UPLOAD VIDEO</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Loading scripts -->
    <?=scripts()?>
    <script src="<?=$url?>/assets/js/module/uploadvideo.js" type="module"></script>
</body>
</html>