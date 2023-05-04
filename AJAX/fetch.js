import {$, $$, url} from '../assets/js/module/config.js';

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
export async function profile(id){
    const api = `${url}api/profile-info.php?userId=${id}`;
    const respone = await fetch(api);

    const data = await respone.json();
    if(data.status){
        return data.data;
    }else{
        return new { 
            status: data.status,
            header: "There is an error in connection or database"
        }
    }
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
export async function getVideo(id){
    const respone = await fetch(`${url}/api/video.php?id=${id}`)
    const data = await respone.json();
    if(data.status){
        return data.content;
    }else{
        return new { 
            status: data.status,
            header: "There is an error in connection or database"
        }
    }
}

// Get all video fromdatabase
export async function getAllVideo(){
    const respone = await fetch(`${url}/api/video-query.php`,{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify({type: "all"})
    });
    const data = await respone.json();
    if(data.status){
        return data.data;
    }else{
        return new { 
            status: data.status,
            header: "There is an error in connection or database"
        }
    }
    
}

// Get video trending
export async function getTrending(){
    const respone = await fetch(`${url}/api/video-query.php`,{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify({type: "trend"})
    });

    const data = await respone.json();
    if(data.status){
        return data.data;
    }else{
        return new { 
            status: data.status,
            header: "There is an error in connection or database"
        }
    }
}
// Get video recommend
export async function getRecommend(){
    const respone = await fetch(`${url}/api/video-query.php`,{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify({type: "all", })
    });
    const data = await respone.json();
    if(data.status){
        return data.data;
    }else{
        return new { 
            status: data.status,
            header: "There is an error in connection or database"
        }
    }
}
// Get video recommend
export async function getTopviews(){
    const respone = await fetch(`${url}/api/video-query.php`,{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify({type: "top"})
    });
    const data = await respone.json();
    if(data.status){
        return data.data;
    }else{
        return new { 
            status: data.status,
            header: "There is an error in connection or database"
        }
    }
}
// Get videos from user
export async function getVideosUser(id){
    const respone = await fetch(`${url}/api/video-query.php`,{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify({type: "user", id})
    });
    const data = await respone.json();
    if(data.status){
        return data.data;
    }else{
        return new { 
            status: data.status,
            header: "There is an error in connection or database"
        }
    }
}

export async function processPlaylist(){

}