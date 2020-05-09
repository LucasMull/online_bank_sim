PSW = "input[type='password']";

$( document ).ready(function() {
    $(PSW).change(function() { 
                $("span.password").append("<div innerpassword>T</div>");
        });
});
