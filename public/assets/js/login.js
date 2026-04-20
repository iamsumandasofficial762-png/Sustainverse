/*=====================
login js
==========================*/

// var open = 'fa-eye';
// var close = 'fa-eye-slash';
// var ele = document.getElementById('pwd-input');
// // var eleother = document.getElementById('pwd-input1');

// document.getElementById('pwd-icon').onclick = function() {
//     if( this.classList.contains(open) ) {
//         ele.type="password";
//         this.classList.remove(open);
//         this.className += ' '+close;
//     } else {
//         ele.type="text";
//         this.classList.remove(close);
//         this.className += ' '+open;
//     }
// }

document.addEventListener("DOMContentLoaded", function () {
    var open = "fa-eye";
    var close = "fa-eye-slash";

    var ele = document.getElementById("pwd-input");
    var icon = document.getElementById("pwd-icon");

    if (icon) {
        icon.onclick = function () {
            if (this.classList.contains(open)) {
                ele.type = "password";
                this.classList.remove(open);
                this.classList.add(close);
            } else {
                ele.type = "text";
                this.classList.remove(close);
                this.classList.add(open);
            }
        };
    }
});