function view_email_verify_form(){
    var verify_email_form = document.getElementById('verify_email_form');
    var signup_form = document.getElementById('signup_form');
    signup_form.classList.add('hidden');
    verify_email_form.classList.remove('hidden');
}

function view_signup_form(){
    var verify_email_form = document.getElementById('verify_email_form');
    var signup_form = document.getElementById('signup_form');
    verify_email_form.classList.add('hidden');
    signup_form.classList.remove('hidden');
}

function emailValidator(){
    //send request if the email already exist or not (result > 0)
    //set email field if email already exist

    var email_sign_up = document.getElementById("email_sign_up");
    document.getElementById('email').value = email_sign_up.value;
    var data = { 
        "action": 'verify_email_for_sign_up',
        "email": email_sign_up.value
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
            obj_reply = JSON.parse(this.responseText);
            if(obj_reply.status == 'success'){
                view_signup_form();
            }else{
                alert(obj_reply.reply);
            }
        }else{
            alert("ERROR: " + xmlhttp.status);
        }
    }

    xmlhttp.open("GET","signupHandler.php?data=" + JSON.stringify(data), true);
    xmlhttp.send();   

}

function insert_user(){
    var fullname = document.getElementById('fullname');
    var get_gender = function(){

        if(document.getElementById('male').checked){
            return 'male';
        }else if (document.getElementById('female').checked){
            return 'female';
        }

    }
    var gender = get_gender();
    var birthdate = document.getElementById('birthdate');
    var email = document.getElementById('email');
    var password = document.getElementById('confirm_password_signup');

    var data = {
        "action": 'insert_user',
        "fullname": fullname.value,
        "gender": gender,
        "birthdate": birthdate.value,
        "email": email.value,
        "password": password.value
    }

    //alert(JSON.stringify(data));

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }else{
            alert("ERROR: " + xmlhttp.status);
        }
    }

    xmlhttp.open("GET","signupHandler.php?data=" + JSON.stringify(data), true);
    xmlhttp.send();
}

//This Will Validate The Password and PasswordConfirmation is the same
function passwordValidation(){
    //store DOM HTML values
    var password = document.getElementById("password_signup");
    var passwordConfirm = document.getElementById("confirm_password_signup");

    //Compare the password and the confirm password value if the input is the same.
    if(password.value == passwordConfirm.value && password.value != '' && passwordConfirm.value != ''){
        password.style.background = "lightgreen";
        passwordConfirm.style.background = "lightgreen";
    }else{
        password.style.background = "#ff6666";
        passwordConfirm.style.background = "#ff6666";
        //alert("password not the same");
    }
}


