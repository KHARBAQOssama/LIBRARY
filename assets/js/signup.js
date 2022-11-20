            // get all inputs of signup form by id
            
            const form = document.getElementById('signup-form');
            const username = document.getElementById('username');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const password2 = document.getElementById('password2');

            



            form.addEventListener('submit',(e)=>{
                
                checkInputs();
                // 
                if(isForm1Valid() == true){
                    form.submit();
                }else{
                    e.preventDefault(); 
                }

                });

            

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

            



            function checkInputs(){
                // get values 
                const usernameValue = username.value.trim();
                const emailValue = email.value.trim();
                const passwordValue = password.value.trim();
                const password2Value = password2.value.trim();


                if(usernameValue == '')
                {
                    let error = document.getElementById("i1");
                    errorFound(error,username);
                }
                else if(emailValue == '' || !isEmail(emailValue))
                {
                    success(document.getElementById('i1'),username);
                    let error = document.getElementById("i2");
                    errorFound(error,email);
                }
                else if(passwordValue == '' )
                {
                    success(document.getElementById('i1'),username);
                    success(document.getElementById('i2'),email);
                    let error = document.getElementById("i3");
                    errorFound(error,password);
                }
                else if(passwordValue != password2Value)
                {   
                    success(document.getElementById('i1'),username);
                    success(document.getElementById('i2'),email);
                    success(document.getElementById('i3'),password);
                    let error = document.getElementById("i4");
                    errorFound(error,password2);
                }
                

            }                        

            function isForm1Valid(){
                const usernameValue = username.value.trim();
                const emailValue = email.value.trim();
                const passwordValue = password.value.trim();
                const password2Value = password2.value.trim();

                let result = true;
                if(usernameValue == '' || emailValue == '' || !isEmail(emailValue) ||  passwordValue == '' || passwordValue != password2Value ){
                    result = false;
                    
                }else{
                    success(document.getElementById('i1'),username);
                    success(document.getElementById('i2'),email);
                    success(document.getElementById('i3'),password);
                    success(document.getElementById('i4'),passwor2);
                }

                return result;
            }

            