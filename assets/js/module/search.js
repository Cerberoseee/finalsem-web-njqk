import {$,$$, url} from './config.js';
import { search } from '../../../AJAX/fetch.js';
(async ()=>{
    const urlParams = new URLSearchParams(window.location.search);
    const query = urlParams.get('query');
    const data = await search(query);
    if(data){
        const videos = data;
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
                                <img src="${url+video.avatarPath}" alt="">
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

        console.log(list);
        container.innerHTML = list;
    }
})();