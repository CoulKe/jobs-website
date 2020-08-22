// Variables
let form = document.querySelector("#register_form");
let firstName = document.querySelector("#fName");
let email = document.querySelector("#email");
let username = document.querySelector("#username");
let password = document.querySelector("#password");
let passwordConfirm = document.querySelector("#passwordConfirm");
let gender = document.getElementsByName("gender");
let register = document.querySelector("#register");


// Functions
function invalidAlert(errorFieldSelector, errorText) {
  let selector = document.querySelector(errorFieldSelector);
  selector.innerText = errorText;
}
function radiosValidate(selector) {
  const radios = document.querySelectorAll(`input[name="${selector}"]`);
  let selectedValue;
  for (const radio of radios) {
    if (radio.checked) {
      selectedValue = radio.value;
      break;
    }
  }
  if (selectedValue == undefined) {
    selectedValue = false;
  }
  return selectedValue;
}


 form.addEventListener("submit", function (event) {
  let radiosBool = radiosValidate("gender");
  
  if (
    firstName.value == "" &&
    email.value == "" &&
    username.value == "" &&
    password.value == "" &&
    passwordConfirm.value == "" &&
    radiosBool === false
  ) {
    alert("Fill all fields");
    firstName.focus();
    event.preventDefault();
    return;
  }
  if (firstName.value.trim() === "") {
    firstName.focus();
    invalidAlert("#fNameError", "First name not filled");
    event.preventDefault();
    return;
  }
  if (email.value.trim() === "") {
    email.focus();
    invalidAlert("#emailError", "Email not filled");
    event.preventDefault();
    return;
  }
  if (username.value.trim() === "") {
    username.focus();
    invalidAlert("#usernameError", "Username not filled");
    event.preventDefault();
    return;
  }
  if (password.value.trim() === "") {
    password.focus();
    invalidAlert("#passwordError", "Password not filled");
    event.preventDefault();
    return;
  }
  if (passwordConfirm.value.trim() === "") {
    passwordConfirm.focus();
    invalidAlert("#confirmError", "You did not confirm password");
    event.preventDefault();
    return;
  }
  if (radiosBool === false) {
    invalidAlert("#genderError", "Select gender");
    event.preventDefault();
    return;
  }
});
