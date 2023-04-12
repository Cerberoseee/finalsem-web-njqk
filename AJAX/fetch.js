import {$, $$} from '../assets/js/config.js';

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