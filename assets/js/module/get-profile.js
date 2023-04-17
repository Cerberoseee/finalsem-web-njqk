import {$,$$} from './config.js';
import { profile } from '../../../AJAX/fetch.js';

(()=>{
    const url = new URL(`${window.location.href}`);
    const searchParams = url.searchParams;
    if(searchParams.get('id')){
        profile(searchParams.get('id'));
    }else{
        console.log('error');
    }
    
})();