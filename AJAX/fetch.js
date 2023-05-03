import {$, $$} from '../assets/js/module/config.js';
const url = sessionStorage.getItem("serverURL");

// Search on bar
export function search(title){
    console.log(title);
    fetch('./api/video-query.php',{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify({type: "search", title})
    })
    .then(res => res.json())
    .then(data => {
        if(data.status){
            const videos = data.data;
            const container = $('.search__video-list');

            const list = videos.map(video =>{
                if(video.name.length > 30){
                    video.name = video.name.slice(0,30) + "...";
                }
                if(video.description.length > 50){
                    video.description = video.description.slice(0,50) + "...";
                }
                return `
                <div class="col-12">
                    <a href="${url}/watch.php?video=${video.videoId}">
                        <div class="profile__video-item profile__video-item--search">
                            <div class="pr-video-item__img">
                                <img src="${url}/${video.thumbnailPath}" alt="${video.name}">
                            </div>
                            <div class="pr-video-item__content">
                                <h3 class="pr-video-item__content-title">${video.name}</h3>
                                <div class="pr-video-item__content-info mt-h-5">
                                    <img src="${url}/api/${video.avatarPath}" alt="">
                                    <div class="pr-video-item__content-details ml-h-5">
                                        <span class="pr-video-item__content-more text-fade">${video.uploadTime} • ${video.views} <i class="fa-solid fa-eye text-fade"></i></span>
                                        <span>${video.channelName}</span>
                                    </div>
                                </div>
                                <div class="video-item__description mt-h-5">
                                    <p class="text-fade">
                                        ${video.description}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                `
            }).join("");

            container.innerHTML = list;
        }else{
            console.log("Lỗi search");
        }
    })
}
// Fetch to register page
export function register(account){
    fetch('./api/register.php',{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify(account),
    })
    .then(res => res.json())
    .then((res)=>{
        if(res.status === true){
            $('.register__success').style.display = "block";
            $('.register__loading').style.display = "none";
        }else{
            const {status, error} = res;
            console.log(error);
            $('.register-form').style.display = "block";
            $('.register__loading').style.display = "none";
        }
        
    })
}

// Fetch to login
export function login(account){
    fetch('./api/login.php',{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify(account),
    })
    .then(res => res.json())
    .then((res)=>{
        if(res.status === true){
            $('.alert').innerText = "You are login successfully";
            console.log(res.data);
            sessionStorage.setItem("profile", JSON.stringify(res.data));
            setTimeout(()=>{
                window.location.href = "index.php";
            }, 3000);
        }else{
            $('.alert').innerText = "You are login failed";
        }
    })
}

// Fecth to Logout
export function logout(){
    sessionStorage.removeItem("profile");
    window.location.href = "index.php";
}

// Retreive data for profile by id
export function profile(id){
    const api = `${url}api/profile-info.php?userId=${id}`;
    fetch(api)
    .then(res => res.json())
    .then(res=>{
        if(res.status === true){
            const account = res.data;
            $('.profile__avatar-img').src = url+"api/"+account.avatarPath;
            $('.profile__name').innerText = account.channelName;
            $('.profile__tag').innerText = "@"+account.username;
            $('.profile__bio').innerText = account.bio;
            $('.pr-about__day').innerText = account.dateOfBirth;
            $('.pr-about__email').innerText = account.email;
            $('.pr-about__createAt').innerText = account.dateCreated;
        }else{
            console.log("error");
        }
    })
}

// Upload video
export function upload_video(form){

    var data = new FormData();
    data.append('userId', form.userId);
    data.append('video', form.video);
    data.append('thumbnail', form.thumbnail);
    data.append('title', form.title);
    data.append('description', form.description);
    data.append('tags', form.tags);
    data.append('age_restric', form.age_restric);  


    const xhr = new XMLHttpRequest();
    xhr.open("POST", `${url}api/upload/upload-video.php`, true);

    xhr.upload.addEventListener("progress", function(event) {
        const progress = Math.round((event.loaded / event.total) * 100);
        console.log(`File uploading progress: ${progress.toFixed(2)}%`);
        const uploadview = $('.upload__percent');
        uploadview.style.display = "block";
        percent__numbers.innerText = progress;
        $('.upload__percent-progress-1').style.width = progress + "%";
    });

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const res = JSON.parse(xhr.responseText);
                if(res.status === true){
                    let header = res.header;
                    window.setTimeout(()=> {
                        window.location.href = `${url}/watch.php?video=${header.id}`;
                    }, 3000);

                }else{
                    console.error("Error to upload");
                }
            } else {
                console.error("Error: " + xhr.status);
            }
        }
    };

    xhr.send(data);
}

// Get video and comment
export function getVideo(id){
    fetch(`${url}/api/video.php?id=${id}`)
    .then(res => res.json())
    .then(data => {
        if(data.status === true){
            const video = data.content;
            console.log(video);
            $('.video__title').innerText = video.name;
            $('#views__span').innerText = video.views;
            $('#like__span').innerText = video.likeCount;
            $('#dislike__span').innerText = video.dislikeCount;
            $('#datetime__span').innerText = video.uploadTime;
            $('#video__creater-avt--img').src = video.avatarPath;
            $('.video__creater-name').innerText = video.channelName;
            $('#video__creater-subs--text').innerText = video.followers;

            let desc = $('#description__span');
            if(video.description.length <= 200){
                desc.innerText = video.description;
            }else{
                desc.innerHTML = `${video.description.slice(0,200)} <span id="showmore">${video.description.slice(201)}</span><button id="showhide" class="btn btn-link">More details</button>`;
                try{
                    // Showmore in description of videopage
                    let flag = false;
                    $('#showhide').onclick=()=>{
                        if(!flag){
                            $('#showmore').style.display = "block";
                            $('#showhide').innerText = "Show less";
                            flag = !flag;
                        }else{
                            $('#showmore').style.display = "none";
                            $('#showhide').innerText = "Show more";
                            flag = !flag;
                        }
                    }
                }catch(e){
                    errorText += e;
                }
            }

            $('#thumb').src = video.thumbnailPath;
            $('#player').src = url+video.videoPath;
            $('title').innerText = video.name +" - WIBUTAP";

        }else{
            console.error("Error");
        }
    })
}

// Get all video fromdatabase
export function getAllVideo(block){
    fetch(`${url}/api/video-query.php`,{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify({type: "all"})
    })
    .then(res => res.json())
    .then(data => {
        const container = block;
        if(data.status === true){
            const videos = data.data;

            const list = videos.map(video => {
                if(video.name.length > 30){
                    video.name = video.name.slice(0,30) + "...";
                }
                return `
                <div class="col-2 col-lg-3 col-md-4 col-sm-6" title=${video.name}>
                    <a href="${url}/watch.php?video=${video.videoId}">
                        <div class="profile__video-item">
                            <div class="pr-video-item__img">
                                <img src="${url}/${video.thumbnailPath}" alt="${video.name}">
                            </div>
                            <div class="pr-video-item__content">
                                <h3 class="pr-video-item__content-title">${video.name}</h3>
                                <div class="pr-video-item__content-info mt-h-5">
                                    <img src="${url}/api/${video.avatarPath}" alt="">
                                    <div class="pr-video-item__content-details ml-h-5">
                                        <span>${video.channelName}</span>
                                        <span class="pr-video-item__content-more text-fade">${video.uploadTime} • ${video.views} <i class="fa-solid fa-eye text-fade"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                `;
            }).join("");
            
            container.innerHTML = list;
            console.log(videos);
            console.log(container);
        }else{
            console.log("Lỗi kết nối hoặc database");
        }
    });
}

// Get video trending
export function getTrending(block){
    fetch(`${url}/api/video-query.php`,{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify({type: "trend"})
    })
    .then(res => res.json())
    .then(data => {
        if(data.status){
            const videos = data.data;
            const container = block;

            const list = videos.map(video => {
                if(video.name.length > 20){
                    video.name = video.name.slice(0,20) + "...";
                }
                return `
                <div class="carousel__item" draggable="false">
                    <a href="${url}/watch.php?video=${video.videoId}">
                        <div class="carousel__item-img">
                            <img src="${url}/${video.thumbnailPath}" alt="${video.name}">
                        </div>
                        <div class="carousel__item-content">
                            <div class="carousel__item-heading mb-h-5">
                                <span>${video.name}</span>
                            </div>
                            <div class="carousel__item-details">
                                <img src="${url}/api/${video.avatarPath}" alt="">
                                <div class="carousel__content-info d-flex ml-h-5">
                                    <span class="text-fade">${video.uploadTime} • ${video.views} <i class="fa-solid fa-eye text-fade"></i></span>
                                    <span>${video.channelName}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                `;
            }).join("");

            container.innerHTML = list;
            // Carousel
            try{
                let isDrag = false, isDragging = false, prevPageX, prevScrollLeft, posDiff;
                const carousel = $('.carousel');
                let firstItem = carousel.querySelectorAll('.carousel__item')[0];
                let arrowIcons = $$('.wrapper__carousel > i');
                let firstWidth = firstItem.clientWidth;
                let scrollWidth = carousel.scrollWidth - carousel.clientWidth;

                const showHideIcon = ()=>{
                    arrowIcons[0].style.display = carousel.scrollLeft == 0? "none":"block";
                    arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth? "none":"block";
                }
                arrowIcons.forEach(icon=>{
                    icon.addEventListener("click", ()=>{
                        carousel.scrollLeft += icon.id == "carousel-left-arrow"? -firstWidth : firstWidth;
                        setTimeout(()=> showHideIcon(), 60);
                    });

                });
                const autoSlide = ()=> {
                    if(carousel.scrollLeft == (carousel.scrollWidth - carousel.clientWidth)) return;
                    posDiff = Math.abs(posDiff);
                    let firstItemWidth = firstItem.clientWidth;
                    let valDifference = firstItemWidth - posDiff;

                    if(carousel.scrollLeft > prevScrollLeft){
                        return carousel.scrollLeft += posDiff > firstItemWidth / 4? valDifference : posDiff;
                    }
                    carousel.scrollLeft -= posDiff > firstItemWidth / 4? valDifference : -posDiff;
                }
                const dragStart = (e)=>{
                    isDrag = true;
                    prevPageX = e.pageX || e.touches[0].pageX;
                    prevScrollLeft = carousel.scrollLeft;
                }
                const dragStop = ()=>{
                    carousel.classList.remove("dragging");
                    if(!isDragging) return;
                    isDragging = false;
                    isDrag = false;
                    autoSlide();
                }
                const dragging = (e)=>{
                    if(!isDrag) return;
                    e.preventDefault();
                    isDragging = true;
                    carousel.classList.add("dragging");
                    posDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
                    carousel.scrollLeft = prevScrollLeft - posDiff;
                    showHideIcon();

                }
                carousel.addEventListener("mousemove", dragging);
                carousel.addEventListener("touchstart", dragStart);

                carousel.addEventListener("touchmove", dragging);
                carousel.addEventListener("mousedown", dragStart)
                carousel.addEventListener("mouseup", dragStop)
                carousel.addEventListener("touchend", dragStop)
                carousel.addEventListener("mouseleave", dragStop)
            }catch(e){
                console.log(e);
            }
        }
    })
}

// Get video recommend
export function getRecommend(block){
    fetch(`${url}/api/video-query.php`,{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify({type: "all", })
    })
    .then(res => res.json())
    .then(data => {
        const container = block;
        if(data.status === true){
            const videos = data.data;

            const list = videos.map(video => {
                if(video.name.length > 30){
                    video.name = video.name.slice(0,30) + "...";
                }
                return `
                <div class="col-2 col-lg-3 col-md-4 col-sm-6" title=${video.name}>
                    <a href="${url}/watch.php?video=${video.videoId}">
                        <div class="profile__video-item">
                            <div class="pr-video-item__img">
                                <img src="${url}/${video.thumbnailPath}" alt="${video.name}">
                            </div>
                            <div class="pr-video-item__content">
                                <h3 class="pr-video-item__content-title">${video.name}</h3>
                                <div class="pr-video-item__content-info mt-h-5">
                                    <img src="${url}/api/${video.avatarPath}" alt="">
                                    <div class="pr-video-item__content-details ml-h-5">
                                        <span>${video.channelName}</span>
                                        <span class="pr-video-item__content-more text-fade">${video.uploadTime} • ${video.views} <i class="fa-solid fa-eye text-fade"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                `;
            }).join("");
            
            container.innerHTML = list;
            console.log(videos);
            console.log(container);
        }else{
            console.log("Lỗi kết nối hoặc database");
        }
    });
}