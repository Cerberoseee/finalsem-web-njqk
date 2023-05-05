import { profile, search } from '../../AJAX/fetch.js';
import {$, $$, url} from './module/config.js';
import { exportRecomended, exportTopviews} from './module/all-video.js';
const app = (()=>{
    let errorText = '';
    try{
        // Navigation sticky
        window.addEventListener("scroll", ()=> {
            const navbar = $(".sticky-nav");
            navbar?.classList.toggle("sticky", window.scrollY > 0);
        });

        $('.nav__menu').onclick =()=> $('.nav__menu-list').style.display = 'block';
        
        $('#close-menu').onclick =()=> $('.nav__menu-list').style.display = 'none';
    }
    catch(e){
        errorText += e;
    }

    try{
        $('#category-show').onclick ??=()=>{
            if($('#category-list').style.display == 'block'){
                $('#category-list').style.display = 'none';
                $('#category-icon').innerHTML = `<i class="fa-solid fa-caret-down"></i>`;
            }else{
                $('#category-list').style.display = 'block';
                $('#category-icon').innerHTML = `<i class="fa-solid fa-caret-up"></i>`;
            }
        }
    }catch(e){
        errorText += e;
    }
    
    try{
        // Change state of btn group
        const btn_groups = $$('.btn-group');
        btn_groups?.forEach(btn_group=>{
            const btn_items = btn_group.querySelectorAll('button');
            btn_items.forEach(item=>{
                item.onclick = ()=>{
                    btn_items.forEach(btn_itms=>{
                        btn_itms.classList.remove('active');
                    })
                    item.classList.add('active');
                }
            });
        });
    }
    catch(e){
        errorText += e;
    }

    try{
        // Change state of recommend tab
        const tabsState = {
            state: "recommened__tab",
            setState(param){
                if(param !== this.state){
                    this.default();
                    this.state = param;

                    if(this.state === "top-views__tab"){
                        $(`#${this.state}`).classList.add('active');
                        exportTopviews();

                    }else if(this.state === "recommened__tab"){
                        $(`#${this.state}`).classList.add('active');
                        exportRecomended();
                    }else{
                        console.log("This state is not exist!");
                    }
                }
            },
            default(){
                $(`#${this.state}`).classList.remove('active');
            }
        }
        // First loading
        $(`#${tabsState.state}`).classList.add('active');
        exportRecomended();
        // Chnage state
        const tabs_recmd = $('.video__recommends-tab').querySelectorAll('button');
            tabs_recmd?.forEach(element => {
                element.onclick = ()=>{
                    tabsState.setState(element.id);
                }
            });
    }catch(e){
        errorText += e;
    }
    
    try{
        
        $$('.cmt__list-item').forEach(item=>{
            item.querySelector('.show__reply-btn').onclick =()=>{
                if(item.querySelector('.cmt__item-reply').style.display === 'block'){
                    item.querySelector('.show__reply-btn').innerHTML = "SHOW REPLIES ▲";
                    item.querySelector('.cmt__item-reply').style.display = "none";
                }else{
                    item.querySelector('.show__reply-btn').innerHTML = "SHOW REPLIES ▼";
                    item.querySelector('.cmt__item-reply').style.display = "block";
                }
            }
        }) 
    }catch(e){
        errorText += e;
    }

    
    try{
        $('.btn__create-follow').onclick =()=>{
            $('.btn__create-follow').innerHTML = `Followed <small><i class="fa-solid fa-check"></i></small>`;
        }
    }catch(e){
        errorText += e;
    }
    
    try{
        $('.nav__notification-icon').onclick =()=>{
            if($('.nav__noti-list').style.display === 'block'){
                $('.nav__noti-list').style.display = "none";
            }else{
                $('.nav__noti-list').style.display = "block";
            }
        }
    }catch(e){
        errorText+=e;
    }

    
    // Account navigation
    try{
        $('#nav__avatar-id').onclick = ()=>{
            if($('.nav__profile-options').style.display == "block"){
                $('.nav__profile-options').style.display = "none";
            }else{
                $('.nav__profile-options').style.display = "block";
            }
        }
        
    }
    catch(e){
        errorText += e;
    }
    // Share video
    try{
        $('#share-video').onclick =()=>{
            if($('.share__popup').style.display !== "block"){
                $('.share__popup').style.display = "block";
                $('.share__popup--src').value = window.location.href;
                $('.video-container').style.filter = "blur(5px)";
            }
        }
        $('.share__popup-exit').onclick=()=>{
            $('.share__popup').style.display = "none";
            $('#copy-link').innerHTML = "Copy";
            $('.video-container').style.filter = "none";
        }
        $('#copy-link').onclick=()=>{
            navigator.clipboard.writeText($('.share__popup--src').value);
            $('#copy-link').innerHTML = "Copied !";
        }
    }
    catch(e){
        errorText+=e;
    }

    // Search video
    try{
        const query = $('.nav_search-input');
        query.addEventListener("keyup", e =>{
            if(e.key === "Enter"){
                window.location.href = `${url}/search.php?query=${query.value}`;
            }
        })
        
        $('#nav__search-icon').onclick=()=>{
            window.location.href = `${url}/search.php?query=${query.value}`;
        }
    }catch(e){
        errorText+=e;
    }

    //more option
    try{
        $('#more-options').onclick =()=>{
            if($('.more__options').style.display === "block"){
                $('.more__options').style.display = "none";
            }else{
                $('.more__options').style.display = "block";
            }
        }
    }catch(e){
        errorText+=e;
    }

    //add to playlist
    try{
        $('#add-playlist').onclick =()=>{
            if($('.playlist__popup').style.display !== "block"){
                $('.playlist__popup').style.display = "block";
                $('.video-container').style.filter = "blur(5px)";
            }
            $('.playlist__popup-exit').onclick=()=>{
                $('.playlist__popup').style.display = "none";
                $('.video-container').style.filter = "none";
            }
        }
    }catch(e){
        errorText+=e;
    }
    // Focus on comment
    try{
        $('#comments__post-textarea').onfocus =()=>{
            $('#comments__post-textarea').style.cssText = `
                height: 5rem;
                outline: var(--primary-color-light) solid 1px;
            `;
            $('.comments__textarea-func').style.display = "block";
        }
        $('#cancel-cmt').onclick = ()=>{
            $('#comments__post-textarea').value = "";
            $('#comments__post-textarea').style.cssText = `
                height: 2.5rem;
                outline: none;
            `;
            $('.comments__textarea-func').style.display = "none";
        }
    }
    catch(e){
        errorText+=e;
    }
    console.error(errorText);
})();
