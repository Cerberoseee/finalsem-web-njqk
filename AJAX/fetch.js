import {$, $$} from '../assets/js/module/config.js';
const url = sessionStorage.getItem("serverURL");
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