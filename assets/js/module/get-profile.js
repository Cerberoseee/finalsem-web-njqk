import {$,$$, url, userId} from './config.js';
import { profile, getVideosUser } from '../../../AJAX/fetch.js';
const profileApp = (()=>{
    function showHideFilterItem(itemClass){
        const listItem = {
            profile_home: $('.profile__home'),
            profile_playlist: $('.profile__playlist'),
            profile_liked: $('.profile__liked'),
            profile_videos: $('.profile__videos'),
            profile_about: $('.profile__about')
        }
        for(const item in listItem){
            if(itemClass === item){
                listItem[item].style.display = "block";
            }else{
                listItem[item].style.display = "none";
            }
        }
    }
    // Load content by id filter
    function filter(id){
        switch(id){
            case 'profile_home':{
                showHideFilterItem(id);
            }
            break;
            case 'profile_playlist':{
                showHideFilterItem(id);
            }
            break;
            case 'profile_liked':{
                showHideFilterItem(id);
            }
            break;
            case 'profile_videos':{
                showHideFilterItem(id);
            }
            break;
            case 'profile_about':{
                showHideFilterItem(id);
            }
            break;
        }
    }
    // Change state of profile__filter
    try{
        // Default
        filter('profile_home');
        const profile__filter = $('.profile-filter-list').querySelectorAll('.profile-filter-item');
        profile__filter.forEach(element => {
            element.onclick = ()=>{
                profile__filter.forEach(emt=>{
                    emt.classList.remove('active');
                });
                element.classList.add('active');
                filter(element.id);
            }
        });
    }catch(e){
        errorText += e;
    }
})();
( async ()=>{
    // Query Parameters
    const urlParam = new URL(`${window.location.href}`);
    const searchParams = urlParam.searchParams;
    if(searchParams.get('id') || userId){
        // Get information of profile
        const data = await profile(searchParams.get('id'))
        if(data){
            const account = data;
            $('.profile__avatar-img').src = url +account.avatarPath;
            $('#profile__background--img').src = url+account.backgroundPath;
            $('.profile__name').innerText = account.channelName;
            $('.profile__tag').innerText = "@"+account.username;
            $('.profile__bio').innerText = account.bio;
            $('.pr-about__day').innerText = account.dateOfBirth;
            $('.pr-about__email').innerText = account.email;
            $('.pr-about__createAt').innerText = account.dateCreated;
            $('#profile__figures--followers').innerText = account.followers + " Followers";
            $('#profile__figures--videos').innerText = account.videoCount;
            document.title = account.channelName + " | WIBUTAP";


            // Playlist
            const tabPlaylist = $('.profile__playlist');
            const containerPlaylist = $('.profile__video-list--playlist');
             const playlist = account.playlist.map(item =>{
                return `
                <div class="col-2 col-lg-3 col-md-4 col-sm-6">
                    <a href="${url}/watch.php?video=${item.firstVideo}&playlist=${item.playlistId}&ratio=1">
                        <div class="profile__video-playlist">
                            <div class="pr-video-item__img">
                                <div class="pr-video-item__img-banner">
                                    <div class="img-banner__info">
                                        <h3 class="img-banner__info-count">${item.count}</h3>
                                        <span>videos</span>
                                        <span><img src="${url}/assets/icons/playlist.svg" alt=""></span>
                                        <span class="text-fade">Public</span>
                                    </div>
                                </div>
                                <img src="${url}/assets/imgs/modern-tokyo-street-background.jpg" alt="">
                            </div>
                            <div class="pr-video-item__content">
                                <h3 class="pr-video-item__content-title">${item.playlistName}</h3>
                                <span class="pr-video-item__content-more text-fade d-block">View full playlist</span>
                            </div>
                        </div>
                    </a>
                </div>
                `;
            }).join("");
            containerPlaylist.innerHTML = playlist;
            tabPlaylist.innerHTML = playlist;
        }

        // Get videos of user
        const videosUser = await getVideosUser(searchParams.get('id'));
        if(videosUser){
            const tabUser = $('.profile__videos');
            const container = $('.profile__video-list--user');
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
            tabUser.innerHTML = list;
        }
    }else{
        console.log('error');
    }
    
})();