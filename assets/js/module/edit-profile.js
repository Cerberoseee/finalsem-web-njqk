import {$,$$, url, userId} from './config.js';
import { editProfile } from '../../../AJAX/fetch.js';

(()=>{
    let dayOptions = "";
    for(let i = 1; i <= 31; i++){
        dayOptions+= `
            <option name="day" value="${i}">${i}</option>
        `;
    }
    $('#days').innerHTML = dayOptions;

    let monthOptions = "";
    for(let i = 1; i <= 12; i++){
        monthOptions+= `
            <option name="month" value="${i}">${i}</option>
        `;
    }
    $('#months').innerHTML = monthOptions;

    let yearOptions = "";
    for(let i = 1990; i <= 2100; i++){
        yearOptions+= `
            <option name="year" value="${i}">${i}</option>
        `;
    }
    $('#years').innerHTML = yearOptions;

    let avatarFile = "";
    const avtUrl = $('.profile__avatar-img').src;
    var filename = avtUrl.substring(avtUrl.lastIndexOf('/')+1);
    fetch(avtUrl)
    .then(async  (response) => {
        const contentType = response.headers.get('content-type');
        const blob = await response.blob();
        const file = new File([blob], filename, { contentType });
        avatarFile = file;
    })
    const inputAvatar = document.createElement("input");
    inputAvatar.type = "file";
    // Change avatar
    $('#avatar-change').onclick = ()=>{
        inputAvatar.click();
    }
    inputAvatar.addEventListener("change", (e)=>{
        const file = e.target.files[0];
        avatarFile = file;
        $('.profile__avatar-img').src = URL.createObjectURL(file);
        
    });

    let backgroundFile = "";
    const bgUrl = $('#profile__background--img').src;
    var filename = bgUrl.substring(bgUrl.lastIndexOf('/')+1);
    fetch(bgUrl)
    .then(async  (response) => {
        const contentType = response.headers.get('content-type');
        const blob = await response.blob();
        const file = new File([blob], filename, { contentType });
        backgroundFile = file;
    })
    const inputBackground = document.createElement("input");
    inputBackground.type = "file";
    // Change background
    $('#background-change').onclick = ()=>{
        inputBackground.click();
    }
    inputBackground.addEventListener("change", (e)=>{
        const file = e.target.files[0];
        backgroundFile = file;
        $('#profile__background--img').src = URL.createObjectURL(file);
        
    });

    $('#save').onclick= async ()=>{
        
        // Get all radio buttons with the name "gender"
        const genderRadios = document.getElementsByName("gender");

        // Loop through all the radio buttons to find the checked one
        let selectedGender = "";
        for (let i = 0; i < genderRadios.length; i++) {
            if (genderRadios[i].checked) {
                selectedGender = genderRadios[i].value;
                break;
            }
        }
        // Get the dropdown element
        var dropdownDays = document.getElementById("days");

        // Get the selected option's value
        var day = dropdownDays.value;

        // Get the dropdown element
        var dropdownMonths = document.getElementById("months");

        // Get the selected option's value
        var month = dropdownMonths.value;

        // Get the dropdown element
        var dropdownYears = document.getElementById("years");

        // Get the selected option's value
        var year = dropdownYears.value;

        var dob = `${year}-${month}-${day}`;
        // Create a form to fetch
        let formData = new FormData();
        formData.append('userId', userId);
        formData.append('avatar', avatarFile);
        formData.append('background', backgroundFile);
        formData.append('channelName', $('#profilename').innerText);
        formData.append('username', $('.profile__tag').innerText);
        formData.append('bio', $('.profile__bio').innerText);
        formData.append('about', $('.profile__about').innerText);
        formData.append('email', $('.profile__email').innerText);
        formData.append('gender', selectedGender);
        formData.append('dob', dob);
        formData.append('location', $('.profile__location').innerText);

        // Fecth to API
        const data = await editProfile(formData);
        if(data){
            window.location.href = url+"/account/profile.php?id="+userId;
        }else{
            console.log("error"+data);
        }
    }
})();