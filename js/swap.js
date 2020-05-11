let $LoginForm = $("<label>Agency</label><br>" +
"<input type=\"text\" name=\"agency\" id=\"agc\"><br>" +
"<label>Account</label><br>" +
"<input type=\"text\" name=\"account\" id=\"acc\"><br>" +
"<label>Password</label><br>" +
"<input type=\"password\" name=\"password\" id=\"psw\"><br>" +
"<p><button id=\"submit\" type=\"submit\" value=\"Submit\">Login</button></p><br>"
);
let $SignUpForm = $("<label>Fullname</label><br>" +
"<input type=\"text\" name=\"fullname\" id=\"flnm\"><br>" +
"<label>ID</label><br>" +
"<input type=\"text\" name=\"ID\" id=\"id\"><br>" +
"<label>E-Mail</label><br>" +
"<input type=\"email\" name=\"e-mail\" id=\"e-mail\"><br>" +
"<label>Password</label><br>" +
"<input type=\"password\" name=\"password\" id=\"psw\"><br>" +
"<label>Verify Password</label><br>" +
"<input type=\"password\" name=\"verify_psw\" id=\"vpsw\"><br>" +
"<label>CPF</label><br>" +
"<input type=\"text\" name=\"cpf\" id=\"cpf\"><br>" +
"<p><button type=\"submit\" value=\"Submit\">SignIn</button></p><br>"
);

let STATE = {
        desc: "Login",
        text: "Please fill this form to log into yout account.",
        php: "tryLogin.php",
        $form: $LoginForm

}

let OTHER_STATE = {
        desc: "SignUp",
        text: "Please fill this form to create your account.",
        php: "trySignup.php",
        $form: $SignUpForm
}

$( document ).ready(function() {
    $("#signup").click(function( event ) {
        event.preventDefault();
        $("div.wrapper").slideUp("fast");
        setTimeout(function(){
            $("div.swap #signup")
                .html(STATE.desc);
            $("h2").eq(0)
                .html(OTHER_STATE.desc);
            $("p").eq(1)
                .html(OTHER_STATE.text);
            $("form").eq(0)
                .empty()
                .append(OTHER_STATE.$form)
                .attr("action",OTHER_STATE.php);

            let temp = STATE;
            STATE = OTHER_STATE;
            OTHER_STATE = temp;
        }, 200);
        //$("a").eq(0)
          //  .html(STATE.desc);
        $("div.wrapper").slideDown(1000);
    });
});
