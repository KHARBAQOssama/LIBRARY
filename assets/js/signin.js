// get all inputs of signin form by id
const signInForm = document.getElementById('signin-form');
const emailIn = document.getElementById('emailIn');
const passwordIn = document.getElementById('passwordIn');


signInForm.addEventListener('submit',(e)=>{
    checkSignIn();
    if(isForm2Valid() == true){
        signInForm.submit();
    }else{
        e.preventDefault(); 
    }
});

function checkSignIn(){
    const emailValue = emailIn.value.trim();
    const passwordValue = passwordIn.value.trim();

    if(emailValue == '' || !isEmail(emailValue)){
        let error = document.getElementById("i6");
        errorFound(error,emailIn);
    }else if(passwordValue == '' ){
        success(document.getElementById('i6'),emailIn);
        let error = document.getElementById("i7");
        errorFound(error,passwordIn);
    }


}

function isForm2Valid(){
    const emailValue = emailIn.value.trim();
    const passwordValue = passwordIn.value.trim();


    let result = true;
    if(emailValue == '' || !isEmail(emailValue) ||  passwordValue == ''){
        result = false;
    }

    return result;
}










function errorFound(x,y){
    x.className= 'bi bi-exclamation-circle fs-6 position-absolute start-100 text-danger visible';
    y.className = 'form-control rounded-0 fillout';
}
function success(x,y){
    x.className= 'bi bi-check fs-6 position-absolute start-100 text-success visible';
    y.className = 'form-control rounded-0 success';
}
function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}