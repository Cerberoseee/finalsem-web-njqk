const parameter = {
    video: "#player",
    container: ".content-video"
};

try{
    (function YouTubePlayer(parameter){
        const $ = document.querySelector.bind(document);
        const container = $(parameter.container);
        
        // Render media player
        (function render(){
            const temp = container?.innerHTML;
            const settingMenu = `
            <div class="setting__menu">
                <ul class="setting__menu-list">
                    <li>Playback speed 
                        <span class="ml-1">Normal
                        <span>
                            </span><span><i class="fa-solid fa-arrow-right"></i></span>
                        </span>
                    </li>
                </ul>
            </div>
            `;
            const onContextMenu = `
            <div class="right-click">
                <ul>
                    <li id="right-click__loop">
                        <span>
                            <i class="fa-solid fa-rotate-left"></i>
                            <span>Loop</span>
                        </span>
                    </li>
                    <li id="right-click__cpyUrl">
                        <span>
                            <i class="fa-solid fa-link"></i>
                            <span>Copy video URL</span>
                        </span>
                    </li>
                    <li id="right-click__cpyUrl--curr">
                        <span>
                            <i class="fa-solid fa-link"></i>
                            <span>Copy video URL at current time</span>
                        </span>
                    </li>
                    <li id="right-click__embed">
                        <span>
                            <i class="fa-solid fa-code"></i>
                            <span>Code embed code</span>
                        </span>
                    </li>
                    <li id="right-click__pip">
                        <span>
                            <i class="fa-solid fa-bug"></i>
                            <span>Picture in picture</span>
                        </span>
                    </li>
                    <li id="right-click__bug">
                        <span>
                            <i class="fa-solid fa-bug"></i>
                            <span>Copy debug info</span>
                        </span>
                    </li>
                    <li id="right-click__trouble">
                        <span>
                            <i class="fa-regular fa-circle-question"></i>
                            <span>Troubleshoot playback issue</span>
                        </span>
                    </li>
                    <li id="right-click__info">
                        <span>
                            <i class="fa-solid fa-circle-info"></i>
                            <span>Stats for nerds</span>
                        </span>
                    </li>
                </ul>
            </div>
            `;
            const template = `
            <div class="source">
                ${settingMenu}
                <span id="play-icon">
                    <i class="fa-regular fa-circle-play"></i>
                </span>
                <span id="pause-icon">
                    <i class="fa-regular fa-circle-pause"></i>
                </span>
                <div class="controls rounded">
                    <div class="controls__process-bar">
                        <span id="buffer"></span>
                        <span id="loaded-bar"></span>
                        <input type="range" id="progress-bar">
                    </div>
                    <div class="controls__btn">
                        <div class="controls__btn-left">
                            <span class="btn-control controls__play">
                                <i class="fa-solid fa-play"></i>
                            </span>
                            <span class="btn-control controls__pause">
                                <i class="fa-solid fa-pause"></i>
                            </span>
                            <span class="btn-control controls__next">
                                <i class="fa-solid fa-forward-step"></i>
                            </span>
                            <div class="btn-control controls__volume">
                                <span id="volume-icon">
                                    <i class="fa-solid fa-volume-high"></i>
                                </span>
                                <span id="muted-icon">
                                    <i class="fa-solid fa-volume-xmark"></i>
                                </span>
                                <div class="volume-progress">
                                    <span id="volume-bar"></span>
                                    <span id="volume-background"></span>
                                    <input id="volume" type="range" min="0" max="1">
                                </div>
                            </div>
                            <div class="btn-controlcontrols__timer">
                                <span id="timer">00:00/11:11</span>
                            </div>
                        </div>
                        <div class="controls__btn-right">
                            <span class="btn-control controls__backward">
                                <i class="fa-solid fa-backward"></i>
                            </span>
                            <span class="btn-control controls__forward">
                                <i class="fa-solid fa-forward"></i>
                            </span>
                            <span class="btn-control controls__auto-play">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                            <span class="btn-control controls__theater">
                                <i class="fa-solid fa-tv"></i>
                            </span>
                            <span class="btn-control controls__default-view">
                                <i class="fa-solid fa-display"></i>
                            </span>
                            <span class="btn-control controls__mini">
                                <img src="./assets/icons/minimize.svg"/>
                            </span>
                            <span class="btn-control controls__fullscreen">
                                <img src="./assets/icons/Fullscreen.svg"/>
                            </span>
                        </div>
                    </div>
                </div>
                ${temp}
                ${onContextMenu}
                
            </div>
    
            `
            
            container.innerHTML = template;
    
        })();
        /*
            Functions:
                + play and pause video: setPlayPause()
                + change the volume: setVolume
                + setting: developing
                + change to Theater Mode: setTheaterView()
                + change to Fullscreen Mode: setFullView()
                + change to Default screen Mode: setDefaultView()
                + press space to play/pause: 
                + press esc to exit FullscreenMode: 
                + update timer for video: update()
                + forwarding for video:
        */
        const video = $(parameter.video);
        const source = $('.source');
        const controlsBar = $(".controls");
        // Progress bar
        const loadedBar = $('#loaded-bar');
        const progressBar = $('#progress-bar');
    
        // Controls and icons for play/pause
        const play = $('.controls__play');
        const pause = $('.controls__pause');
        const play_icon = $('#play-icon');
        const pause_icon = $('#pause-icon');
    
        // Controls and icons for full, theater, mini mode
        const fullscreen = $('.controls__fullscreen');
        const minimize = $('.controls__mini');
        const defaultview = $('.controls__default-view');
        const theater = $('.controls__theater');
    
        // Controls and icons for volume
        const volumeBar = $('#volume-bar');
        const noMute = $('#muted-icon');
        const  mute = $('#volume-icon');
    
    
        // Controls and icon for timer + progress bar
        let updateBar = ''; //for update
        const timer = $('#timer');
        const forward = $('.controls__forward');
        const backward = $('.controls__backward');
    
        // Const right-clock conttext menu
        const contextMenu = $('.right-click');
        const contextMenu_Info = $('#right-click__info');
        const contextMenu_Loop = $('#right-click__loop');
        const contextMenu_CpyUrl = $('#right-click__cpyUrl');
        const contextMenu_CpyUrl_curr = $('#right-click__cpyUrl--curr');
        const contextMenu_embed = $('#right-click__embed');
        const contextMenu_bug = $('#right-click__bug');
        const contextMenu_trouble = $('#right-click__trouble');
        const contextMenu_pip = $('#right-click__pip');
        // Initials/configuration
        // Volume
        const volume = $('#volume');
        volume.value = video.volume;
        volume.step = 0.1;
        volumeBar.style.width = volume.value > 0? volume.value + "%" : "0";
        // Progress
        progressBar.min = 0;
        progressBar.max = video.duration;
        progressBar.step = 0.001;
        progressBar.value = 100;
    
    
        function convertTime(yourtime){
            var minutes = Math.floor(yourtime / 60);
            var seconds = Math.floor(yourtime - minutes * 60)
            var x = (minutes < 10 ? "0" : "") + minutes;
            var y = (seconds < 10 ? "0" : "") + seconds;
            return `${x}:${y}`;
        }
        
        // Controller
        const controls = {
            flagView: false, //Theater/default
            view:{
                // Set fullview mode for video
                setFullView(){
                    source.requestFullscreen();
                    fullscreen.style.display = "none";
                    minimize.style.display = "block";
                    theater.style.display = "none";
                    defaultview.style.display = "block";
                },
                // Set theater mode for video
                setTheaterView(){
                    $('.video__recommends').style.gridArea = '2 / 2 / 3 / 3';
                    $('.video__container').style.gridColumn = '1/ span 2';
                    $('.video-container').classList.replace('container', 'container-fluid');
                    $('.content-video').style.height = '100%';
                    source.style.width = '100%';
                    defaultview.style.display = 'block';
                    minimize.style.display = 'none';
                    fullscreen.style.display = 'block';
                    theater.style.display = 'none';
                    document.exitFullscreen();
                },
                // Set default view mode for video
                setDefaultView(){
                    $('.video__recommends').style = `grid-column: 2 / span 1; grid-row: 1 / span 1`; 
                    $('.video__container').style = "grid-column: 1 / span 1;";
                    $('.video-container').classList.add('container');
                    $('.video-container').classList.remove('container-fluid');
                    $('.content-video').style = "width: 100%";
                    source.style.width = "unset";
                    defaultview.style.display = "none";
                    fullscreen.style.display = "block";
                    minimize.style.display = "none";
                    theater.style.display = "block";
                    document.exitFullscreen();
                }
            },
            volume:{
                flagVol: true,
                // Change the volume
                setVolume(){
                    video.volume = volume.value;
                    if(volume.value !== '0'){
                        noMute.style.display = "none";
                        mute.style.display = "block";
                    }else{
                        noMute.style.display = "block";
                        mute.style.display = "none";
                    }
                    volumeBar.style.width = volume.value > 0? volume.value + "%" : "0";
                },
                // Set volume is normal
                setNoMuted(){
                    video.volume = volume.value;
                    noMute.style.display = "none";
                    mute.style.display = "block";
                },
                // Set volume is muted
                setMuted(){
                    video.volume = 0;
                    noMute.style.display = "block";
                    mute.style.display = "none";
                }
            },
            player:{
                flag: true,
                // Playand Pause Video
                setPlayPause(){
                    if(this.flag){
                        video.play();
                        $('#thumb').style.display = "none";
                        this.flag = !this.flag;
                        play.style.display = "none";
                        pause.style.display = "block";
                        setTimeout(() => play_icon.style.display = "none", 200);
                    }else{
                        video.pause();
                        play.style.display = "block";
                        pause.style.display = "none";
                        setTimeout(() => pause_icon.style.display = "none", 200);
                    }
                },
                // Update time and value
                update(){
                    if(!video.ended){
                        let curr = video.currentTime;
                        let dura = video.duration;
                        let size = curr / dura * 100;
    
                        progressBar.value = size;
                        loadedBar.style.width = `${size}%`;
                        timer.innerText = `${convertTime(curr)}/${convertTime(dura)}`;
                    }else{
                        window.clearInterval(updateBar);
                    }
                },
                updateProgress(){
                    let curr = video.currentTime;
                    let dura = video.duration;
                    let size = curr/dura * 100;
                    progressBar.value = size;
                    loadedBar.style.width = size+"%";
                },
                // Forwarding
                setForward(){
                    video.currentTime += 5;
                    this.updateProgress();
                },
                // Backwarding
                setBackward(){
                    video.currentTime -= 5;
                    this.updateProgress();
                },
                setZero(){
                    video.currentTime = 0;
                    this.updateProgress();
                },
                setOne(){
                    video.currentTime = video.duration/9;
                    this.updateProgress();
                },
                setTwo(){
                    video.currentTime = video.duration/9 * 2;
                    this.updateProgress();
                },
                setThree(){
                    video.currentTime = video.duration/9 * 3;
                    this.updateProgress();
                },
                setFour(){
                    video.currentTime = video.duration/9 * 4;
                    this.updateProgress();
                }
                ,
                setFive(){
                    video.currentTime = video.duration/9 * 5;
                    this.updateProgress();
                },
                setSix(){
                    video.currentTime = video.duration/9 * 6;
                    this.updateProgress();
                },
                setSeven(){
                    video.currentTime = video.duration/9 * 7;
                    this.updateProgress();
                },
                setEight(){
                    video.currentTime = video.duration/9 * 8;
                    this.updateProgress();
                },
                setNine(){
                    video.currentTime = video.duration/9 * 9;
                    this.updateProgress();
                }
                
                
            },
            contextMenu:{
                loop(){
                    video.loop = !video.loop;
                    alert(video.loop);
                },
                copy_url(){
                    navigator.clipboard.writeText(window.location.href);
                },
                copy_url_curr(){
                    let curr = Math.floor(video.currentTime);
                    let url = window.location.href + "&time=" +curr;
                    navigator.clipboard.writeText(url);
                },
                embed(){
                    let iframe = `<iframe width="560" height="315" src="${window.location.href}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                    navigator.clipboard.writeText(iframe);
                },
                bug(){
                    alert("This feature is developing");
                },
                trouble(){
                    alert("This feature is developing");
                },
                info(){
                    alert("This feature is developing");
                },
                pip(){
                    video.requestPictureInPicture();
                }
            }
    
        }
    
        // List of events
        // Screen
        defaultview.onclick =()=> controls.view.setDefaultView();
        theater.onclick =()=> controls.view.setTheaterView();
        minimize.onclick =()=> controls.view.setDefaultView();
        fullscreen.onclick =()=> controls.view.setFullView();
    
        // Volume
        noMute.onclick = ()=> controls.volume.setNoMuted();
        mute.onclick = ()=> controls.volume.setMuted();
        volume.onchange  = ()=> controls.volume.setVolume();
    
        // Play/pause
        play.onclick = ()=> controls.player.setPlayPause();
        pause.onclick = ()=> controls.player.setPlayPause();
    
    
        // Pause/Play video on clicking
        video.onclick = ()=> controls.player.setPlayPause();
    
        // Forward/Downward
        forward.onclick = () => controls.player.setForward();
        backward.onclick = () => controls.player.setBackward();
    
        let oneFlag= true;
        video.addEventListener("dblclick", ()=>{
            video.play();
            oneFlag? controls.view.setDefaultView() : controls.view.setFullView();
            oneFlag = !oneFlag;
        });
        // Events for playing + pausing in video
        video.addEventListener("playing", function () {
            // Write Your Code
            updateBar = setInterval(controls.player.update, 300);
            play_icon.style.display = "block";
            setTimeout(()=>{
                play_icon.style.display = "none";
            },300)
            pause_icon.style.display = "none";
        });
        video.addEventListener("pause", function () {
            // Write Your Code
            clearInterval(updateBar);
            play_icon.style.display = "none";
            pause_icon.style.display = "block";
            setTimeout(()=>{
                pause_icon.style.display = "none";
            },300);
            controls.player.flag = !controls.player.flag;
        });
        // press esc
        addEventListener("fullscreenchange", (event) => {
            var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
                (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
                (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
                (document.msFullscreenElement && document.msFullscreenElement !== null);
            
            if(!isInFullScreen){
                controls.view.setDefaultView();
            }
        });
    
        // Update progress bar
        progressBar.addEventListener("change", (e)=>{
            clearInterval(updateBar);
            const seekTime = video.duration / 100 * e.target.value;
            video.currentTime = seekTime;
            setTimeout(()=> video.play(), 300);
        });
    
        // Custom right click
        if(document.addEventListener) {
            video.addEventListener('contextmenu', function(e) {
            function handleRight(e){
                contextMenu.style.display = "block";
                let rect = e.target.getBoundingClientRect();
                contextMenu.style.top = (e.clientY - rect.top) +"px";
                contextMenu.style.left = (e.clientX - rect.left) +"px";
            }
            video.addEventListener("mousemove",handleRight(e));
            video.removeEventListener("mousemove", handleRight(e));         
            e.preventDefault();
            }, false);
        }
        else{
            video.attachEvent('oncontextmenu', function() {
                contextMenu.style.display = "none";
                window.event.returnValue = false;
            });
        }
        contextMenu_Info.onclick =()=> controls.contextMenu.info();
        contextMenu_Loop.onclick =()=> controls.contextMenu.loop();
        contextMenu_CpyUrl.onclick =()=> controls.contextMenu.copy_url();
        contextMenu_CpyUrl_curr.onclick =()=> controls.contextMenu.copy_url_curr();
        contextMenu_embed.onclick =()=> controls.contextMenu.embed();
        contextMenu_bug.onclick =()=> controls.contextMenu.bug();
        contextMenu_trouble.onclick = ()=> controls.contextMenu.trouble();
        contextMenu_pip.onclick = ()=> controls.contextMenu.pip();
        document.onclick =()=>{
            contextMenu.style.display = "none";
        }
        // Handle cursor when hover on player
        var j;
        function handleHideCursor(){
            clearTimeout(j);
            controlsBar.style.display = "block";
            j = setTimeout(()=>{
                controlsBar.style.display = "none";
            },3000);
        } 
        source.addEventListener("mousemove", handleHideCursor);
        source.addEventListener("mouseleave", ()=>{
            controlsBar.style.display = "none";
            $('.setting__menu').style.display = "none";
        });
    
        // Events of hot keys
        // window.addEventListener("keydown",(e)=>{
        //     console.log(e.key);
        //     switch(e.key){
        //         case " ":{
        //             e.preventDefault();
        //             controls.player.setPlayPause();
        //         }
        //             break;
        //         case "ArrowRight": controls.player.setForward();
        //             break;
        //         case "ArrowLeft": controls.player.setBackward();
        //             break;
        //         case "ArrowUp": {
        //             e.preventDefault();
        //             volume.value = parseFloat(volume.value) + 0.1;
        //             controls.volume.setVolume();
        //         }
        //             break;
        //         case "ArrowDown": {
        //             e.preventDefault();
        //             volume.value -= 0.1;
        //             controls.volume.setVolume();
        //         }
        //             break;
        //         case "0":{
        //             controls.player.setZero();
        //         }
        //             break;
        //         case "1":{
        //             controls.player.setOne();
        //         }
        //             break;
        //         case "2":{
        //             controls.player.setTwo();
        //         }
        //             break;
        //         case "3":{
        //             controls.player.setThree();
        //         }
        //             break;
        //         case "4":{
        //             controls.player.setFour();
        //         }
        //             break;
        //         case "5":{
        //             controls.player.setFive();
        //         }
        //             break;
        //         case "6":{
        //             controls.player.setSix();
        //         }
        //             break;
        //         case "7":{
        //             controls.player.setSeven();
        //         }
        //             break;
        //         case "8":{
        //             controls.player.setEight();
        //         }
        //             break;
        //         case "9":{
        //             controls.player.setEight();
        //         }
        //             break;
        //         case "t":
        //         case "T":{
        //             if(controls.view.flagView){
        //                 controls.view.setTheaterView();
        //                 controls.view.flagView = !controls.view.flagView;
        //             }else{
        //                 controls.view.setDefaultView();
        //                 controls.view.flagView = !controls.view.flagView;
        //             }
        //         }
        //             break;
        //         case "f":
        //         case "F":{
        //             controls.view.setFullView();
        //         }
        //             break;
        //         case "k":
        //         case "K":{
        //             controls.player.setPlayPause();
        //         }
        //             break;
        //         case "m":
        //         case "M":{
        //             if(controls.volume.flagVol){
        //                 controls.volume.setMuted();
        //                 controls.volume.flagVol = !controls.volume.flagVol;
        //             }else{
        //                 controls.volume.setNoMuted();
        //                 controls.volume.flagVol = !controls.volume.flagVol;
        //             }
        //         }
        //         break;
        //     }
        // });
    
    })(parameter);
}catch(e){
    
}
    