let form = document.querySelector("#register_form");
let firstName = document.querySelector("#fName");
let email = document.querySelector("#email");
let username = document.querySelector("#username");
let password = document.querySelector("#password");
let passwordConfirm = document.querySelector("#passwordConfirm");
let register = document.querySelector("#register");
let errors = [];

function invalidAlert(errorFieldSelector, errorText) {
  let selector = document.querySelector(errorFieldSelector);
  selector.innerText = errorText;
}

form.addEventListener("submit", function (event) {
  if (
    firstName.value == "" &&
    email.value == "" &&
    username.value == "" &&
    password.value == "" &&
    passwordConfirm.value == ""
  ) {
    alert("Fill all fields");
    firstName.focus();
    event.preventDefault();
    return;
  }
  if (firstName.value.trim() === "") {
    errors.push(true);
    firstName.focus();
    invalidAlert("#fNameError", "First name not filled");
    event.preventDefault();
    return;
  }
  if (email.value.trim() === "") {
    errors.push(true);
    email.focus();
    invalidAlert("#emailError", "Email not filled");
    event.preventDefault();
    return;
  }
  if (username.value.trim() === "") {
    errors.push(true);
    username.focus();
    invalidAlert("#usernameError", "Username not filled");
    event.preventDefault();
    return;
  }
  if (password.value.trim() === "") {
    errors.push(true);
    password.focus();
    invalidAlert("#passwordError", "Password not filled");
    event.preventDefault();
    return;
  }
  if (passwordConfirm.value.trim() === "") {
    errors.push(true);
    passwordConfirm.focus();
    invalidAlert("#confirmError", "You did not confirm password");
    event.preventDefault();
    return;
  }
});
