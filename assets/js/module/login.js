import {$,$$} from './config.js';
import {showpass} from './validation.js';
import { login } from '../../../AJAX/fetch.js';
(()=>{
    showpass();
    
    $('#login').addEventListener("submit", (e)=>{
        e.preventDefault();
        const account = {
            email: $('#email').value,
            password: $('#password').value
        }

        // Fetch API
        login(account);
    });
})();