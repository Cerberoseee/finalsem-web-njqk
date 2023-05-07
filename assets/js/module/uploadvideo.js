import {$,$$} from './config.js';
import { upload_video } from '../../../AJAX/fetch.js';
(()=>{
    const stepSate = {
        state: 0,
        showContent(node){
            // node.style.display = "block";
            node.style = "display: block;";
        },
        setState(param){
            if(this.state !== param){
                if(param === 1){
                    $('.upload__footer-backward').querySelector('button').style.display = "none";
                }else{
                    $('.upload__footer-backward').querySelector('button').style.display = "block";
                }
                if(param === 5){
                    $('.upload__footer-forward').querySelector('button').style.display = "none";
                    $('#btn_confirm').style.display = "block";
                }else if(param > 5){
                    $('.upload__footer-forward').querySelector('button').style.display = "none";
                    $('#btn_confirm').style.display = "none";
                }
                else{
                    $('#btn_confirm').style.display = "none";
                    $('.upload__footer-forward').querySelector('button').style.display = "block";
                }
                defaultState();
                this.state = param;
                switch(this.state){
                    case 1:{
                        const step_block = $('#step_1');
                        activeBar(step_block);
                        this.showContent($('.upload__content'));
                    }
                    break;
                    case 2:{
                        const step_block = $('#step_2');
                        activeBar(step_block);
                        this.showContent($('.upload__info'));
                    }
                    break;
                    case 3:{
                        const step_block = $('#step_3');
                        activeBar(step_block);
                        this.showContent($('.upload__thumbnail'));
                    }
                    break;
                    case 4:{
                        const step_block = $('#step_4');
                        activeBar(step_block);
                        this.showContent($('.upload__stric'));
                        $('#video-confirm-src').src = $('#video__preview-src').src;
                        $('#text-videoname').innerText = $('#title').value;
                        $('#desc__preview').innerText = $('#desc').value;
                        $('#tags__preview').innerText = $('#tags').value;
                    }
                    break;
                    case 5:{
                        const step_block = $('#step_5');
                        activeBar(step_block);
                        this.showContent($('.upload__confirm'));
                    }
                    break;
                }
            }
        }
    }
    stepSate.setState(1);
    const steps = $$('.processes__step');
    for(let i = 1; i <= steps.length; i++){
        steps[i-1].onclick = ()=> {
            stepSate.setState(i);
        }
    }
    
    // Backward
    $('.upload__footer-backward').onclick = ()=>{
        stepSate.setState(stepSate.state - 1);
    }
    $('.upload__footer-forward').onclick = ()=>{
        stepSate.setState(stepSate.state + 1);
    }
    // Progress bar
    function defaultState(){
        const processSteps = $$('.processes__step');
        processSteps.forEach(step => {  
            if(step.querySelector('.step__bar').classList.contains('step__bar--active')){
                step.querySelector('.step__bar').classList.remove('step__bar--active');
            }
            if(step.querySelector('.step__title').classList.contains('step__title--active')){
                step.querySelector('.step__title').classList.remove('step__title--active')
            }
        });
        $('.upload__content').style.display = "none";
        $('.upload__info').style.display = "none";
        $('.upload__thumbnail').style.display = "none";
        $('.upload__stric').style.display = "none";
        $('.upload__confirm').style.display = "none";
    }
    function activeBar(node){
        node.querySelector('.step__bar').classList.add('step__bar--active');
        node.querySelector('.step__title').classList.add('step__title--active');
        node.querySelector('input').checked = true;
    }


    const selectVideo = $('#upload_input'); //For upload video
    const selectThumbnail = $('#upload_thumb'); //For upload thumbnail
    

    
    const formUpload = {
        userId: JSON.parse(sessionStorage.profile).userId,
        video: "",
        thumbnail: "",
        title: "",
        description: "",
        tags: "",
        age_restric: "",
    }
    // Select file for video
    selectVideo.onclick=()=>{
        let input = document.createElement('input');
        input.type = 'file';
        input.onchange = ()=>{
            let files = Array.from(input.files);
            // 10MB in bytes
            if (files[0].size > 10485760) {
                $('#alert-upload').style.display = "block";
                $('#alert-upload').innerText = "File size exceeds the maximum limit of 10MB.";
            }else{
                $('#alert-upload').style.display = "none";
                const tempVideo = URL.createObjectURL(files[0]);
                $('.video__preview').style.display = "block";
                $('#video__preview-src').src = tempVideo;
                formUpload.video = files[0];
                formUpload.title = files[0]['name'];
                $('#title').value = formUpload.title;
            }
        }
        input.click();
    }

    // Select file for thumbnail
    selectThumbnail.onclick=()=>{
        let input = document.createElement('input');
        input.type = 'file';
        input.onchange = ()=>{
            let files = Array.from(input.files);
            console.log(files[0]);
            const preview = $('.thumbnail__preview');

            if(files[0]){
                preview.style.display = "block";
                let tempUrl = URL.createObjectURL(files[0]);
                preview.querySelector('img').src = tempUrl;
                formUpload.thumbnail = files[0];
            }
        }
        input.click();
    }

    $('#btn_confirm').onclick =()=>{
        formUpload.title = $('#title').value;
        formUpload.description = $('#desc').value;
        formUpload.tags = $('#tags').value;
        formUpload.age_restric = $('input[name="age"]:checked').value;
        console.log(formUpload);
        upload_video(formUpload);
    }

})();