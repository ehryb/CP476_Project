
var userData;
var stringVal;
$(function(){
        $.get("getData.php")
          .done(function(data) {
                userData  = jQuery.parseJSON(data);
                stringVal = data;

          })
          .fail(function (jqXHR) {
              alert("Error: " + jqXHR.status);
          })
          .always(function () {
              console.log("Request finished");
          });
});




function add_listener(){
    var submitThis = document.querySelector("#submit-this");
    var changeThis = document.querySelector("#change-this");

    submitThis.addEventListener("submit", function(event) {
        //event.preventDefault();
        final_check(event);
    });

     changeThis.addEventListener("submit", function(event) {
        //event.preventDefault();
        edit_AccountCheck(event);
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

    email_verify = 'true';
    username_verify = 'true';



    if (submitOk == 'false'){
        event.preventDefault();
        return;
    }
    else{
        for (i=0; i< userData.length; i++){

            if (userData[i]["UserName"] === uname.value){
                    username_verify = 'false'
                    uname.style.backgroundColor = "pink";
                    uname.style.borderColor = "red";
                    uname.value = "";
                    uname.placeholder = "Uname already exists";
                    submitOk = 'false';


                }
                if (userData[i]["Email"] === email.value){
                    email.style.backgroundColor = "pink";
                    email.style.borderColor = "red";
                    email.value = "";
                    email.placeholder = "Email already exists";
                    submitOk = 'false';


                }
            }
        if (submitOk == 'false'){
            event.preventDefault();
            return;
        }


    }





}








function edit_AccountCheck(){

    var temp = document.querySelectorAll("input");
    for (i = 0; i < temp.length; i++){
        if (temp[i].placeholder.length > 0 || temp[i].value.length > 0){
            temp[i].placeholder = "";
            temp[i].style.backgroundColor = null;
            temp[i].style.borderColor = null;
        }
    }





    var submitOk = 'true';




    var newUser = document.getElementById("newusername");
    var newPass = document.getElementById("newpassword");
    var confirmPass = document.getElementById("confirmpassword");
    var newEmail = document.getElementById("newemail");


    if (newPass.value.length == 0 && confirmPass.value.length == 0 && newEmail.value.length == 0 && newUser.value.length == 0){
        newUser.style.backgroundColor = "pink";
        newUser.style.borderColor = "red";
        newUser.value = "";
        newUser.placeholder = "Must enter input to change";
        submitOk = 'false';

    }



    // if newUser is not empty
    if (newUser.value.length > 0){
        //if not empty but not the correct length
        if (newUser.value.length < 6){
            newUser.style.backgroundColor = "pink";
            newUser.style.borderColor = "red";
            newUser.value = "";
            newUser.placeholder = "Must contain at least 6 chars. (int & str)";
            submitOk = 'false';
        }
        else{
            if (/^(?=.*[a-zA-Z0-9]).{6,20}$/.test(newUser.value) == false){
                newUser.style.backgroundColor = "pink";
                newUser.style.borderColor = "red";
                newUser.value = "";
                newUser.placeholder = "Must contain one int and one str.";
                submitOk = 'false';
            }
        }
    }

    // if new password has been added
    if (newPass.value.length > 0){
        if (newPass.value.length < 6) {
            newPass.style.backgroundColor = "pink";
            newPass.style.borderColor = "red";
            newPass.value = "";
            newPass.placeholder = "Must contain 6-20 chars. (int & str)";
            submitOk = 'false';
        }
        else{
            if (/^(?=.*[a-zA-Z0-9]).{6,20}$/.test(newPass.value) == false){
                newPass.style.backgroundColor = "pink";
                newPass.style.borderColor = "red";
                newPass.value = "";
                newPass.placeholder = "Must contain one int and one str.";
                submitOk = 'false';
            }
        }

    }

    if ((newPass.value.length == 0 && confirmPass.value.length >0)  || (confirmPass.value != newPass.value)){
        newPass.style.backgroundColor = "pink";
        newPass.style.borderColor = "red";
        newPass.value = "";
        newPass.placeholder = "Does not match confirm password";

        confirmPass.style.backgroundColor = "pink";
        confirmPass.style.borderColor = "red";
        confirmPass.value = "";
        confirmPass.placeholder = "Does not match password";
        submitOk = 'false';
    }



    if (newEmail.value.length > 0){
        if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(newEmail.value) == false){
            newEmail.style.backgroundColor = "pink";
            newEmail.style.borderColor = "red";
            newEmail.value = "";
            newEmail.placeholder = "Must be in format aaa@aaa.aaa";
            submitOk = 'false';
        }
    }






    if (submitOk == 'false'){
        event.preventDefault();
        return;
    }

    else{
        for (i=0; i< userData.length; i++){
            if (userData[i]["UserName"] === newUser.value && newUser.value != ""){
                username_verify = 'false'
                newUser.style.backgroundColor = "pink";
                newUser.style.borderColor = "red";
                newUser.value = "";
                newUser.placeholder = "Uname already exists";
                submitOk = 'false';
            }

            if (userData[i]["Email"] === newEmail.value && newEmail.value != ""){
                newEmail.style.backgroundColor = "pink";
                newEmail.style.borderColor = "red";
                newEmail.value = "";
                newEmail.placeholder = "Email already exists";
                submitOk = 'false';
            }


        }
        if (submitOk == 'false'){
            event.preventDefault();
            return;
        }


    }

}

