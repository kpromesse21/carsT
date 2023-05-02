import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var alertS=Document.GetElementByclassId("alert-success")
var alertD=Document.GetElementByclassId("alert-danger")
var i = 5;

function f() {
    //console.log("fait")
    t = setTimeout("f()", 1000);
    if (i > 0) {
        i--;
    }
    if (i <= 0) {
        //console.log('fait')
        alertS.style.display = "none";
        alertD.display="none";
        clearTimeout(t);
    }
    //  console.log(i)
}

