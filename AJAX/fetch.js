import {$, $$, url} from '../assets/js/module/config.js';

// Search on bar
export async function search(title){

    const respone = await fetch('./api/video-query.php',{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "POST",
        body: JSON.stringify({type: "search", title})
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
            $('#reasdfasd').style.display = "none";
            $('.register__loading').style.display = "none";
        }else{
            const {status, error} = res;
            console.log(error);
            $('.register-form').style.display = "block";
            $('#reasdfasd').style.display = "block";
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
            $('.alert').innerText = "You failed to login";
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

export async function processPlaylist(type, info){
    // Create playlist
    if(type === "create-playlist"){

        const respone = await fetch(`${url}/api/playlist.php`,{
            headers: { 
                'Accept': 'application/json',
                'Content-Type': 'application/json; charset=utf-8'
            },
            method: "POST",
            body: JSON.stringify({type, userId: info.userId, name: info.name})
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
    // Get allplatlist
    else if(type === "query-playlist"){
        const respone = await fetch(`${url}/api/playlist.php`,{
            headers: { 
                'Accept': 'application/json',
                'Content-Type': 'application/json; charset=utf-8'
            },
            method: "POST",
            body: JSON.stringify({type, userId: info.userId})
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
    // Add playlist
    else if(type === "add-playlist"){
        const respone = await fetch(`${url}/api/playlist.php`,{
            headers: { 
                'Accept': 'application/json',
                'Content-Type': 'application/json; charset=utf-8'
            },
            method: "POST",
            body: JSON.stringify({type, playlistid: info.selectedPlaylist, videoid: info.videoId})
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
    // Query video from playlist
    else if(type === "query-video"){
        const respone = await fetch(`${url}/api/playlist.php`,{
            headers: { 
                'Accept': 'application/json',
                'Content-Type': 'application/json; charset=utf-8'
            },
            method: "POST",
            body: JSON.stringify(
                {type, 
                playlistid: info.playlistIdParam})
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
}

// Process comments
export async function processComment(type, info){
    // Post comment
    if(type === "post-comment"){
        const respone = await fetch(`${url}/api/video-function.php`,{
            headers: { 
                'Accept': 'application/json',
                'Content-Type': 'application/json; charset=utf-8'
            },
            method: "POST",
            body: JSON.stringify({
                type,
                userId: info.userId,
                videoId: info.videoId,
                comment: info.comment
            })
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
    }else if(type === "get-comment"){
        const respone = await fetch(`${url}/api/video-function.php`,{
            headers: { 
                'Accept': 'application/json',
                'Content-Type': 'application/json; charset=utf-8'
            },
            method: "POST",
            body: JSON.stringify({
                type,
                videoId: info.videoId,
            })
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
}

// Confirm account
export async function confirmAccount(token){
    const respone = await fetch(`${url}/api/verify-mail.php?token=${token}`,{
        headers: { 
            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=utf-8'
        },
        method: "GET",
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

// Edit profile
export async function editProfile(form){
    const respone = await fetch(`${url}/api/edit-profile.php`,{
        "Content-Type" :"multipart/form-data; boundary=----WebKitFormBoundaryyEmKNDsBKjB7QEqu",
        method: "POST",
        body: form
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