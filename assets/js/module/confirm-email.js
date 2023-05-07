import {$,$$, url} from './config.js';
import { confirmAccount } from '../../../AJAX/fetch.js';

(async ()=>{
    // Load query
    const urlParams = new URLSearchParams(window.location.search);
    const token = urlParams.get('confirm') ? urlParams.get('confirm') : undefined; 
    if(token){
        const data = await confirmAccount(token);
        if(data){
            console.log(data);
        }else{
            $('.confirm__success-img').src = url+"assets/icons/active-failed.png";
            $('.confirm__success-text').innerText = data.content;
            $('.confirm__loading-content').innerText = "Your token has been expired or invalid";
        }
    }
    
})();