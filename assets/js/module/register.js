import {$, $$} from './config.js';
import {showpass, validate} from './validation.js';
import { register } from '../../../AJAX/fetch.js';
const jqkapp = (()=>{

    function render(){
        // Render values of days
        const days = $('#days');
    
        let dayValues = '';
        for(let i = 1; i <= 31; i++){
            dayValues+=`<option value="${i}">${i}</option>`;
        }
        days.innerHTML = dayValues;
        // Render values of months
        const months = $('#months');
        let monthValues = '';
        for(let i = 1; i <= 12; i++){
            monthValues+=`<option value="${i}">${i}</option>`;
        }
        months.innerHTML = monthValues;
        // Render values of years
        const years = $('#years');
        let yearValues = '';
        for(let i = new Date().getFullYear(); i >= 1900 ; i--){
            yearValues += `<option value="${i}">${i}</option>`;
        }
        years.innerHTML = yearValues;
    }
    render();
    // Show/hide password of register form
    showpass();

    // Check fields from inputs
    $('#registerForm').addEventListener("submit", (e)=>{
        e.preventDefault();
        if(validate()){
            // Object of account
            $('.register__loading').style.display = "block";
            $('.register-form').style.display = "none";

            // Prepare data to send
            const account = {
                username: $('#username').value,
                fullName: $('#firstname').value + ' ' + $('#lastname').value,
                email: $('#email').value,
                phone: $('#phone').value,
                password: $('#password').value,
                repassword: $('#re_password').value,
                dob: `${$('#years').value}-${$('#months').value}-${$('#days').value}`,
                gender: $('input[name="gender"]:checked').value? $('input[name="gender"]:checked').value: 'female'
            }
            // Call API
            register(account);
        }
    });
    return{
        
    }
})();