function request_code(){

    var email_login = document.getElementById("email_login");
    var TwoFactAuth_form = document.getElementById('TwoFactAuth_form');
    TwoFactAuth_form.classList.add('disabledform');

    var data = { 
        "action": 'request_code',
        "email": email_login.value
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {

            obj_reply = JSON.parse(this.responseText);
            alert('Code Sent!');
            TwoFactAuth_form.classList.remove('disabledform');
            alert(this.responseText);
        }else{
            alert("ERROR: " + xmlhttp.status);
        }
    }

    xmlhttp.open("GET","loginHandler.php?data=" + JSON.stringify(data), true);
    xmlhttp.send();   

}

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

    xmlhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {

            obj_reply = JSON.parse(this.responseText);

            if(obj_reply['status'] == 'success'){
                document.getElementById('login_form').style.display = 'none';
                document.getElementById('TwoFactAuth_form').style.display = 'block';
                document.getElementById('2factAuth_email').value = obj_reply['email'];
                request_code();
            }else{
                alert(obj_reply.reply);
            }

        }else{
            alert("ERROR: " + xmlhttp.status);
        }
    }

    xmlhttp.open("GET","loginHandler.php?data=" + JSON.stringify(data), true);
    xmlhttp.send();

}

function back_to_login(){
    document.getElementById('login_form').style.display = 'block';
    document.getElementById('TwoFactAuth_form').style.display = 'none';
}

function check_code(){

    var authentication_code = document.getElementById('authentication_code');

    var data = { 
        "action": 'verify_code',
        "email": email_login.value,
        "auth_code": authentication_code.value,
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {

            // obj_reply = JSON.parse(this.responseText);
            alert(this.responseText);
            TwoFactAuth_form.classList.remove('disabledform');
            
        }else{
            alert("ERROR: " + xmlhttp.status);
        }
    }

    xmlhttp.open("GET","loginHandler.php?data=" + JSON.stringify(data), true);
    xmlhttp.send();  

}
