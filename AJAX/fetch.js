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
    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];
    const formData = new FormData();
    formData.append('file', file);

    const xhr = new XMLHttpRequest();

    xhr.upload.addEventListener('progress', (event) => {
    if (event.lengthComputable) {
        const progressPercentage = Math.round((event.loaded / event.total) * 100);
        console.log(`Upload progress: ${progressPercentage}%`);
    }
    });

    xhr.open('POST', 'upload.php');
    xhr.onload = () => {
    if (xhr.status === 200) {
        console.log('File uploaded successfully:', xhr.responseText);
    } else {
        console.error('Failed to upload file:', xhr.statusText);
    }
    };
    xhr.onerror = () => {
    console.error('Failed to upload file:', xhr.statusText);
    };
    xhr.send(formData);

    // var xhr = new XMLHttpRequest();
    // xhr.open("post", `${url}api/upload-video.php`);
    // xhr.upload.addEventListener("progress", ({loaded, total})=>{
    //     let fileLoad = Math.floor((loaded / total) * 100);
    //     let fileTotal = Math.floor(total / 1000);
        
    //     var proHTML = `
    //     <span>
    //         <i class="fa-solid fa-upload"></i>
    //         </span>
    //         <span>
    //             Uploading... <span id="percent__numbers">${fileLoad}</span>%
    //         </span>
    //     <span class="upload__percent-progress"></span>
    //     `;
    //     $('upload__percent').innerHTML = proHTML;
    // });
    // xhr.send(form);
}