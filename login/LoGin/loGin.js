var inputCheck = document.querySelector(".login__child--optionOne input[type  ='checkbox']");
var inputPass = document.querySelector('.login-child__inputPass input');
var option = document.querySelector('.login-child__information');
console.log(inputCheck, inputPass);
function Checktrue() {
   if (inputCheck.checked) {
      inputPass.setAttribute('type', 'text');
   } else {
      inputPass.setAttribute('type', 'password');
   }
}
inputCheck.addEventListener('input', function () {
   Checktrue();
});
