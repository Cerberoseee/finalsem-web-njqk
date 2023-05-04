import {$,$$, url} from './config.js';
import { getVideo } from '../../../AJAX/fetch.js';
(async ()=>{
    const urlParams = new URLSearchParams(window.location.search);
    const data = await getVideo(urlParams.get('video'));
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
    }else{
        console.log(data);  
    }

    $('#download-video').onclick=()=>{
        const downloadLink = document.createElement("a");
        downloadLink.href = $('#player').src;
        downloadLink.download = "Video.mp4";
        downloadLink.click();
    }
})();