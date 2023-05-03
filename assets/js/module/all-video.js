import {$,$$} from './config.js';
import { getAllVideo } from '../../../AJAX/fetch.js';
(()=>{
    // Get all videos

    getAllVideo($('.profile__video-list--all'));
})();