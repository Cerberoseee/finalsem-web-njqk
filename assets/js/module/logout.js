import {$, $$, url} from './config.js';
import { logout } from '../../../AJAX/fetch.js';
(()=>{
    logout();
    window.location.href = url;
})();