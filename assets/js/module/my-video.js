import {$,$$, url, userId} from './config.js';
import { getVideosUser } from '../../../AJAX/fetch.js';
( async ()=>{
    // Get videos of user
    const videosUser = await getVideosUser(userId);
    console.log(1);
    if(videosUser){
        const container = $('.myvideo__video-list');
        const list = videosUser.map(video => {
            return `
            <div class="col-2 col-lg-3 col-md-4 col-sm-6">
                <a href="${url}/watch.php?video=${video.videoId}">
                    <div class="profile__video-item">
                        <div class="pr-video-item__img">
                            <img src="${url}/${video.thumbnailPath}" alt="">
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

        container.innerHTML = list;
    }
})();