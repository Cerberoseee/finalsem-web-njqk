import {$, $$} from './config.js';
export function showpass(){
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
}
function showerror(msg, input){
    input.querySelector('small').innerText = msg;
}
export function validate(){
    let flag = true;
    let error = '';
    const form = $('#registerForm');
    const inputs_group = [...form.querySelectorAll('.form-input')];
    const input_forms = inputs_group.filter(input =>  input.querySelector('small'));
    input_forms.forEach(input_form =>{
        if(input_form.querySelector('input').value){
            input_form.querySelector('small').innerText = '';
            flag = true;
        }else{
            // Insert error message into inputs
            error = `* Please enter your ${input_form.querySelector('input').name}`
            showerror(error, input_form);
            return false;
            
        }
    });
    // Check pwd and repwd
    const pwd = $('#password');
    const repwd = $('#re_password');
    if(pwd.value !== repwd.value){
        showerror("* The password and confirm password are not same", pwd.parentNode);
        showerror("* The password and confirm password are not same", pwd.parentNode);
        flag = false;
    }else if(pwd.value.length < 6){
        showerror("* Your password must be at least 6 chars", pwd.parentNode);
        return false;
    }
    else{
        showerror("", pwd.parentNode);
        showerror("", pwd.parentNode);
        flag = true;
    }
    return flag;
}