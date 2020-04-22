function add_listener(){
    var submitThis = document.querySelector("#submit-this");

    submitThis.addEventListener("submit", function(event) {
        //event.preventDefault();
        final_check(event);
    });



}



function final_check(){



    var submitOk = 'true';
    var temp = document.querySelectorAll("input[type='text']");
    for (i = 0; i < temp.length; i++){
        if (temp[i].value == ""){
            temp[i].style.backgroundColor = "pink";
            temp[i].style.borderColor = "red";
            temp[i].placeholder = "Cannot be empty";
            submitOk = 'false';

        }
        else{
            temp[i].style.backgroundColor = null;
            temp[i].style.borderColor = null;
        }
    }

    var temp = document.querySelectorAll("input[type='password']");
    for (i = 0; i < temp.length; i++){
        if (temp[i].value == ""){
            temp[i].style.backgroundColor = "pink";
            temp[i].style.borderColor = "red";
            temp[i].placeholder = "Cannot be empty";
            submitOk = 'false';

        }
        else{
            temp[i].style.backgroundColor = null;
            temp[i].style.borderColor = null;
        }
    }


    var fname = document.getElementById("firstname");
    var lname = document.getElementById("lastname");
    var uname = document.getElementById("username");
    var email = document.getElementById("email");
    var password = document.getElementById("signuppassword");
    var confirmPassword = document.getElementById("signupconfirm");


    if (uname.value.length < 6) {
        uname.style.backgroundColor = "pink";
        uname.style.borderColor = "red";
        uname.value = "";
        uname.placeholder = "Must contain at least 6 chars. (int & str)";
        submitOk = 'false';
    }
    else{
        if (/^(?=.*[a-zA-Z0-9]).{6,20}$/.test(uname.value) == false){
            uname.style.backgroundColor = "pink";
            uname.style.borderColor = "red";
            uname.value = "";
            uname.placeholder = "Must contain one int and one str.";
            submitOk = 'false';
        }
    }



    if (password.value.length < 6) {
        password.style.backgroundColor = "pink";
        password.style.borderColor = "red";
        password.value = "";
        password.placeholder = "Must contain 6-20 chars. (int & str)";
        submitOk = 'false';
    }
    else{
        if (/^(?=.*[a-zA-Z0-9]).{6,20}$/.test(password.value) == false){
            password.style.backgroundColor = "pink";
            password.style.borderColor = "red";
            password.value = "";
            password.placeholder = "Must contain one int and one str.";
            submitOk = 'false';
        }
    }





    if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value) == false){
        email.style.backgroundColor = "pink";
        email.style.borderColor = "red";
        email.value = "";
        email.placeholder = "Must be in format aaa@aaa.aaa";
        submitOk = 'false';
    }


    if (confirmPassword.value !== password.value){
        confirmPassword.style.backgroundColor = "pink";
        confirmPassword.style.borderColor = "red";
        confirmPassword.value = "";
        confirmPassword.placeholder = "Does not match password";
        submitOk = 'false';
    }


    if (submitOk == 'false'){
        event.preventDefault();
        return;
    }





}

