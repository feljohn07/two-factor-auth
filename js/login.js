var login_form = document.getElementById('login_form');
var TwoFactAuth_form = document.getElementById('TwoFactAuth_form');

// Disables buttons after sending OTP for 60 seconds
const btn = document.getElementById("code_request");
const timer = document.getElementById("timer");

function request_code_timer() {

    btn.disabled = true;
    counter = 60;

    const interval = setInterval(function func_counter(){

        timer.hidden = false;
        timer.innerHTML = counter;
        counter = counter - 1;

        if(counter <= 0){
            clearInterval(interval);
            timer.hidden = true;

            btn.disabled = false;
            timer.hidden = true;
            console.log('Button Activated');
        }

    }, 1000)

}


function request_code(){

    var email_login = document.getElementById("email_login");

    // Disable the form while waiting for the server reply
    TwoFactAuth_form.classList.add('disabledform');

    var data = { 
        "action": 'request_code',
        "email": email_login.value
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {

            obj_reply = JSON.parse(this.responseText);
            alert('New Authentication Code Sent To Your Email!');

            // enable the form after the server reply is received.
            TwoFactAuth_form.classList.remove('disabledform');

            console.log(this.responseText);
            request_code_timer();
        }else{
            alert("ERROR: " + xmlhttp.status);
        }
    }

    xmlhttp.open("GET","loginHandler.php?data=" + JSON.stringify(data), true);
    xmlhttp.send();   

}

// Process the user email and password to the server for verification.
function log_in(){

    var xmlhttp = new XMLHttpRequest();
    var email_login = document.getElementById("email_login");
    var password_login = document.getElementById("password_login");

    var obj_reply;

    var data = {
        "action": 'auth_user_credential',
        "email_login": email_login.value,
        "password_login": password_login.value
    };

    login_form.classList.add('disabledform');

    xmlhttp.onload = function() {

        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);

            obj_reply = JSON.parse(this.responseText);

            if(obj_reply['status'] == 'success'){
                document.getElementById('login_form').style.display = 'none';
                document.getElementById('TwoFactAuth_form').style.display = 'block';
                document.getElementById('2factAuth_email').value = obj_reply['email'];

                // after logging is succesfully the client request a authentication code to the server for it to receive on there email address.
                request_code();
            }else{

                // log the return when the reply is not 'success' or if the reply is 'failed'
                alert(obj_reply.reply);
            }

        }else{

            // display the http error.
            alert("ERROR: " + xmlhttp.status);
        }

        login_form.classList.remove('disabledform');
    }

    xmlhttp.open("GET","loginHandler.php?data=" + JSON.stringify(data), true);
    xmlhttp.send();

}

// Button Back function.
function back_to_login(){
    document.getElementById('login_form').style.display = 'block';
    document.getElementById('TwoFactAuth_form').style.display = 'none';
}

// Verify the Authentication Code of the user to the server.
function check_code(){

    var authentication_code = document.getElementById('authentication_code');

    // Disable Form after calling this function
    TwoFactAuth_form.classList.add('disabledform');

    var data = { 
        "action": 'verify_code',
        "email": email_login.value,
        "auth_code": authentication_code.value,
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {

            //returns 'true' if the code is correct.
            obj_reply = JSON.parse(this.responseText);

            if(obj_reply['status'] == 'true'){
                alert(obj_reply['status']);
                TwoFactAuth_form.classList.remove('disabledform');
            }else{
                alert(obj_reply['status']);
            }
            
            // Enable Form after the server reply is received.
            TwoFactAuth_form.classList.remove('disabledform');

        }else{
            alert("ERROR: " + xmlhttp.status);
        }
    }

    xmlhttp.open("GET","loginHandler.php?data=" + JSON.stringify(data), true);
    xmlhttp.send();  
}
