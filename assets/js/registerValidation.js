let firstName = document.querySelector("#fName");
let email = document.querySelector("#email");
let username = document.querySelector("#username");
let password = document.querySelector("#password");
let passwordConfirm = document.querySelector("#passwordConfirm");
let register = document.querySelector("#register");

function allLetter(inputtxt) {
  var letters = /^[A-Za-z]+$/;
  if (inputtxt.value.match(letters)) {
    alert("Your name have accepted : you can try another");
    return true;
  } else {
    alert("Please input alphabet characters only");
    return false;
  }
}
