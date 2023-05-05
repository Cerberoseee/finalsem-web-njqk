import {$,$$, url, userId} from './config.js';
import { getVideo, processPlaylist, processComment } from '../../../AJAX/fetch.js';
(async ()=>{
    // Load video
    const urlParams = new URLSearchParams(window.location.search);
    const videoId = urlParams.get('video');
    
    const data = await getVideo(videoId);
    if(data){
        const video = data;
        console.log(video);
        $('.video__title').innerText = video.name;
        $('#views__span').innerText = video.views;
        $('#like__span').innerText = video.likeCount;
        $('#dislike__span').innerText = video.dislikeCount;
        $('#datetime__span').innerText = video.uploadTime;
        $('#video__creater-avt--img').src = "api"+video.avatarPath;
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
    }

    // Download video
    $('#download-video').onclick=()=>{
        const downloadLink = document.createElement("a");
        downloadLink.href = $('#player').src;
        downloadLink.download = "Video.mp4";
        downloadLink.click();
    }
    // Get the playlist
    const playlist = await processPlaylist("query-playlist", {userId});
    if(playlist && playlistRender(playlist));

    // Create a new playlist
    $('#create-playlist').onclick = async ()=>{
        let name = $('#playlist-text').value;
        name = name.replaceAll('  ', ' ');
        if(name && userId){
            const createPlaylist = await processPlaylist("create-playlist",{ userId, name});
            if(createPlaylist && playlistRender(createPlaylist));
        }
    }
    // Save to playlist
    $('#save-playlist').onclick = async ()=>{
        const selectedPlaylist = $('input[name="playlist_name"]:checked').value;
        if(selectedPlaylist){
            const selectedPlaylist_Add = await processPlaylist("add-playlist", {videoId, selectedPlaylist})
            if(selectedPlaylist_Add){
                $('#alert-add-platlist').innerText = "Adding this video is success!";
            }
        }
    }

    // Post comment
    $('#post-cmt').onclick = async ()=>{
        let comment = $('#comments__post-textarea').value;
        comment = comment.replaceAll('  ', ' ');
        if(comment && userId){
            const postCmt = await processComment("post-comment", {
                userId, comment, videoId
            });
            if(postCmt){
                $('#comments__post-textarea').value = "";
                $('#comments__post-textarea').style.cssText = `
                    height: 2.5rem;
                    outline: none;
                `;
                $('.comments__textarea-func').style.display = "none";
            }
        }
    }

    // Load playlist
    const playlistIdParam = urlParams.get('playlist');
    const videosPlaylist = await processPlaylist("query-video", {playlistIdParam})
    const listPlaylist = videosPlaylist.map((item, index) => {
        const ratio = urlParams.get('ratio');
        if(item.name.length >= 20){
            item.name = item.name.slice(0,20) + "...";
        }
        return `
        <div class="video__playlist-item ${ratio == index + 1? "video__playlist-item--active" : ""} my-1">
            <a class="d-block w-100" href="${url}/watch.php?video=${item.videoId}&playlist=${item.playlistId}&ratio=${index+1}">
                <div class="video__thumb">
                    <span class="video__thumb-timer">00:07</span>
                    <img src="${url+item.thumbnailPath}" alt="">
                </div>
                <div class="video__contents ">
                    <h4 class="video__heading">${item.name}</h4>
                    <div class="video__details">
                        <span class="mr-h-5">${item.uploadTime} • ${item.views}</span>
                    </div>
                    <div class="video__author">
                        <span class="video__author-avt"><img src="${url+item.avatarPath}" alt=""></span>
                        <span class="video__author-name">${item.channelName}</span>
                    </div>
                </div>
            </a>
        </div>
        `;
    }).join("");
    $('.video__playlist-list').innerHTML = listPlaylist;
})();

function playlistRender(playlist){
    let playlistContainer = $('.playlist__list');
    const list = playlist.map(item => {
        return `
        <li class="playlist__item">
            <input class="mr-h-5" type="radio" name="playlist_name" id="${item.playlistId}" value="${item.playlistId}">
            <label for="">${item.playlistName}</label>
        </li>
        `;
    }).join("");
    playlistContainer.innerHTML = list;
}