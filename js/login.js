"use strict";

function getInfo() {
        let agency = document.getElementById("agency").value;
        let account = document.getElementById("account").value;
        let password = document.getElementById("password").value;

        function checkLength(info, length) {
                if (info.length != length){
                        console.log("invalid length: "+length);
                        return 1;
                }
        }
        if ( checkLength(agency, 5) ) return 1;
        if ( checkLength(account, 5)) return 1;
        if ( checkLength(password, 8)) return 1;

        console.log("username: " + agency);
        console.log("account: " + account);
        console.log("password: " + password);
}
