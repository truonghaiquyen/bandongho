var inputCheck = document.querySelector(".login__child--optionOne input[type  ='checkbox']");
var inputPass = document.querySelectorAll('.login-child__inputPass input');
var inputLoGin = document.querySelector('.login-child__btn .btn__Login');
inputLoGin.addEventListener('click', function () {
   checkInPut();
});
function Checktrue() {
   if (inputCheck.checked) {
      inputPass[0].setAttribute('type', 'text');
      inputPass[1].setAttribute('type', 'text');
   } else {
      inputPass[0].setAttribute('type', 'password');
      inputPass[1].setAttribute('type', 'password');
   }
}

inputCheck.addEventListener('input', function () {
   Checktrue();
});
