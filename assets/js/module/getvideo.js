import {$,$$} from './config.js';
import { getVideo } from '../../../AJAX/fetch.js';
(()=>{
    const urlParams = new URLSearchParams(window.location.search);
    getVideo(urlParams.get('video'));
})();