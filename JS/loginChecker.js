var userData;
$(function(){
        $.get("getData.php")
          .done(function (data) {
                userData  = jQuery.parseJSON(data);

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

    submitThis.addEventListener("submit", function(event) {
        //event.preventDefault();
        final_login(event);
    });
}


function final_login(){
    var uname = document.getElementById("username");
    var password = document.getElementById("password");

    if (uname.value == ""){
        uname.style.backgroundColor = "pink";
        uname.style.borderColor = "red";
        uname.placeholder = "Cannot be empty";
        submitOk = 'false';
    }

    else{
        uname.style.backgroundColor = null;
        uname.style.borderColor = null;
    }

    if (password.value == ""){
        password.style.backgroundColor = "pink";
        password.style.borderColor = "red";
        password.placeholder = "Cannot be empty";
        submitOk = 'false';
    }

    else{
        password.style.backgroundColor = null;
        password.style.borderColor = null;
    }

    submitOk = 'false';
    found_user = 'false';
    for (i=0; i< userData.length; i++){
        if (userData[i]["UserName"] === uname.value && userData[i]["Pword"] === password.value){
            submitOk = 'true'
        }
        else if (userData[i]["UserName"] === uname.value && userData[i]["Pword"] !== password ){
            password.value = "";
            password.style.backgroundColor = "pink";
            password.style.borderColor = "red";
            password.placeholder = "Password does not match";
            found_user = 'true';
        }
    }


    if (submitOk == 'false'){
        password.value = "";
        password.style.backgroundColor = "pink";
        password.style.borderColor = "red";
        password.placeholder = "Password/Username does not exist";

        if (found_user == 'false'){
            uname.value = "";
            uname.style.backgroundColor = "pink";
            uname.style.borderColor = "red";
            uname.placeholder = "Username/Password does not exist";
        }


        event.preventDefault();
        return;
    }

}
