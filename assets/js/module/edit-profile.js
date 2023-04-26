import {$,$$} from './config.js';

(()=>{
    // Profile name
    $('#profilename').onfocus =()=>{
        let text = $('#profilename').innerText;
        if(text.length <= 20){
            const contentLimited = $('.profile__info-input--limited');
            contentLimited.setAttribute("data-after", "anything");
            console.log(contentLimited.getAttribute("data-after"));
        }
    }
})();