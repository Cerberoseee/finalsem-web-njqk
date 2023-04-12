const jqkapp = (()=>{
    const $ = document.querySelector.bind(document);

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

    // Show/hide password
    $('#showpass').addEventListener("click", ()=>{
        const showpassCheckbox = $('#showpass');
        if(showpassCheckbox.checked){
            $('#password').type = 'text';
            $('#re_password').type = 'text';

        }else{
            $('#password').type = 'password';
            $('#re_password').type = 'password';
        }
    });

    // Check fields from inputs
    $('#registerForm').addEventListener("submit", (e)=>{
        let flag = true;
        const form = $('#registerForm');
        const inputs = form.querySelectorAll('input');
        inputs.forEach(input =>{
            if(input.value){
                if(input.parentNode.querySelector('small')){
                    input.parentNode.querySelector('small').remove();   
                }
                flag = true;
            }else{
                // Insert error message into inputs
                if(!input.parentNode.querySelector('small')){
                    input.insertAdjacentHTML('afterend', `
                    <small class="alert-error">* Please enter your ${input.id}</small>`);  
                }
                flag = false;
                
            }
        });

        // Check pwd and repwd
        const pwd = $('#password');
        const repwd = $('#re_password');
        if(pwd.value !== repwd.value){
            if(!pwd.parentNode.querySelector('small') && !repwd.parentNode.querySelector('small')){
                pwd.insertAdjacentHTML('afterend', `
                <small class="alert-error">* The password and confirm password are not same</small>`);
                repwd.insertAdjacentHTML('afterend', `
                <small class="alert-error">* The password and confirm password are not same</small>`);
            }
            flag = false;
        }
        else if(pwd.value.length < 6){
            flag = false;
            pwd.insertAdjacentHTML('afterend', `
                <small class="alert-error">* Your password must be at least 6 chars</small>`);
        }
        else if(pwd.parentNode.querySelector('small') || repwd.parentNode.querySelector('small')){
            pwd.parentNode.querySelectorAll('small').forEach(item=> item.remove());
            repwd.parentNode.querySelectorAll('small').forEach(item=> item.remove());
            flag = false;
        }else{
            flag = true;
        }
        if(flag){
            // Object of account
            $('.register__loading').style.display = "block";
            $('.register-form').style.display = "none";

            const account = {
                username: $('#username').value,
                fullName: $('#firstname').value + ' ' +$('#lastname').value,
                email: $('#email').value,
                phone: $('#phone').value,
                password: $('#password').value,
                repassword: $('#re_password').value,
                dob: `${$('#years').value}-${$('#months').value}-${$('#days').value}`,
                gender: $('input[name="gender"]:checked').value? $('input[name="gender"]:checked').value: 'female'
            }
            fetch('./api/register.php',{
                headers: { 
                    'Accept': 'application/json',
                    'Content-Type': 'application/json; charset=utf-8'
                },
                method: "POST",
                body: JSON.stringify(account),
            })
            .then(res => res.json())
            .then((res)=>{
                
                if(res.data.register){

                    $('.register__success').style.display = "block";
                    $('.register__loading').style.display = "none";
                }else{
                    console.log(res.data);
                }
            })
            
        }
        e.preventDefault();
    });
    return{
        
    }
})();