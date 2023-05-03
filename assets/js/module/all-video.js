import {$,$$} from './config.js';
import { getAllVideo, getTrending, getRecommend } from '../../../AJAX/fetch.js';
(()=>{
    // Get all videos
    getAllVideo($('.profile__video-list--all'));
    // Get trending videos
    getTrending($('.video__trending-list'));
    // Get recommended videos
    getRecommend($('.profile__video-list--recommend'));
})();