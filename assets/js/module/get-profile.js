import {$,$$} from './config.js';
import { profile } from '../../../AJAX/fetch.js';

const profileApp = (()=>{

    // Query Parameters
    const url = new URL(`${window.location.href}`);
    const searchParams = url.searchParams;
    if(searchParams.get('id')){
        profile(searchParams.get('id'));
    }else{
        console.log('error');
    }
    
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