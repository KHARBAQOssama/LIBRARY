const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const signup = document.getElementById('signup-form');
const submitSup = document.getElementById('submitSup');

function nameRegex(value){
    let pattern = / ^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/;
    return pattern.test(value);
}

function emailRegex(value){
    let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return pattern.test(value);
}

function passwordRegex(value){
    let pattern = /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;
    return pattern.test(value);
}

var validName = false;
var validEmail = false;
var validPass = false;
var validPass2 = false;

username.addEventListener('keyup',function(e){
    let error = document.getElementById('error1');
    if(nameRegex(e.target.value) && e.target.value != ''){
        error.style.opacity = '0';
        username.classList = 'form-control rounded-0';
        validName = true ;
    }else{
        error.style.opacity = '1';
        username.classList = 'form-control rounded-0 red';
    }
})
