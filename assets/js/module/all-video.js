import {$,$$, url} from './config.js';
import { getAllVideo, getTrending, getRecommend, getTopviews } from '../../../AJAX/fetch.js';
(()=>{
    // Get all videos
    (async ()=>{
        const data = await getAllVideo();
        if(data){
            const videos = data;
            const container = $('.profile__video-list--all');
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
                                    <img src="${url+video.avatarPath}" alt="">
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
            try{
                container.innerHTML = list;
            }catch(e){

            }
        }else{
            console.log("Lỗi kết nối hoặc database");
        }
    })();
    // Get trending videos
    (async ()=>{
        const data = await getTrending();
        if(data){
            const videos = data;
            const container = $('.video__trending-list');

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
                                <img src="${url+video.avatarPath}" alt="">
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
            // Carousel
            try{
                container.innerHTML = list;
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
                //console.log(e);
            }
        
        }
    })();
    // Get recommended videos
    (async ()=>{
        const data = await getRecommend();
        if(data){
            const container = $('.profile__video-list--recommend');
            const videos = data;
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
                                    <img src="${url+video.avatarPath}" alt="">
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
            try{
                container.innerHTML = list;
            }catch(e){
                
            }
        }
    })();
})();
// Get recommnded export 
export function exportRecomended(){
    try{
        (async ()=>{
            const data = await getRecommend();
            if(data){
                const container = $('.video__recommends-list');
                const videos = data;
    
                const list = videos.map(video => {
                    return `
                    <div class="video__list-item my-1">
                        <a class="video__list-item--flex" href="${url}/watch.php?video=${video.videoId}">
                            <div class="video__thumb">
                                <span class="video__thumb-timer">00:07</span>
                                <img id="video__list-item--img" src="${url}/${video.thumbnailPath}" alt="">
                            </div>
                            <div class="video__contents ">
                                <div class="video__heading">${video.name}</div>
                                <div class="video__details">
                                    <span class="mr-h-5">${video.uploadTime} • ${video.views}</span>
                                </div>
                                <div class="video__author">
                                    <span class="video__author-avt"><img id="video__author-avt--img" src="${url+video.avatarPath}" alt=""></span>
                                    <span class="video__author-name">${video.channelName}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    `;
                }).join("");
                container.innerHTML = list;
            }
        })();
    }
    catch(e){

    }
}
// Get top views export 
export function exportTopviews(){
    try{
        (async ()=>{
            const data = await getTopviews();
            if(data){
                const container = $('.video__recommends-list');
                const videos = data;
    
                const list = videos.map(video => {
                    return `
                    <div class="video__list-item my-1">
                        <a class="video__list-item--flex" href="${url}/watch.php?video=${video.videoId}">
                            <div class="video__thumb">
                                <span class="video__thumb-timer">00:07</span>
                                <img id="video__list-item--img" src="${url}/${video.thumbnailPath}" alt="">
                            </div>
                            <div class="video__contents ">
                                <div class="video__heading">${video.name}</div>
                                <div class="video__details">
                                    <span class="mr-h-5">${video.uploadTime} • ${video.views}</span>
                                </div>
                                <div class="video__author">
                                    <span class="video__author-avt"><img id="video__author-avt--img" src="${url+video.avatarPath}" alt=""></span>
                                    <span class="video__author-name">${video.channelName}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    `;
                }).join("");
                container.innerHTML = list;
            }
        })();
    }catch(e){
        
    }
}