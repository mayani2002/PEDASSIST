var e_mail="",password="",conf_password="";

function sign_up() {
    e_mail = document.getElementById("sign-up-email-input").value;
    password = document.getElementById("sign-up-password-input").value; 
    conf_password = document.getElementById("conf-password-input").value;
    
    if (password != conf_password)
        alert("Passwords do not match ! ");
    else
    {
        alert("You have signed up successfully !");
        document.getElementById("main-container-sign-up").style.display="none";
        document.getElementById("main-container-login").style.display="flex";
    }
}

function login() {
    var e_mail1="", password_1="";
    e_mail1 = document.getElementById("login-email-input").value;
    password_1 = document.getElementById("login-password-input").value;
    if (e_mail == e_mail1 && password == password_1) {
        alert("You are logged in successfully !");
        document.getElementById("main-container-sign-up").style.display="none";
        document.getElementById("main-container-login").style.display="flex";
    }
    else
        alert("Your credentials do not match !" + password + "\t" + password_1);
}
