import {$,$$} from './config.js';
import { search } from '../../../AJAX/fetch.js';
(()=>{
    const urlParams = new URLSearchParams(window.location.search);
    const query = urlParams.get('query');
    console.log(query);

    search(query);
})();